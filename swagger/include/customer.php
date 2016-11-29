<?php
return  [
    'paths'=>[
        
    ],
    
    'definitions'=>[
        'allproviders' => [
            'type' => "object",
            'properties' => [
                'service_id'=>[
                    'type'=>'integer'
                ],
                'sub_service_id'=>[
                    'type'=>'integer'
                ],
                'latitude'=>[
                    'type'=>'number'
                ],
                'longitude'=>[
                    'type'=>'number'
                ]
            ],
            'xml' => [
                'name' => "AllProviders"
            ]
        ],
    ]
 ];





