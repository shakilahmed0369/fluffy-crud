<?php

namespace App\Xcore;

use Exception;
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
        $core = $this->data;
        // $supportedFieldTypes = ['text_field'];

        // core array structure validation
        if(!isset($core['module'])) {
            throw new Exception("The 'module' key is missing");
        }
        if(!is_string($core['module'])) {
            throw new Exception("The 'module' name should be a string.");
        }
        if(empty($core['module'])) {
            throw new Exception("The 'module' name is required.");
        }
        // check module
        if(!Module::has($core['module'])) {
            throw new Exception("The '{$core["module"]}' not found please create the module first.");
        }

        if (!isset($core['model']) || !is_string($core['model'])) {
            throw new \Exception('The "model" key is missing or is not a string.');
        }
        if (empty($core['model'])) {
            throw new \Exception('The "model" name is required.');
        }

        if (!isset($core['sub_folder']) || !is_bool($core['sub_folder'])) {
            throw new \Exception('The "sub_folder" key is missing or is not a boolean.');
        }
        if (!isset($core['fields']) || !is_array($core['fields'])) {
            throw new \Exception('The "fields" key is missing or is not a array.');
        }

        // field items validation
        $requiredFields = ['type', 'name', 'data_type', 'validation', 'default', 'chain'];
        $allowedType = ['text_field', 'textarea_field', 'select_field', 'column'];

         // Check if all required fields are present
        foreach($core['fields'] as $index => $field) {
            foreach ($requiredFields as $requiredField) {
                if (!array_key_exists($requiredField, $field)) {
                    // Handle missing required field
                    throw new Exception("Field at index $index is missing required field: $requiredField");
                }
            }

            if(!in_array($field['type'], $allowedType)) {
                throw new Exception("Error at index $index 'type' not supported: {$field['type']}");
            }

            if(empty($field['name'])) {
                throw new Exception("Error at index $index : name doesn't have any value");
            }

            if(!is_string($field['name'])) {
                throw new Exception("Error at index $index : name have to be a string");
            }

            if(empty($field['data_type'])) {
                throw new Exception("Error at index $index : data_type doesn't have any value");
            }

            if(!is_string($field['data_type'])) {
                throw new Exception("Error at index $index : data_type have to be a string");
            }

            if(!is_array($field['validation'])) {
                throw new Exception("Error at index $index : validation have to be a array");
            }

            if(!is_array($field['chain'])) {
                throw new Exception("Error at index $index : chain have to be a array");
            }

        }
    }
}
