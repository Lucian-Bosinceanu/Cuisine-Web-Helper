<?php
return [
    'engine' => 'blade',
    'options' => [
        'twig'  => [
            'path'       => [ ROOTPATH . 'app/CuisineHelper/Http/Views', ROOTPATH . 'app/CuisineHelper/Library/Http/View/Views/DefaultViews' ],
            'error_view' => 'error_view.html',
            'options'    => [
                'cache'       => DEFAULT_VIEW_CACHE_PATH,
                'auto_reload' => true,
                'debug'       => true
            ]
        ],
        'blade' => [
            'path'  => DEFAULT_VIEW_PATH,
            'cache' => DEFAULT_VIEW_CACHE_PATH,
        ]
    ]
];
