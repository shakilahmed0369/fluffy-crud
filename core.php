<?php

return [
    "module" => 'ProductCategory',
    "model" => "ProductCategory",
    "route" => "admin.product-category",
    "sub_folder" => false,

    "fields" => [
        [
            "type" => "text_field",
            "name" => "category",
            "data_type" => "string",
            "validation" => ['required', 'max:255'],
            "default" => "",
            "chain" => []
        ],
        [
            "type" => "column",
            "name" => "slug",
            "data_type" => "string",
            "validation" => ['nullable', 'max:255'],
            "default" => "",
            "chain" => []
        ],
    ]
];
