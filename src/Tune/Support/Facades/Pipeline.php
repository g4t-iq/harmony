<?php

namespace Tune\Support\Facades;

/**
 * @method static \Tune\Pipeline\Pipeline send(mixed $passable)
 * @method static \Tune\Pipeline\Pipeline through(array|mixed $pipes)
 * @method static \Tune\Pipeline\Pipeline pipe(array|mixed $pipes)
 * @method static \Tune\Pipeline\Pipeline via(string $method)
 * @method static mixed then(\Closure $destination)
 * @method static mixed thenReturn()
 * @method static \Tune\Pipeline\Pipeline setContainer(\Tune\Contracts\Container\Container $container)
 *
 * @see \Tune\Pipeline\Pipeline
 */
class Pipeline extends Facade
{
    /**
     * Indicates if the resolved instance should be cached.
     *
     * @var bool
     */
    protected static $cached = false;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pipeline';
    }
}
