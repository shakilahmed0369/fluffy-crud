<?php

return [
    "module" => 'Testimonial',
    "model" => "Testimonial",
    "route" => "admin.testimonial",
    "sub_folder" => false,

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
            "type" => "text_field",
            "name" => "title",
            "data_type" => "string",
            "validation" => ['required', 'max:50'],
            "default" => "",
            "chain" => [],
            "show_at_table" => true
        ],
        [
            "type" => "textarea_field",
            "name" => "review",
            "data_type" => "text",
            "validation" => ['required'],
            "default" => "",
            "chain" => [],
        ],
        [
            "type" => "select_field",
            "name" => "status",
            "data_type" => "boolean",
            "validation" => ['required'],
            "default" => [
                ['name' => 'Active', 'value' => '1'],
                ['name' => 'Inactive', 'value' => '0'],
            ],
            "chain" => ['default' => 0],
        ],
    ]
];
