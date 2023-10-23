<?php

namespace Tune\Support\Facades;

/**
 * @method static \Tune\Validation\Validator make(array $data, array $rules, array $messages = [], array $attributes = [])
 * @method static array validate(array $data, array $rules, array $messages = [], array $attributes = [])
 * @method static void extend(string $rule, \Closure|string $extension, string|null $message = null)
 * @method static void extendImplicit(string $rule, \Closure|string $extension, string|null $message = null)
 * @method static void extendDependent(string $rule, \Closure|string $extension, string|null $message = null)
 * @method static void replacer(string $rule, \Closure|string $replacer)
 * @method static void includeUnvalidatedArrayKeys()
 * @method static void excludeUnvalidatedArrayKeys()
 * @method static void resolver(\Closure $resolver)
 * @method static \Tune\Contracts\Translation\Translator getTranslator()
 * @method static \Tune\Validation\PresenceVerifierInterface getPresenceVerifier()
 * @method static void setPresenceVerifier(\Tune\Validation\PresenceVerifierInterface $presenceVerifier)
 * @method static \Tune\Contracts\Container\Container|null getContainer()
 * @method static \Tune\Validation\Factory setContainer(\Tune\Contracts\Container\Container $container)
 *
 * @see \Tune\Validation\Factory
 */
class Validator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validator';
    }
}
