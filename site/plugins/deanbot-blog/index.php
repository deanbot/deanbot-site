<?php

/*
To add seo section to blueprints
Deps:
- https://github.com/tobimori/kirby-seo.git (submodule: site/plugins/seo)
provides meta/search tags, sitemap and and robots
- https://github.com/bnomei/kirby3-feed (submodule: site/plugins/kirby3-feed)
provides feed method for RSS
*/

load([
    'BlogPage' => 'models/BlogPage.php',
], __DIR__);

Kirby::plugin('deanbot/blog', [
    'routes' => [
        require 'routes/rss.php',
        require 'routes/blog.php'
    ],
    'blueprints' => [
        'pages/article' => __DIR__ . '/blueprints/article.yml',
        'pages/blog' => __DIR__ . '/blueprints/blog.yml'
    ],
    'controllers' => [
        'blog' => require 'controllers/blog.php',
        'article' => require 'controllers/article.php'
    ],
    'templates' => [
        'blog' => __DIR__ . '/templates/blog.php',
        'article'=> __DIR__ . '/templates/article.php'
    ],
    'pageModels' => [
        'blog' => BlogPage::class
    ],
    'thumbs' => [
        'presets' => [
            'default' => ['width' => 1024, 'quality' => 80],
            'twitter' => ['width' => 120, 'height' => 120, 'quality' => 80]
        ]
    ],
]);