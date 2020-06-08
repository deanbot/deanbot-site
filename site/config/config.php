<?php

return [
  'debug'  => true,
  'markdown' => [
    'extra' => true
  ],
  'routes' => [
    // feed.xml route
    [
      'pattern' => 'feed.xml',
      'method' => 'GET',
      'action'  => function () {
        $options = [
          'title'       => 'Spirited Refactor',
          'description' => 'Read latest posts from Dean Verleger',
          'link'        => site()->url() . '/blog',
          'mime'        => 'xml',
          'url'         => site()->url(),
          'feedurl'     => site()->url() . '/feed.xml',
          'snippet'     => 'rss'
        ];
        $feed = page('blog')->children()->listed()->flip()->limit(10)->feed($options);
        return $feed;
      }
    ],

    // blog single, category, or tag archive
    [
      'pattern' => 'blog/(:any)',
      'action' => function ($entry) {
        if ($page = page('blog/' . $entry)) {
          return $page;
        } else {
          $entry = urldecode($entry);

          $articles = page('blog')->children()->listed();
          $results = $articles->filterBy('category', $entry);
          if (count($results) > 0) {
            return page('blog')->render([
              'category' => $entry
            ]);
          }
          $results = $articles->filterBy('tags', $entry, ',');
          if (count($results) > 0) {
            return page('blog')->render([
              'tag' => $entry
            ]);
          }
          return page('error');
        }
      }
    ]
  ]
];
