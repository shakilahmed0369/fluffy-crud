<?php

return [
    "module" => 'ProductCategory',
    "model" => "HelloWorld",
    "route" => "admin.hello-world",
    "sub_folder" => true,

    "fields" => [
        [
            "type" => "text_field",
            "name" => "category",
            "data_type" => "string",
            "validation" => ['required', 'max:255'],
            "default" => "",
            "chain" => ['default' => 1],
            "show_at_table" => true
        ],
    ]
];
