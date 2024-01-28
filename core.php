<?php

return [
    "module" => 'Test',
    "model" => "Test",
    "sub_folder" => false,

    "fields" => [
        [
            "type" => "text_field",
            "name" => "category",
            "data_type" => "string",
            "validation" => ['required', 'max:255'],
            "default" => "",
            "chain" => [
                "nullable" => null
            ]
        ],
        [
            "type" => "text_field",
            "name" => "slug",
            "data_type" => "string",
            "validation" => ['required', 'max:255'],
            "default" => "",
            "chain" => []
        ],
        [
            "type" => "select_field",
            "name" => "status",
            "data_type" => "integer",
            "validation" => ['required', 'boolean'],
            "default" => [
                ["name" => "Active", "value" => 1],
                ["name" => "Inactive", "value" => 0],
            ],
            "chain" => ["default" => 0]
        ],
        [
            "type" => "column",
            "name" => "icon_id",
            "data_type" => "foreignId",
            "validation" => ['required', 'max:255'],
            "chain" => [
                "nullable" => true
            ]
        ],
        // [
        //     "type" => "select_field",
        //     "label" => "Status",
        //     "validation" => ['required'],
        //     "defalult" => [
        //         ["name" => "Active", "value" => 1],
        //         ["name" => "Inactive", "value" => 0],
        //     ],
        // ],
        // [
        //     "type" => "textaria_field",
        //     "label" => "Category Name",
        //     "validation" => [],
        //     "defalult" => "",
        // ],
    ]
];
