<?php
return  [
    'paths'=>[
    "/availability/my-availability"=> [
            "post"=> [
                "tags"=> [
                    "availability"
                ],
                "summary"=> "Get availability",
                "description"=> "List out all the available slots",
                "operationId"=> "myavailability",
                "consumes"=> [
                    "application/xml",
                    "application/json",
                    "application/x-www-form-urlencoded"
                ],
                "produces"=> [
                    "application/xml",
                    "application/x-www-form-urlencoded",
                    "application/json"
                ],
                "parameters"=> [
                    [
                        "in"=> "header",
                        "name"=> "access-token",
                        "description"=> "Access token",
                        "type" => "string",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "on_date",
                        "description"=> "Availability Date <br/><b>(Format:dd-mm-yyyy)</b>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string',
                            'format' => 'date'
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
        "/availability/add-availability"=> [
            "post"=> [
                "tags"=> [
                    "availability"
                ],
                "summary"=> "Add availability",
                "description"=> "Add the available time slot",
                "operationId"=> "addavailability",
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
                        "description"=> "Access token",
                        "type" => "string",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "from_time",
                        "description"=> "From Available Time <br/><b>(Format: hh:mm:ss)<b/>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "to_time",
                        "description"=> "To Available Time <br/><b>(Format: hh:mm:ss)<b/>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "on_date",
                        "description"=> "On Available Date <br/><b>(Format: dd:mm:yyyy)<b/>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string',
                            "format" => "date"
                        ]
                    ],
                ],
                "responses"=> [
                    "default"=> [
                        "description"=> "successful operation"
                    ]
                ]
            ]
        ],
        "/availability/edit-availability"=> [
            "post"=> [
                "tags"=> [
                    "availability"
                ],
                "summary"=> "Edit availability",
                "description"=> "Edit the available time slot",
                "operationId"=> "editavailability",
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
                        "description"=> "Access token",
                        "type" => "string",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "slot_id",
                        "description"=> "Time slot id",
                        "type" => "integer",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'integer'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "from_time",
                        "description"=> "From Available Time <br/><b>(Format: hh:mm:ss)<b/>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "to_time",
                        "description"=> "To Available Time <br/><b>(Format: hh:mm:ss)<b/>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "formData",
                        "name"=> "on_date",
                        "description"=> "On Available Date <br/><b>(Format: dd:mm:yyyy)<b/>",
                        "type" => "string",
                        "required"=> false,
                        "schema"=> [
                            'type' => 'string',
                            "format" => "date"
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
        "/availability/delete-availability"=> [
            "delete"=> [
                "tags"=> [
                    "availability"
                ],
                "summary"=> "Delete availability",
                "description"=> "Delete the available time slot",
                "operationId"=> "deleteavailability",
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
                        "description"=> "Access token",
                        "type" => "string",
                        "required"=> true,
                        "schema"=> [
                            'type' => 'string'
                        ]
                    ],
                    [
                        "in"=> "query",
                        "name"=> "slot_id",
                        "description"=> "Time slot id",
                        "type" => "integer",
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
    ],
    
    'definitions'=>[]
 ];



