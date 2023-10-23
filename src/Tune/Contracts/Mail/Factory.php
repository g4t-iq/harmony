<?php

namespace Tune\Contracts\Mail;

interface Factory
{
    /**
     * Get a mailer instance by name.
     *
     * @param  string|null  $name
     * @return \Tune\Contracts\Mail\Mailer
     */
    public function mailer($name = null);
}
