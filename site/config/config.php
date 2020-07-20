<?php
$config = [
  'debug'  => true,
  'markdown' => [
    'extra' => true
  ],
  'thumbs' => [
    'presets' => [
      'default' => ['width' => 1024, 'quality' => 80],
      'twitter' => ['width' => 120, 'height' => 120, 'quality' => 80]
    ]
  ],
  'routes' => require('routes.php')
];
$metaTagsConfig = require('meta-tags.php');
$sitemapConfig = require('sitemap.php');
$robots = require('robots.php');
return array_merge($config, $metaTagsConfig, $sitemapConfig, $robots);