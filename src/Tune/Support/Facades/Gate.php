<?php

namespace Tune\Support\Facades;

use Tune\Contracts\Auth\Access\Gate as GateContract;

/**
 * @method static bool has(string|array $ability)
 * @method static \Tune\Auth\Access\Response allowIf(\Tune\Auth\Access\Response|\Closure|bool $condition, string|null $message = null, string|null $code = null)
 * @method static \Tune\Auth\Access\Response denyIf(\Tune\Auth\Access\Response|\Closure|bool $condition, string|null $message = null, string|null $code = null)
 * @method static \Tune\Auth\Access\Gate define(string $ability, callable|array|string $callback)
 * @method static \Tune\Auth\Access\Gate resource(string $name, string $class, array|null $abilities = null)
 * @method static \Tune\Auth\Access\Gate policy(string $class, string $policy)
 * @method static \Tune\Auth\Access\Gate before(callable $callback)
 * @method static \Tune\Auth\Access\Gate after(callable $callback)
 * @method static bool allows(string $ability, array|mixed $arguments = [])
 * @method static bool denies(string $ability, array|mixed $arguments = [])
 * @method static bool check(iterable|string $abilities, array|mixed $arguments = [])
 * @method static bool any(iterable|string $abilities, array|mixed $arguments = [])
 * @method static bool none(iterable|string $abilities, array|mixed $arguments = [])
 * @method static \Tune\Auth\Access\Response authorize(string $ability, array|mixed $arguments = [])
 * @method static \Tune\Auth\Access\Response inspect(string $ability, array|mixed $arguments = [])
 * @method static mixed raw(string $ability, array|mixed $arguments = [])
 * @method static mixed getPolicyFor(object|string $class)
 * @method static \Tune\Auth\Access\Gate guessPolicyNamesUsing(callable $callback)
 * @method static mixed resolvePolicy(object|string $class)
 * @method static \Tune\Auth\Access\Gate forUser(\Tune\Contracts\Auth\Authenticatable|mixed $user)
 * @method static array abilities()
 * @method static array policies()
 * @method static \Tune\Auth\Access\Gate defaultDenialResponse(\Tune\Auth\Access\Response $response)
 * @method static \Tune\Auth\Access\Gate setContainer(\Tune\Contracts\Container\Container $container)
 * @method static \Tune\Auth\Access\Response denyWithStatus(int $status, string|null $message = null, int|null $code = null)
 * @method static \Tune\Auth\Access\Response denyAsNotFound(string|null $message = null, int|null $code = null)
 *
 * @see \Tune\Auth\Access\Gate
 */
class Gate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GateContract::class;
    }
}
