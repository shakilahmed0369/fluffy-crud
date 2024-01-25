<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CoreGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'will generate crud from core';


    /**
     * Core array.
     *
     * @var array
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dd($this->checkBaseArray());
    }

    /**
     * Get the array from core.php
     */
    function baseArray(): array {
        $data = require base_path('core.php');
        return $data;
    }

    function checkBaseArray() {
        $this->checkDefaults();
    }

   function checkDefaults() {
        $data = $this->baseArray();
        $supportedFieldTypes = ['text_field'];

        if (!isset($data['module']) || !is_string($data['module'])) {
            $this->error('The "module" key is missing or is not a string.');
        }

        if (!isset($data['model']) || !is_string($data['model'])) {
            $this->error('The "model" key is missing or is not a string.');
        }

        if (!isset($data['sub_folder']) || !is_bool($data['sub_folder'])) {
            $this->error('The "sub_folder" key is missing or is not a boolean.');
        }
        if (!isset($data['fields']) || !is_array($data['fields'])) {
            $this->error('The "fieldes" key is missing or is not a array.');
        }

        foreach ($data['fields'] as $index => $field) {
            // Print the portion of the array causing the error
            $this->line("Field at index $index:");
            $this->line(print_r($field, true));

            // Validate 'type' key
            if (!isset($field['type']) || !is_string($field['type'])) {
                $this->error("Field at index $index: The 'type' inside 'fields' key is missing or is not a string.");
                throw new \Exception("Validation failed for field at index $index: 'type' key is missing or is not a string.");
            }

            // Validate 'name' key
            if (!isset($field['name']) || !is_string($field['name'])) {
                $this->error("Field at index $index: The 'name' inside 'fields' key is missing or is not a string.");
                throw new \Exception("Validation failed for field at index $index: 'name' key is missing or is not a string.");
            }

            // Validate 'label' key
            if (!isset($field['label']) || !is_string($field['label'])) {
                $this->error("Field at index $index: The 'label' inside 'fields' key is missing or is not a string.");
                throw new \Exception("Validation failed for field at index $index: 'label' key is missing or is not a string.");
            }

            // Validate 'validation' key
            if (!isset($field['validation']) || !is_array($field['validation'])) {
                $this->error("Field at index $index: The 'validation' inside 'fields' key is missing or is not an array.");
                throw new \Exception("Validation failed for field at index $index: 'validation' key is missing or is not an array.");
            }

            // Validate 'default' key
            if (!isset($field['default'])) {
                $this->error("Field at index $index: The 'default' inside 'fields' key is missing.");
                throw new \Exception("Validation failed for field at index $index: 'default' key is missing.");
            }
        }

    }

}
