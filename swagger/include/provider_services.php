<?php
return  [
    'paths'=>[
        "/provider-services/manage-provider-services"=> [
            "post"=> [
                "tags"=> [
                    "provider_services"
                ],
                "summary"=> "Edit Provider Services",
                "description"=> "All the services owned by providers will be edited",
                "operationId"=> "editservices",
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
                        "in"=> "formData",
                        "name"=> "add_service",
                        "type" => "array",
                        "multiLine"=> true,
                        "description"=> "Edit Provider Services",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string',
                            '$ref'=> "#/definitions/editservices"                            
                        ]
                    ],
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ]
    ],
    
    'definitions'=>[]
 ];



