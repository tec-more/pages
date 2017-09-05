<?php

return [
    /**
     * Public routes
     */
    'public_routes' => [
        'web' => [
            'get' => [
                [
                    '/{slug?}',
                    [
                        'as' => 'front.web.resolve-pages.get',
                        'uses' => 'Tukecx\Base\Pages\Http\Controllers\Front\ResolvePagesController@handle',
                        'where' => [
                            'slug' => '[-A-Za-z0-9]+'
                        ]
                    ]
                ]
            ],
        ],
        'api' => [

        ],
    ],
    /**
     * Custom route location
     * You can pass the files directory here
     * Example: web => [base_path(...), base_path(xxx)]
     */
    'custom_route_locations' => [
        'web' => [

        ],
        'api' => [

        ],
    ]
];
