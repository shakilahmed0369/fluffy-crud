<?php

namespace App\Xcore;

use Nwidart\Modules\Facades\Module;

class Validator
{
    public array $data;

    function __construct(array $coreArray)
    {
        $this->data = $coreArray;
    }

    function validaateBaseArray()
    {
        // $supportedFieldTypes = ['text_field'];

        if (!isset($this->data['module']) || !is_string($this->data['module'])) {
            throw new \Exception('The "module" key is missing or is not a string.');
        }

        // check module
        if(!Module::has($this->data['module'])) {
            throw new \Exception("The '{$this->data["module"]}' not found please create the moudel first.");
        }

        if (!isset($this->data['model']) || !is_string($this->data['model'])) {
            throw new \Exception('The "model" key is missing or is not a string.');
        }

        if (!isset($this->data['sub_folder']) || !is_bool($this->data['sub_folder'])) {
            throw new \Exception('The "sub_folder" key is missing or is not a boolean.');
        }
        if (!isset($this->data['fields']) || !is_array($this->data['fields'])) {
            throw new \Exception('The "fieldes" key is missing or is not a array.');
        }

        foreach ($this->data['fields'] as $index => $field) {

            // Validate 'type' key
            if (!isset($field['type']) || !is_string($field['type'])) {
                throw new \Exception("Field at index $index: The 'type' inside 'fields' key is missing or is not a string.");
            }

            // Validate 'name' key
            if (!isset($field['name']) || !is_string($field['name'])) {
                throw new \Exception("Field at index $index: The 'name' inside 'fields' key is missing or is not a string.");
            }

            // validation for text field
            if ($field['type'] === 'text_field') {
                // Validate 'label' key
                if (!isset($field['label']) || !is_string($field['label'])) {
                    throw new \Exception("Field at index $index: The 'label' inside 'fields' key is missing or is not a string.");
                }

                // Validate 'validation' key
                if (!isset($field['validation']) || !is_array($field['validation'])) {
                    throw new \Exception("Field at index $index: The 'validation' inside 'fields' key is missing or is not an array.");
                }

                // Validate 'default' key
                if (!isset($field['default'])) {
                    throw new \Exception("Field at index $index: The 'default' inside 'fields' key is missing.");
                }
            }
        }
    }
}
