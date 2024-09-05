<?php

/*
To add seo section to blueprints
Deps:
- https://github.com/tobimori/kirby-seo.git (submodule: site/plugins/seo)
provides meta/search tags, sitemap and and robots
*/

load([
    'NotePage' => 'models/NotePage.php',
], __DIR__);

Kirby::plugin('deanbot/wiki', [
    'blueprints' => [
        'pages/note' => __DIR__ . '/blueprints/note.yml',
        'pages/wiki' => __DIR__ . '/blueprints/wiki.yml'
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