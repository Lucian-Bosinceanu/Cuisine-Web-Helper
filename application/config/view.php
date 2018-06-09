<?php
return [
    'engine'  => 'blade',
    'options' => [
        'twig'  => [
            'path'       => [ base_path() . 'app/CuisineHelper/Http/Views', base_path() . 'app/CuisineHelper/Library/Http/View/Views/DefaultViews' ],
            'error_view' => 'error_view.html',
            'options'    => [
                'cache'       => base_path() . "storage/app/view/cache",
                'auto_reload' => true,
                'debug'       => true
            ]
        ],
        'blade' => [
            'path'       => base_path() . "app/CuisineHelper/Http/Views",
            'cache'      => base_path() . "storage/app/view/cache",
            'error_view' => base_path() . "app/CuisineHelper/Http/Views/defaults/error_view"
        ]
    ]
];
