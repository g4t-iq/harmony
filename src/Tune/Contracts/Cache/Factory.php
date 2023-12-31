<?php

namespace Tune\Contracts\Cache;

interface Factory
{
    /**
     * Get a cache store instance by name.
     *
     * @param  string|null  $name
     * @return \Tune\Contracts\Cache\Repository
     */
    public function store($name = null);
}
