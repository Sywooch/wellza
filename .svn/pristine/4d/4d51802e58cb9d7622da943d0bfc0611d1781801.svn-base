<?php
return  [
    'paths'=>[
        "/portfolio/get-portfolio"=> [
            "get"=> [
                "tags"=> [
                    "portfolio"
                ],
                "summary"=> "Get Portfolio",
                "description"=> "Get a portfolio",
                "operationId"=> "getportfolio",
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
        "/portfolio/add-portfolio"=> [
            "post"=> [
                "tags"=> [
                    "portfolio"
                ],
                "summary"=> "Add Portfolio",
                "description"=> "Add a portfolio",
                "operationId"=> "addportfolio",
                "produces"=> [
                    "application/x-www-form-urlencoded",
                    "application/json"
                ],
                "consumes" => [
                       "multipart/form-data",
                    "application/x-www-form-urlencoded",
                    ["video/mp4","video/quicktime","video/x-quicktime","video/x-m4v","video/mov","video/3gpp","video/mpeg"]
                    ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access token",
                        "required"=> true,
                         "type" => "string"
                       
                    ],
                    /*[
                        "in"=> "header",
                        "name"=> "media_type",
                        "type" => "string",
                        "enum" => ['Image','Video'],
                        "description"=> "Media Type",
                        "required"=> true,
                        "type" => "string"                        
                    ],*/
                    [
                        "in"=> "formData",
                        "name"=> "media_type",
                        "type" => "string",
                        "enum" => ['Image','Video'],
                        "description"=> "Media Type",
                        "required"=> true                        
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "media_url",
                        "type" => "file",
                        "allowMultiple" => true,
                        "description"=> "Upload media",
                        "required"=> false,
                    ]
                    
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
        "/portfolio/{id}"=> [
            "delete"=> [
                "tags"=> [
                    "portfolio"
                ],
                "summary"=> "Delete Portfolio",
                "description"=> "Delete portfolio of a provider",
                "operationId"=> "delete",
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
                        "in"=> "path",
                        "name"=> "id",
                        "description"=> "media id for particular item",
                        'type' => 'string',
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
        ]
    ],
    
    'definitions'=>[]
 ];



