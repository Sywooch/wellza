<?php

return [
    'paths' => [
        "/blog" => [
            "get" => [
                "tags" => [
                    "blog"
                ],
                "summary" => "Blog List",
                "description" => "Blog List",
                "operationId" => "blog_list",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token of the user",
                        "required" => true,
                        "schema" => [
                            'type' => 'string'
                        ]
                    ]
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
    ],
    'definitions' => [
    ]
];
