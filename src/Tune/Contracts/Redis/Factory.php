<?php

namespace Tune\Contracts\Redis;

interface Factory
{
    /**
     * Get a Redis connection by name.
     *
     * @param  string|null  $name
     * @return \Tune\Redis\Connections\Connection
     */
    public function connection($name = null);
}
