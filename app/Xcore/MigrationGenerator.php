<?php

namespace App\Xcore;

use Str;

class MigrationGenerator
{

    public $coreArray;
    public $moduleName;
    public $migrationPath;
    public $tableName;

    function __construct($coreArray)
    {
        $this->coreArray = $coreArray;
        $this->moduleName = $this->coreArray['module'];
        $this->migrationPath = module_path($this->moduleName, 'database/migrations');
        $this->tableName = Str::snake($this->coreArray['model']);
    }

    function generate()
    {
        $this->validator();
        $this->createMigration();
    }

    function createMigration()
    {
        $template = file_get_contents(app_path('Xcore/src/app/Migration.stub'));
        $template = str_replace('$TABLE_NAME$', $this->tableName, $template);
        $template = str_replace('$COLUMNS$', $this->generateColumns(), $template);

        $migrationFileName = $this->generateMigrationName($this->tableName);
        $migrationFilePath = $this->migrationPath. '/' . $migrationFileName. '.php';

        file_put_contents($migrationFilePath, $template);

        echo "Migration Generated Successfully: $migrationFilePath" . "\n";
    }


    function generateColumns(): string
    {
        $columns = "";

        foreach ($this->coreArray['fields'] as $entity) {
            switch ($entity['type']) {
                case 'text_field':
                    $columns .= '$table->string("' . Str::snake($entity['name']) . '");' . "\n\t\t\t";
                    break;

                default:
                    # code...
                    break;
            }
        }
        return $columns;
    }

    function generateMigrationName($name)
    {
        // Generate a timestamp to include in the migration filename
        $timestamp = now()->format('Y_m_d_His');

        // Generate the migration filename format
        $migrationName = $timestamp . '_create_' . str_replace(' ', '_', strtolower($name)) . '_table';
        return $migrationName;
    }

    function validator()
    {
    }
}
