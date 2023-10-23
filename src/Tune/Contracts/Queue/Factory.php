<?php

namespace Tune\Contracts\Queue;

interface Factory
{
    /**
     * Resolve a queue connection instance.
     *
     * @param  string|null  $name
     * @return \Tune\Contracts\Queue\Queue
     */
    public function connection($name = null);
}
