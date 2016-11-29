<?php
return  [
    'paths'=>[
    "/services"=> [
            "get"=> [
                "tags"=> [
                    "services"
                ],
                "summary"=> "Services Categories (Client side)",
                "description"=> "List out all the services provided by provider",
                "operationId"=> "services",
                "produces"=> [
                    "application/xml",
                    "application/json"
                ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access token of the user",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ]
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
        "/services/sub-category-list"=> [
            "get"=> [
                "tags"=> [
                    "services"
                ],
                "summary"=> "Sub Categories List (Client side)",
                "description"=> "List out all the service sub categories provided by provider",
                "operationId"=> "subcategorylist",
                "produces"=> [
                    "application/xml",
                    "application/json"
                ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access token of the user",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "query",
                        "name"=> "category_id",
                        "description"=> "Service Category Id",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'integer'
                        ]
                    ]
                    
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
        "/services/get-all-services"=> [
            "get"=> [
                "tags"=> [
                    "services"
                ],
                "summary"=> "All Services (Provider side)",
                "description"=> "List out all the service and sub categories provided by provider",
                "operationId"=> "getallservices",
                "produces"=> [
                    "application/xml",
                    "application/json"
                ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access token of the provider",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ]                    
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
        "/services/get-preparation-status"=> [
            "get"=> [
                "tags"=> [
                    "services"
                ],
                "summary"=> "Get preparation status (client side)",
                "description"=> "Get preparation status for a particular service",
                "operationId"=> "getpreparationstatus",
                "consumes"=> [
                    "application/xml",
                    "application/json"
                ],
                "produces"=> [
                    "application/xml",
                    "application/json"
                ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access token of the provider",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "query",
                        "name"=> "category_id",
                        "description"=> "Category id for the service",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'integer'
                        ]
                    ],
                    [
                        "in"=> "query",
                        "name"=> "sub_category_id",
                        "description"=> "Sub category id for the service",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'integer'
                        ]
                    ]
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
        "/services/available-time"=> [
            "get"=> [
                "tags"=> [
                    "services"
                ],
                "summary"=> "Get Package (Client side)",
                "description"=> "Get Package on selected date",
                "operationId"=> "selectdate",
                "consumes"=> [
                    "application/xml",
                    "application/json",
                    "application/x-www-form-urlencoded"
                ],
                "produces"=> [
                    "application/xml",
                    "application/json"
                ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access Token",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'                            
                        ]
                    ],
                    [
                        "in"=> "query",
                        "name"=> "sub_service_id",
                        "type" => "string",
                        "description"=> "Service Id",
                        "required"=> true                                                  
                    ],    
                    [
                        "in"=> "query",
                        "name"=> "service_time",
                        "type" => "string",
                        "description"=> "Service time in minutes",
                        "required"=> true                                                  
                    ],
                    [
                        "in"=> "query",
                        "name"=> "service_price",
                        "type" => "string",
                        "description"=> "Service price",
                        "required"=> true                                                  
                    ]
                    
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
    ],
    
    'definitions'=>[]
 ];



