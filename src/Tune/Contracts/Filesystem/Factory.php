<?php

namespace Tune\Contracts\Filesystem;

interface Factory
{
    /**
     * Get a filesystem implementation.
     *
     * @param  string|null  $name
     * @return \Tune\Contracts\Filesystem\Filesystem
     */
    public function disk($name = null);
}
