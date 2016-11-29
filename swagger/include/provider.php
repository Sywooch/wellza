<?php

return [
    'paths' => [
        "/provider" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "providers list",
                "description" => "Provider search",
                "operationId" => "provider_search",
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
                        "name" => "service_id",
                        "description" => "Service Id",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "sub_service_id",
                        "description" => "Sub Service Id",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "latitude",
                        "description" => "latitude",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "longitude",
                        "description" => "Longitude",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "service_date",
                        "description" => "service date i.e.  YYYY-mm-dd format 2016-08-22",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "service_time",
                        "description" => "Service Time i.e.  24 hour format 17:00:00",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "service_time_duration",
                        "description" => "Time duration in minutes i.e. 30,60,90",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "is_favourite",
                        "description" => "send true for favourite list",
                        'required'=> false,
                        'type'=> "boolean",
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/provider/favourite-providers" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "Favourite Providers",
                "description" => "Favourite Providers",
                "operationId" => "favourite_providers",
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
        "/provider/{provider_id}" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "provider detail",
                "description" => "Provider search",
                "operationId" => "provider_search",
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
                        "name" => "provider_id",
                        "description" => "Provider Id",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "expand",
                        "description" => "Extra fields",
                        "required" => true,
                        "type" => "string",
                        "default"=>"portfolio,review_count,rating,thread_id"
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/provider/{provider_id}/favourite" => [
            "post" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "Mark Favourite/Unfavourate",
                "description" => "Provider search",
                "operationId" => "provider_search",
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
                        "name" => "provider_id",
                        "description" => "Provider Id",
                        "required" => true,
                        "type" => "integer"
                    ],
                      [
                        "in"=> "body",
                        "name"=> "body",
                        "description"=> "Send true for mark favourate and false for unfavourite",
                        "required"=> false,
                        "schema"=> [
                            '$ref'=> "#/definitions/favourite"
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
        "/provider/{id}/sales-history" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "provider's Sales History",
                "description" => "provider's Sales History",
                "operationId" => "sales_history",
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
                        "description" => "Provider Id",
                        "required" => true,
                        "type" => "integer"
                    ],
                    [
                        "in" => "query",
                        "name" => "from_date",
                        "description" => "From Date",
                        "required" => false,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "to_date",
                        "description" => "To date",
                        "required" => false,
                        "type" => "string"
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/provider/{id}/upcoming-appointment" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "provider's Upcoming Appointment",
                "description" => "provider's Upcoming Appointment",
                "operationId" => "upcoming_appointment",
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
                        "description" => "Provider Id",
                        "required" => true,
                        "type" => "integer"
                    ],
                    [
                        "in" => "query",
                        "name" => "from_date",
                        "description" => "From Date",
                        "required" => false,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "to_date",
                        "description" => "To date",
                        "required" => false,
                        "type" => "string"
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/provider/{id}/completed-appointment" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "provider's Compeleted Appointment",
                "description" => "provider's Compeleted Appointment",
                "operationId" => "completed_appointment",
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
                        "description" => "Provider Id",
                        "required" => true,
                        "type" => "integer"
                    ],
                    [
                        "in" => "query",
                        "name" => "from_date",
                        "description" => "From Date",
                        "required" => false,
                        "type" => "string"
                    ],
                    [
                        "in" => "query",
                        "name" => "to_date",
                        "description" => "To date",
                        "required" => false,
                        "type" => "string"
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
        "/provider/{id}/review" => [
            "get" => [
                "tags" => [
                    "provider"
                ],
                "summary" => "provider's Review",
                "description" => "provider's Review",
                "operationId" => "providers_review",
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
                        "description" => "Provider Id",
                        "required" => true,
                        "type" => "integer"
                    ],
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
         'favourite' => [
            'type' => "object",
            'properties' => [
                'is_favourite'=>[
                    'type'=>'boolean'
                ],
            ],
            'xml' => [
                'name' => "Register"
            ]
        ],
    ]
];



