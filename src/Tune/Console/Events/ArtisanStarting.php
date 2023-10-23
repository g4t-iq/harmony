<?php

namespace Tune\Console\Events;

class ArtisanStarting
{
    /**
     * The Artisan application instance.
     *
     * @var \Tune\Console\Application
     */
    public $artisan;

    /**
     * Create a new event instance.
     *
     * @param  \Tune\Console\Application  $artisan
     * @return void
     */
    public function __construct($artisan)
    {
        $this->artisan = $artisan;
    }
}
