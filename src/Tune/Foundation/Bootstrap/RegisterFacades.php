<?php

namespace Tune\Foundation\Bootstrap;

use Tune\Contracts\Foundation\Application;
use Tune\Foundation\AliasLoader;
use Tune\Foundation\PackageManifest;
use Tune\Support\Facades\Facade;

class RegisterFacades
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Tune\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($app);

        AliasLoader::getInstance(array_merge(
            $app->make('config')->get('app.aliases', []),
            $app->make(PackageManifest::class)->aliases()
        ))->register();
    }
}
