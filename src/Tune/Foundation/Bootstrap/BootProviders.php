<?php

namespace Tune\Foundation\Bootstrap;

use Tune\Contracts\Foundation\Application;

class BootProviders
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Tune\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        $app->boot();
    }
}
