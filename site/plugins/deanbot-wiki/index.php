<?php

load([
    'NotePage' => 'models/NotePage.php',
], __DIR__);

Kirby::plugin('deanbot/wiki', [
    'blueprints' => [
        'pages/note.yml' => __DIR__ . '/blueprints/note.yml',
        'pages/wiki.yml' => __DIR__ . '/blueprints/wiki.yml'
    ],
    'pageModels' => [
        'note' => NotePage::class
    ],
    'controllers' => [
        'note' => require 'controllers/note.php',
        'wiki' => require 'controllers/wiki.php'
    ],
    'templates' => [
        'note' => __DIR__ . '/templates/note.php',
        'wiki' => __DIR__ . '/templates/wiki.php'
    ]
]);