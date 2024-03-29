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
        $template = str_replace('$TABLE_NAME$', $this->pluralizedName($this->tableName), $template);
        $template = str_replace('$COLUMNS$', $this->generateColumns(), $template);

        $migrationFileName = $this->generateMigrationName($this->tableName);
        $migrationFilePath = $this->migrationPath . '/' . $migrationFileName . '.php';

        file_put_contents($migrationFilePath, $template);

        echo "Migration Generated Successfully: $migrationFilePath" . "\n";
    }


    function generateColumns(): string
    {
        $columns = "";

        foreach ($this->coreArray['fields'] as $entity) {
            switch ($entity['type']) {
                case 'text_field':
                case 'textarea_field':
                case 'select_field':
                    $chains = $this->processChain($entity['chain']);
                    $columns .= '$table->' . $entity['data_type'] . '("' . Str::snake($entity['name']) . '")' . $chains . ";" .  "\n\t\t\t";
                    break;

                case 'column':
                    $chains = $this->processChain($entity['chain']);
                    $columns .= '$table->' . $entity['data_type'] . '("' . Str::snake($entity['name']) . '")' . $chains . ";" . "\n\t\t\t";
                    break;

                default:
                    # code...
                    break;
            }
        }
        return $columns;
    }

    function processChain($chainsArray = [])
    {
        $chains = "";
        foreach ($chainsArray as $key => $chain) {
            if ($chain === null) {
                $chains .= "->" . $key . "(" . $chain . ")";
            } else {
                $chains .= "->" . $key . "('" . $chain . "')";
            }
        }

        return $chains;
    }


    function generateMigrationName($name)
    {
        // Generate a timestamp to include in the migration filename
        $timestamp = now()->format('Y_m_d_His');

        $pluralizedName = $this->pluralizedName($name);

        // Generate the migration filename format
        $migrationName = $timestamp . '_create_' . $pluralizedName . '_table';

        return $migrationName;
    }

    function pluralizedName($name) {
        $pluralizedName = Str::pluralStudly($name);
        return  Str::snake($pluralizedName);
    }

    function validator()
    {
    }
}
