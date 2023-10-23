<?php

namespace Tune\Foundation\Console;

use Tune\Console\Command;
use Tune\Foundation\Support\Providers\EventServiceProvider;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'event:cache')]
class EventCacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Discover and cache the application's events and listeners";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->callSilent('event:clear');

        file_put_contents(
            $this->harmony->getCachedEventsPath(),
            '<?php return '.var_export($this->getEvents(), true).';'
        );

        $this->components->info('Events cached successfully.');
    }

    /**
     * Get all of the events and listeners configured for the application.
     *
     * @return array
     */
    protected function getEvents()
    {
        $events = [];

        foreach ($this->harmony->getProviders(EventServiceProvider::class) as $provider) {
            $providerEvents = array_merge_recursive($provider->shouldDiscoverEvents() ? $provider->discoverEvents() : [], $provider->listens());

            $events[get_class($provider)] = $providerEvents;
        }

        return $events;
    }
}
