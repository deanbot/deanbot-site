<?php 

Kirby::plugin('deanbot/web-app-config', [
    'options' =>  [
        'themeColor' => '#01677D'
    ],
    'snippets' => [
        'web-app-config' => __DIR__ . '/snippets/web-app-config.php'
    ]
]);

// used in web manifest
// $GLOBALS['backgroundColor'] = '#FBFBFF';