<?php

namespace Tune\Support\Facades;

/**
 * @method static \Tune\Hashing\BcryptHasher createBcryptDriver()
 * @method static \Tune\Hashing\ArgonHasher createArgonDriver()
 * @method static \Tune\Hashing\Argon2IdHasher createArgon2idDriver()
 * @method static array info(string $hashedValue)
 * @method static string make(string $value, array $options = [])
 * @method static bool check(string $value, string $hashedValue, array $options = [])
 * @method static bool needsRehash(string $hashedValue, array $options = [])
 * @method static bool isHashed(string $value)
 * @method static string getDefaultDriver()
 * @method static mixed driver(string|null $driver = null)
 * @method static \Tune\Hashing\HashManager extend(string $driver, \Closure $callback)
 * @method static array getDrivers()
 * @method static \Tune\Contracts\Container\Container getContainer()
 * @method static \Tune\Hashing\HashManager setContainer(\Tune\Contracts\Container\Container $container)
 * @method static \Tune\Hashing\HashManager forgetDrivers()
 *
 * @see \Tune\Hashing\HashManager
 * @see \Tune\Hashing\AbstractHasher
 */
class Hash extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hash';
    }
}
