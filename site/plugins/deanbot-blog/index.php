<?php
/*
Deps:
- https://github.com/bnomei/kirby3-feed (submodule: site/plugins/kirby3-feed)
provides rss feed method
*/

Kirby::plugin('deanbot/blog', [
    'routes' => [
        require 'routes/rss.php',
        require 'routes/blog.php'
    ],
    'blueprints' => [
        'pages/article.yml' => __DIR__ . '/blueprints/article.yml',
        'pages/blog.yml' => __DIR__ . '/blueprints/blog.yml'
    ],
    'controllers' => [
        'blog' => require 'controllers/blog.php',
        'article' => require 'controllers/article.php'
    ],
    'templates' => [
        'blog' => __DIR__ . '/templates/blog.php',
        'article'=> __DIR__ . '/templates/article.php'
    ],
    'thumbs' => [
        'presets' => [
        'default' => ['width' => 1024, 'quality' => 80],
        'twitter' => ['width' => 120, 'height' => 120, 'quality' => 80]
        ]
    ],
]);

function hasChildrenWithCategory($page, $term) {
    $pages = $page->children()->listed();
    return count( $pages->filterBy('category', $term) ) > 0;
}

function hasChildrenWithTag($page, $term) {
    $pages = $page->children()->listed();
    return count( $pages->filterBy('tags', $term, ',') ) > 0;
}
  

function getBlogCategoryDescription($page, $categoryTitle) {
    $categoryObjects = $page->categories()->yaml();
    $categoryIndex = array_search($categoryTitle, array_column($categoryObjects, 'title'));
    $categoryDescription = $categoryObjects[$categoryIndex]['description'];
    return $categoryDescription ?? '';
  }