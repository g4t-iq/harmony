<?php

namespace Tune\Support\Facades;

use Closure;
use Tune\Process\Factory;

/**
 * @method static \Tune\Process\PendingProcess command(array|string $command)
 * @method static \Tune\Process\PendingProcess path(string $path)
 * @method static \Tune\Process\PendingProcess timeout(int $timeout)
 * @method static \Tune\Process\PendingProcess idleTimeout(int $timeout)
 * @method static \Tune\Process\PendingProcess forever()
 * @method static \Tune\Process\PendingProcess env(array $environment)
 * @method static \Tune\Process\PendingProcess input(\Traversable|resource|string|int|float|bool|null $input)
 * @method static \Tune\Process\PendingProcess quietly()
 * @method static \Tune\Process\PendingProcess tty(bool $tty = true)
 * @method static \Tune\Process\PendingProcess options(array $options)
 * @method static \Tune\Contracts\Process\ProcessResult run(array|string|null $command = null, callable|null $output = null)
 * @method static \Tune\Process\InvokedProcess start(array|string|null $command = null, callable $output = null)
 * @method static \Tune\Process\PendingProcess withFakeHandlers(array $fakeHandlers)
 * @method static \Tune\Process\PendingProcess|mixed when(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static \Tune\Process\PendingProcess|mixed unless(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
 * @method static \Tune\Process\FakeProcessResult result(array|string $output = '', array|string $errorOutput = '', int $exitCode = 0)
 * @method static \Tune\Process\FakeProcessDescription describe()
 * @method static \Tune\Process\FakeProcessSequence sequence(array $processes = [])
 * @method static bool isRecording()
 * @method static \Tune\Process\Factory recordIfRecording(\Tune\Process\PendingProcess $process, \Tune\Contracts\Process\ProcessResult $result)
 * @method static \Tune\Process\Factory record(\Tune\Process\PendingProcess $process, \Tune\Contracts\Process\ProcessResult $result)
 * @method static \Tune\Process\Factory preventStrayProcesses(bool $prevent = true)
 * @method static bool preventingStrayProcesses()
 * @method static \Tune\Process\Factory assertRan(\Closure|string $callback)
 * @method static \Tune\Process\Factory assertRanTimes(\Closure|string $callback, int $times = 1)
 * @method static \Tune\Process\Factory assertNotRan(\Closure|string $callback)
 * @method static \Tune\Process\Factory assertDidntRun(\Closure|string $callback)
 * @method static \Tune\Process\Factory assertNothingRan()
 * @method static \Tune\Process\Pool pool(callable $callback)
 * @method static \Tune\Contracts\Process\ProcessResult pipe(callable|array $callback, callable|null $output = null)
 * @method static \Tune\Process\ProcessPoolResults concurrently(callable $callback, callable|null $output = null)
 * @method static \Tune\Process\PendingProcess newPendingProcess()
 * @method static void macro(string $name, object|callable $macro)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static mixed macroCall(string $method, array $parameters)
 *
 * @see \Tune\Process\PendingProcess
 * @see \Tune\Process\Factory
 */
class Process extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }

    /**
     * Indicate that the process factory should fake processes.
     *
     * @param  \Closure|array|null  $callback
     * @return \Tune\Process\Factory
     */
    public static function fake(Closure|array $callback = null)
    {
        return tap(static::getFacadeRoot(), function ($fake) use ($callback) {
            static::swap($fake->fake($callback));
        });
    }
}
