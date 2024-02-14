<?php

return [
    "module" => 'Product',
    "model" => "ProductCategory",
    "route" => "admin.product-category",
    "sub_folder" => true,

    "fields" => [
        [
            "type" => "text_field",
            "name" => "name",
            "data_type" => "string",
            "validation" => ['required', 'max:255'],
            "default" => "",
            "chain" => [],
            "show_at_table" => true
        ],
        [
            "type" => "column",
            "name" => "slug",
            "data_type" => "string",
            "validation" => ['required', 'max:255'],
            "default" => "",
            "chain" => [],
        ],
        [
            "type" => "select_field",
            "name" => "status",
            "data_type" => "boolean",
            "validation" => ['required', 'boolean'],
            "default" => [
                ['name' => 'Select', 'value' => ''],
                ['name' => 'Inactive', 'value' => '0'],
                ['name' => 'Active', 'value' => '1'],
            ],
            "chain" => [],
            "show_at_table" => true
        ],
    ]
];
