<?php
$config = [
  'debug'  => true,
  'markdown' => [
    'extra' => true
  ],
  'routes' => require('routes.php')
];
$metaTagsConfig = require('meta-tags.php');
return array_merge($config, $metaTagsConfig);