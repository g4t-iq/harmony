<?php

namespace Tune\Console\Scheduling;

use Tune\Console\Application;
use Tune\Console\Command;
use Tune\Console\Events\ScheduledTaskFailed;
use Tune\Console\Events\ScheduledTaskFinished;
use Tune\Console\Events\ScheduledTaskSkipped;
use Tune\Console\Events\ScheduledTaskStarting;
use Tune\Contracts\Cache\Repository as Cache;
use Tune\Contracts\Debug\ExceptionHandler;
use Tune\Contracts\Events\Dispatcher;
use Tune\Support\Carbon;
use Tune\Support\Facades\Date;
use Tune\Support\Sleep;
use Symfony\Component\Console\Attribute\AsCommand;
use Throwable;

#[AsCommand(name: 'schedule:run')]
class ScheduleRunCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'schedule:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the scheduled commands';

    /**
     * The schedule instance.
     *
     * @var \Tune\Console\Scheduling\Schedule
     */
    protected $schedule;

    /**
     * The 24 hour timestamp this scheduler command started running.
     *
     * @var \Tune\Support\Carbon
     */
    protected $startedAt;

    /**
     * Check if any events ran.
     *
     * @var bool
     */
    protected $eventsRan = false;

    /**
     * The event dispatcher.
     *
     * @var \Tune\Contracts\Events\Dispatcher
     */
    protected $dispatcher;

    /**
     * The exception handler.
     *
     * @var \Tune\Contracts\Debug\ExceptionHandler
     */
    protected $handler;

    /**
     * The cache store implementation.
     *
     * @var \Tune\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * The PHP binary used by the command.
     *
     * @var string
     */
    protected $phpBinary;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->startedAt = Date::now();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \Tune\Console\Scheduling\Schedule  $schedule
     * @param  \Tune\Contracts\Events\Dispatcher  $dispatcher
     * @param  \Tune\Contracts\Cache\Repository  $cache
     * @param  \Tune\Contracts\Debug\ExceptionHandler  $handler
     * @return void
     */
    public function handle(Schedule $schedule, Dispatcher $dispatcher, Cache $cache, ExceptionHandler $handler)
    {
        $this->schedule = $schedule;
        $this->dispatcher = $dispatcher;
        $this->cache = $cache;
        $this->handler = $handler;
        $this->phpBinary = Application::phpBinary();

        $this->clearInterruptSignal();

        $this->newLine();

        $events = $this->schedule->dueEvents($this->harmony);

        foreach ($events as $event) {
            if (! $event->filtersPass($this->harmony)) {
                $this->dispatcher->dispatch(new ScheduledTaskSkipped($event));

                continue;
            }

            if ($event->onOneServer) {
                $this->runSingleServerEvent($event);
            } else {
                $this->runEvent($event);
            }

            $this->eventsRan = true;
        }

        if ($events->contains->isRepeatable()) {
            $this->repeatEvents($events->filter->isRepeatable());
        }

        if (! $this->eventsRan) {
            $this->components->info('No scheduled commands are ready to run.');
        } else {
            $this->newLine();
        }
    }

    /**
     * Run the given single server event.
     *
     * @param  \Tune\Console\Scheduling\Event  $event
     * @return void
     */
    protected function runSingleServerEvent($event)
    {
        if ($this->schedule->serverShouldRun($event, $this->startedAt)) {
            $this->runEvent($event);
        } else {
            $this->components->info(sprintf(
                'Skipping [%s], as command already run on another server.', $event->getSummaryForDisplay()
            ));
        }
    }

    /**
     * Run the given event.
     *
     * @param  \Tune\Console\Scheduling\Event  $event
     * @return void
     */
    protected function runEvent($event)
    {
        $summary = $event->getSummaryForDisplay();

        $command = $event instanceof CallbackEvent
            ? $summary
            : trim(str_replace($this->phpBinary, '', $event->command));

        $description = sprintf(
            '<fg=gray>%s</> Running [%s]%s',
            Carbon::now()->format('Y-m-d H:i:s'),
            $command,
            $event->runInBackground ? ' in background' : '',
        );

        $this->components->task($description, function () use ($event) {
            $this->dispatcher->dispatch(new ScheduledTaskStarting($event));

            $start = microtime(true);

            try {
                $event->run($this->harmony);

                $this->dispatcher->dispatch(new ScheduledTaskFinished(
                    $event,
                    round(microtime(true) - $start, 2)
                ));

                $this->eventsRan = true;
            } catch (Throwable $e) {
                $this->dispatcher->dispatch(new ScheduledTaskFailed($event, $e));

                $this->handler->report($e);
            }

            return $event->exitCode == 0;
        });

        if (! $event instanceof CallbackEvent) {
            $this->components->bulletList([
                $event->getSummaryForDisplay(),
            ]);
        }
    }

    /**
     * Run the given repeating events.
     *
     * @param  \Tune\Support\Collection<\Tune\Console\Scheduling\Event>  $events
     * @return void
     */
    protected function repeatEvents($events)
    {
        $hasEnteredMaintenanceMode = false;

        while (Date::now()->lte($this->startedAt->endOfMinute())) {
            foreach ($events as $event) {
                if ($this->shouldInterrupt()) {
                    return;
                }

                if (! $event->shouldRepeatNow()) {
                    continue;
                }

                $hasEnteredMaintenanceMode = $hasEnteredMaintenanceMode || $this->harmony->isDownForMaintenance();

                if ($hasEnteredMaintenanceMode && ! $event->runsInMaintenanceMode()) {
                    continue;
                }

                if (! $event->filtersPass($this->harmony)) {
                    $this->dispatcher->dispatch(new ScheduledTaskSkipped($event));

                    continue;
                }

                if ($event->onOneServer) {
                    $this->runSingleServerEvent($event);
                } else {
                    $this->runEvent($event);
                }

                $this->eventsRan = true;
            }

            Sleep::usleep(100000);
        }
    }

    /**
     * Determine if the schedule run should be interrupted.
     *
     * @return bool
     */
    protected function shouldInterrupt()
    {
        return $this->cache->get('tune:schedule:interrupt', false);
    }

    /**
     * Ensure the interrupt signal is cleared.
     *
     * @return bool
     */
    protected function clearInterruptSignal()
    {
        $this->cache->forget('tune:schedule:interrupt');
    }
}
