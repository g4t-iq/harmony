<?php

namespace Tune\Queue\Console;

use Tune\Console\Command;
use Tune\Filesystem\Filesystem;
use Tune\Support\Composer;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'queue:table')]
class TableCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'queue:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for the queue jobs database table';

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
     * Create a new queue job table command instance.
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
        $table = $this->harmony['config']['queue.connections.database.table'];

        $this->replaceMigration(
            $this->createBaseMigration($table), $table
        );

        $this->components->info('Migration created successfully.');
    }

    /**
     * Create a base migration file for the table.
     *
     * @param  string  $table
     * @return string
     */
    protected function createBaseMigration($table = 'jobs')
    {
        return $this->harmony['migration.creator']->create(
            'create_'.$table.'_table', $this->harmony->databasePath().'/migrations'
        );
    }

    /**
     * Replace the generated migration with the job table stub.
     *
     * @param  string  $path
     * @param  string  $table
     * @return void
     */
    protected function replaceMigration($path, $table)
    {
        $stub = str_replace(
            '{{table}}', $table, $this->files->get(__DIR__.'/stubs/jobs.stub')
        );

        $this->files->put($path, $stub);
    }
}
