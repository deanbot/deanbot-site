<?php
/*
Deps:
- https://github.com/tobimori/kirby-seo.git (submodule: site/plugins/seo)
provides meta/search tags, sitemap and and robots
*/
return [
  'debug'  => false,
  'markdown' => [
    'extra' => true
  ],
  'smartypants' => true,

  'deanbot.web-app-icons' => '#01677D',

  // via https://plugins.andkindness.com/seo/docs/get-started/installation-setup
  'tobimori.seo.canonicalBase' => 'https://deanbot.dev',
  'tobimori.seo.lang' => 'en_US',

  // via https://plugins.andkindness.com/seo/docs/usage/robots
  'tobimori.seo.robots' => [
    'active' => true,
    'content' => [
      '*' => [
        'Allow' => ['/'],
        'Disallow' => ['/kirby', '/panel', '/content']
      ]
    ]
  ], 
];