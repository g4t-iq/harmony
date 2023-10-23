<?php

namespace Tune\Foundation\Providers;

use Tune\Contracts\Support\DeferrableProvider;
use Tune\Database\MigrationServiceProvider;
use Tune\Support\AggregateServiceProvider;

class ConsoleSupportServiceProvider extends AggregateServiceProvider implements DeferrableProvider
{
    /**
     * The provider class names.
     *
     * @var string[]
     */
    protected $providers = [
        ArtisanServiceProvider::class,
        MigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
