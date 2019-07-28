<?php

return [
    // set true to enable Demo routes : '/demos'
    'demo' => false,

    'topbar' => null, // default sb-admin-2::layouts.partials.topbar
    'sidebar-menu' => null, // default sb-admin-2::layouts.partials.sidebar-menu
    'brand' => null, // default sb-admin-2::layouts.partial.brand

    'components' => [
        'heading' => 'sb-admin-2::components.heading',
        'box'     => 'sb-admin-2::components.box',
    ],

    'plugins' => [
        'chart' => [
            'js' => [
                'sb-admin-2/plugins/chart.js/Chart.min.js'
            ],
        ],
        'datatable' => [
            'js' => [
                'sb-admin-2/plugins/datatables/jquery.dataTables.min.js',
                'sb-admin-2/plugins/datatables/dataTables.bootstrap4.min.js',
            ],
            'css' => [
                'sb-admin-2/plugins/datatables/dataTables.bootstrapt4.min.css'
            ],
        ],
    ],
];
