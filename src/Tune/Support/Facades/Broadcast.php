<?php

namespace Tune\Support\Facades;

use Tune\Contracts\Broadcasting\Factory as BroadcastingFactoryContract;

/**
 * @method static void routes(array|null $attributes = null)
 * @method static void userRoutes(array|null $attributes = null)
 * @method static void channelRoutes(array|null $attributes = null)
 * @method static string|null socket(\Tune\Http\Request|null $request = null)
 * @method static \Tune\Broadcasting\PendingBroadcast event(mixed|null $event = null)
 * @method static void queue(mixed $event)
 * @method static mixed connection(string|null $driver = null)
 * @method static mixed driver(string|null $name = null)
 * @method static \Pusher\Pusher pusher(array $config)
 * @method static \Ably\AblyRest ably(array $config)
 * @method static string getDefaultDriver()
 * @method static void setDefaultDriver(string $name)
 * @method static void purge(string|null $name = null)
 * @method static \Tune\Broadcasting\BroadcastManager extend(string $driver, \Closure $callback)
 * @method static \Tune\Contracts\Foundation\Application getApplication()
 * @method static \Tune\Broadcasting\BroadcastManager setApplication(\Tune\Contracts\Foundation\Application $app)
 * @method static \Tune\Broadcasting\BroadcastManager forgetDrivers()
 * @method static mixed auth(\Tune\Http\Request $request)
 * @method static mixed validAuthenticationResponse(\Tune\Http\Request $request, mixed $result)
 * @method static void broadcast(array $channels, string $event, array $payload = [])
 * @method static array|null resolveAuthenticatedUser(\Tune\Http\Request $request)
 * @method static void resolveAuthenticatedUserUsing(\Closure $callback)
 * @method static \Tune\Broadcasting\Broadcasters\Broadcaster channel(\Tune\Contracts\Broadcasting\HasBroadcastChannel|string $channel, callable|string $callback, array $options = [])
 * @method static \Tune\Support\Collection getChannels()
 *
 * @see \Tune\Broadcasting\BroadcastManager
 * @see \Tune\Broadcasting\Broadcasters\Broadcaster
 */
class Broadcast extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BroadcastingFactoryContract::class;
    }
}
