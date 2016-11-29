<?php

return [
    'paths' => [
        "/product" => [
            "get" => [
                "tags" => [
                    "product"
                ],
                "summary" => "Product List",
                "description" => "Product search",
                "operationId" => "product_search",
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
                    ],
                    [
                        "in" => "query",
                        "name" => "category_id",
                        "description" => "Category Id",
                        "required" => false,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "sub_category_id",
                        "description" => "Sub Category Id",
                        "required" => false,
                        "type" => "string"
                    ]
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/product/{id}" => [
            "get" => [
                "tags" => [
                    "product"
                ],
                "summary" => "Product List",
                "description" => "Product Detail",
                "operationId" => "product_detail",
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
                    ],
                    [
                        "in" => "path",
                        "name" => "id",
                        "description" => "Product Id",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "expand",
                        "description" => "Extra fields",
                        "required" => true,
                        "type" => "string",
                        "default"=>"product_image"
                    ]
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/product/purchased" => [
            "get" => [
                "tags" => [
                    "product"
                ],
                "summary" => "Purchased Product List",
                "description" => " PurchasedProduct Detail",
                "operationId" => "purchased_product_detail",
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
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/product/wellza-bundles" => [
            "get" => [
                "tags" => [
                    "product"
                ],
                "summary" => "Wellza bundles List",
                "description" => "Wellza bundles List",
                "operationId" => "wellza_bundles_list",
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
                    ],
                    [
                        "in" => "query",
                        "name" => "expand",
                        "description" => "Extra fields",
                        "required" => true,
                        "type" => "string",
                        "default"=>"bundle_categories"
                    ]
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/product/membership-plan" => [
            "get" => [
                "tags" => [
                    "product"
                ],
                "summary" => "Wellza Membership Plan",
                "description" => "Wellza Membership Plan",
                "operationId" => "wellza_membership_plan",
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
        ]
    ],
    'definitions' => []
];
    


