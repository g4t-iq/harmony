<?php

namespace Tune\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by name.
     *
     * @param  string|null  $name
     * @return \Tune\Contracts\Broadcasting\Broadcaster
     */
    public function connection($name = null);
}
