<?php

namespace Tune\Support\Facades;

use Tune\Contracts\Auth\PasswordBroker;

/**
 * @method static \Tune\Contracts\Auth\PasswordBroker broker(string|null $name = null)
 * @method static string getDefaultDriver()
 * @method static void setDefaultDriver(string $name)
 * @method static string sendResetLink(array $credentials, \Closure|null $callback = null)
 * @method static mixed reset(array $credentials, \Closure $callback)
 * @method static \Tune\Contracts\Auth\CanResetPassword|null getUser(array $credentials)
 * @method static string createToken(\Tune\Contracts\Auth\CanResetPassword $user)
 * @method static void deleteToken(\Tune\Contracts\Auth\CanResetPassword $user)
 * @method static bool tokenExists(\Tune\Contracts\Auth\CanResetPassword $user, string $token)
 * @method static \Tune\Auth\Passwords\TokenRepositoryInterface getRepository()
 *
 * @see \Tune\Auth\Passwords\PasswordBrokerManager
 * @see \Tune\Auth\Passwords\PasswordBroker
 */
class Password extends Facade
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT = PasswordBroker::RESET_LINK_SENT;

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = PasswordBroker::PASSWORD_RESET;

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = PasswordBroker::INVALID_USER;

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = PasswordBroker::INVALID_TOKEN;

    /**
     * Constant representing a throttled reset attempt.
     *
     * @var string
     */
    const RESET_THROTTLED = PasswordBroker::RESET_THROTTLED;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.password';
    }
}