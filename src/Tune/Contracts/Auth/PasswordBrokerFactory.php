<?php

namespace Tune\Contracts\Auth;

interface PasswordBrokerFactory
{
    /**
     * Get a password broker instance by name.
     *
     * @param  string|null  $name
     * @return \Tune\Contracts\Auth\PasswordBroker
     */
    public function broker($name = null);
}
