<?php

return [
    // set true to enable Demo routes : '/demos'
    'demo' => false,

    'topbar' => null, // default sb-admin-2::layouts.partials.topbar
    'sidebar-menu' => null, // default sb-admin-2::layouts.partials.sidebar-menu
    'brand' => null, // default sb-admin-2::layouts.partial.brand

    'component' => [
        'enable' => false,
        'registers' => [
            'heading' => 'sb-admin-2::components.heading',
            'box'     => 'sb-admin-2::components.box',
        ]
    ],
];
