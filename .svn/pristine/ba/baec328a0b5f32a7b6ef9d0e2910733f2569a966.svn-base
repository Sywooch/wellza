<?php

return [
    'paths' => [
        "/appointment/add-appointment" => [
            "post" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Add appointment",
                "description" => "Add appointment for a client.",
                "operationId" => "addappointment",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
                        ]
                    ],
                    [
                        "in" => "body",
                        "name" => "body",
                        "description" => "Add the appointment for a client.<b>on_time must be (hh:mm:ss)</b><br/><b>on_date must be (dd-mm-yyyy)</b>",
                        "type" => "date",
                        "required" => false,
                        "schema" => [
                            '$ref' => "#/definitions/addappointment"
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
        "/appointment/upcoming-appointment" => [
            "get" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Upcoming appointment",
                "description" => "Get upcoming appointment of a client",
                "operationId" => "upcomingappointment",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
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
        "/appointment/completed-appointment" => [
            "get" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Completed appointment",
                "description" => "Get completed appointment of a client",
                "operationId" => "completedappointment",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
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
        "/appointment/check-in" => [
            "get" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Check In",
                "description" => "Appointment Check In",
                "operationId" => "checkin",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
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
        "/appointment/checkout" => [
            "get" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Check Out",
                "description" => "Appointment Check Out",
                "operationId" => "checkout",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
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
        "/appointment/pending" => [
            "get" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "pending",
                "description" => "Appointment pending",
                "operationId" => "pending",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
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
        "/appointment/complete" => [
            "get" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Complete",
                "description" => "Appointment Complete",
                "operationId" => "complete",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
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
        "/appointment/{id}/cancel" => [
            "post" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Cancel",
                "description" => "Appointment Cancel",
                "operationId" => "cancel",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "header",
                        "name" => "access-token",
                        "description" => "Access token",
                        "type" => "string",
                        "required" => true,
                        "schema" => [
                            "type" => "string"
                        ]
                    ],
                    [
                        "in" => "path",
                        "name" => "id",
                        "description" => "Appointment Id",
                        "type" => "integer",
                        "required" => true,
                        "schema" => [
                            '$ref' => "#/definitions/cancel_appointment"
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
        "/appointment/rating" => [
            "post" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Submit Review & Rating",
                "operationId" => "submitreview",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "access-token",
                        "in" => "header",
                        "description" => "The user auth token",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "in" => "body",
                        "name" => "body",
                        "description" => "",
                        "required" => true,
                        "schema" => [
                            '$ref' => "#/definitions/rating"
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
        "/appointment/{id}/reschedule" => [
            "post" => [
                "tags" => [
                    "appointment"
                ],
                "summary" => "Reschedule Appointment",
                "operationId" => "reschedule_appointment",
                "produces" => [
                    "application/xml",
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "access-token",
                        "in" => "header",
                        "description" => "The user auth token",
                        "required" => true,
                        "type" => "string"
                    ],
                    [
                        "name" => "id",
                        "in" => "path",
                        "description" => "Appointment Id",
                        "required" => true,
                        "type" => "integer"
                    ],
                    [
                        "in" => "body",
                        "name" => "body",
                        "description" => "",
                        "required" => true,
                        "schema" => [
                            '$ref' => "#/definitions/reschedule"
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
        'addappointment' => [
            'type' => "object",
            'properties' => [
                'package_id' => [
                    'type' => 'integer'
                ],
                'appointment_time' => [
                    'type' => 'string'
                ],
                'appointment_date' => [
                    'type' => 'string'
                ],
                'appointment_price' => [
                    'type' => 'string'
                ],
                'appointment_duration' => [
                    'type' => 'string'
                ],
                'provider_id' => [
                    'type' => 'integer'
                ],
                'additional_info' => [
                    'type' => 'string'
                ],
                'address1' => [
                    'type' => 'string'
                ],
                'address2' => [
                    'type' => 'string'
                ],
                'city' => [
                    'type' => 'string'
                ],
                'province' => [
                    'type' => 'string'
                ],
                'telephone_number' => [
                    'type' => 'string'
                ],
                'postal_code' => [
                    'type' => 'string'
                ],
                'personal_information' => [
                    'type' => 'string'
                ]
            ],
            'xml' => [
                'name' => "Addappointment"
            ]
        ],
        'rating' => [
            'type' => "object",
            'properties' => [
                'provided_to' => [
                    'type' => "integer"
                ],
                'appointment_id' => [
                    'type' => "integer",
                ],
                'rating' => [
                    'type' => "integer",
                ],
                'review' => [
                    'type' => "string",
                ],
            ],
            'xml' => [
                'name' => "rating"
            ]
        ],
        'reschedule' => [
            'type' => "object",
            'properties' => [
                'appointment_time' => [
                    'type' => 'string'
                ],
                'appointment_date' => [
                    'type' => 'string'
                ],
                'appointment_price' => [
                    'type' => 'string'
                ],
                'appointment_duration' => [
                    'type' => 'string'
                ]
            ],
            'xml' => [
                'name' => "rating"
            ]
        ],
    ]
];
