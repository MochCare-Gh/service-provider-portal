<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Closure;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;

class TableMigrationCreator extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tablemigration {name : The name of the migration.}
        {--create= : The table to be created.}
        {--table= : The table to migrate.}
        {--path= : The location where the migration file should be created.}
        {--fields= : Fields to Migrate.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Migration File with Table Name And Fields';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The registered post create hooks.
     *
     * @var array
     */
    protected $postCreate = [];

    /**
     * Create a new migration creator instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
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
     * @return mixed
     */
    public function handle()
    {
        $path = $this->getMigrationPath();
        $name = trim($this->input->getArgument('name'));
        $table = $this->input->getOption('table');
        $create = $this->input->getOption('create') ?: false;
        $fields = $this->input->getOption('fields');
        $file = pathinfo($this->create($name, $path, $table, true, $fields), PATHINFO_FILENAME);
        $this->firePostCreateHooks();
        $this->composer->dumpAutoloads();
        $this->info($file);
    }

    /**
     * Create a new migration at the given path.
     *
     * @param  string  $name
     * @param  string  $path
     * @param  string  $table
     * @param  bool    $create
     * @return string
     * @throws \Exception
     */
    public function create($name, $path, $table = null, $create = false, $fields)
    {
        $this->ensureMigrationDoesntAlreadyExist($name);

        $path = $this->getPath($name, $path);

        // First we will get the stub file for the migration, which serves as a type
        // of template for the migration. Once we have those we will populate the
        // various place-holders, save the file, and run the post create event.
        $stub = $this->getStub($table, $create);

        $this->files->put($path, $this->populateStub($name, $stub, $table, $fields));

        $this->firePostCreateHooks();

        return $path;
    }

    /**
     * Ensure that a migration with the given name doesn't already exist.
     *
     * @param  string  $name
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    protected function ensureMigrationDoesntAlreadyExist($name)
    {
        if (class_exists($className = $this->getClassName($name))) {
            throw new InvalidArgumentException("A $className migration already exists.");
        }
    }

    /**
     * Get the migration stub file.
     *
     * @param  string  $table
     * @param  bool    $create
     * @return string
     */
    protected function getStub($table, $create)
    {
        if (is_null($table)) {
            return $this->files->get($this->getStubPath() . '/blank.stub');
        }

        // We also have stubs for creating new tables and modifying existing tables
        // to save the developer some typing when they are creating a new tables
        // or modifying existing tables. We'll grab the appropriate stub here.
        else {
            $stub = $create ? 'create.stub' : 'update.stub';

            return $this->files->get($this->getStubPath() . "/{$stub}");
        }
    }

    /**
     * Populate the place-holders in the migration stub.
     *
     * @param  string  $name
     * @param  string  $stub
     * @param  string  $table
     * @return string
     */
    protected function populateStub($name, $stub, $table, $fields)
    {

        $field = '';
        $stub = str_replace('DummyClass', $this->getClassName($name), $stub);
        $FinalFields = explode(',', $fields);
        foreach ($FinalFields as $fields) {
            $OneField = explode(':', $fields);
            switch ($OneField[1]) {

                case 'integer':
                    $field .= '$table->integer(\'' . $OneField[0] . '\');';
                    break;
                case 'biginteger':
                    $field .= '$table->bigInteger(\'' . $OneField[0] . '\');';
                    break;
                case 'float':
                    $field .= '$table->float(\'' . $OneField[0] . '\');';
                    break;
                case 'boolean':
                    $field .= '$table->boolean(\'' . $OneField[0] . '\');';
                    break;
                case 'date':
                    $field .= '$table->date(\'' . $OneField[0] . '\');';
                    break;
                case 'datetime':
                    $field .= '$table->dateTime(\'' . $OneField[0] . '\');';
                    break;
                case 'string':
                    $field .= '$table->string(\'' . $OneField[0] . '\');';
                    break;
                case 'text':
                    $field .= '$table->text(\'' . $OneField[0] . '\');';
                    break;
            }
        }
        $stub = str_replace('//Fields', $field, $stub);

        // Here we will replace the table place-holders with the table specified by
        // the developer, which is useful for quickly creating a tables creation
        // or update migration from the console instead of typing it manually.
        if (!is_null($table)) {
            $stub = str_replace('DummyTable', $table, $stub);
        }

        return $stub;
    }

    /**
     * Get the class name of a migration name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getClassName($name)
    {
        return Str::studly($name);
    }

    /**
     * Fire the registered post create hooks.
     *
     * @return void
     */
    protected function firePostCreateHooks()
    {
        foreach ($this->postCreate as $callback) {
            call_user_func($callback);
        }
    }

    /**
     * Register a post migration create hook.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public function afterCreate(Closure $callback)
    {
        $this->postCreate[] = $callback;
    }

    /**
     * Get the full path name to the migration.
     *
     * @param  string  $name
     * @param  string  $path
     * @return string
     */
    protected function getPath($name, $path)
    {
        return $path . '/' . $this->getDatePrefix() . '_' . $name . '.php';
    }

    /**
     * Get the date prefix for the migration.
     *
     * @return string
     */
    protected function getDatePrefix()
    {
        return date('Y_m_d_His');
    }

    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function getStubPath()
    {
        return __DIR__ . '/stubs';
    }

    /**
     * Get the filesystem instance.
     *
     * @return \Illuminate\Filesystem\Filesystem
     */
    public function getFilesystem()
    {
        return $this->files;
    }

    /**
     * Get migration path (either specified by '--path' option or default location).
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        if (!is_null($targetPath = $this->input->getOption('path'))) {
            return $this->laravel->basePath() . '/' . $targetPath;
        }
        return $this->getDefaultMigrationPath();
    }

    /**
     * Get the path to the migration directory.
     *
     * @return string
     */
    protected function getDefaultMigrationPath()
    {
        return $this->laravel->databasePath() . DIRECTORY_SEPARATOR . 'migrations';
    }
}
