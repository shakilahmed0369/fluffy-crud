<?php

return [
    "module" => 'Test',
    "model" => "Test",
    "sub_folder" => true,

    "fields" => [
        [
            "type" => "text_field",
            "name" => "category",
            "label" => "Category Name",
            "validation" => ['required', 'max:255'],
            "default" => "",
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
