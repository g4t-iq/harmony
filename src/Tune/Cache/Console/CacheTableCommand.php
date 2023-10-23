<?php

namespace Tune\Cache\Console;

use Tune\Console\Command;
use Tune\Filesystem\Filesystem;
use Tune\Support\Composer;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'cache:table')]
class CacheTableCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cache:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for the cache database table';

    /**
     * The filesystem instance.
     *
     * @var \Tune\Filesystem\Filesystem
     */
    protected $files;

    /**
     * @var \Tune\Support\Composer
     *
     * @deprecated Will be removed in a future Harmony version.
     */
    protected $composer;

    /**
     * Create a new cache table command instance.
     *
     * @param  \Tune\Filesystem\Filesystem  $files
     * @param  \Tune\Support\Composer  $composer
     * @return void
     */
    public function __construct(Filesystem $files, Composer $composer)
    {
        parent::__construct();

        $this->files = $files;
        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $fullPath = $this->createBaseMigration();

        $this->files->put($fullPath, $this->files->get(__DIR__.'/stubs/cache.stub'));

        $this->components->info('Migration created successfully.');
    }

    /**
     * Create a base migration file for the table.
     *
     * @return string
     */
    protected function createBaseMigration()
    {
        $name = 'create_cache_table';

        $path = $this->harmony->databasePath().'/migrations';

        return $this->harmony['migration.creator']->create($name, $path);
    }
}
