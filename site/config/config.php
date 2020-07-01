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
  ],
  'pedroborges.meta-tags.default' => function ($page, $site) {
    $description = $page->isHomePage()
      ? $site->description()
      : $page->description();
    if (!$description) {
      $description = $site->description();
    }
    return [
      'title' => $site->title(),
      'meta' => [
        'description' => $description
      ],
      'link' => [
        'canonical' => $page->url()
      ],
      'og' => [
        'title' => $page->isHomePage()
          ? $site->title()
          : $page->title(),
        'type' => 'website',
        'site_name' => $site->title(),
        'url' => $page->url()
      ]
    ];
  },
  'pedroborges.meta-tags.templates' => function ($page, $site) {
    $title = $page->pageTitle();
    if ($title == '') {
      $title = $page->title();
    }
    $format = 'c';
    $template = $page->template();
    $published = $page->date()->toDate($format);
    $modified = '';
    $tags = '';
    if ($template == 'article') {
      $tags = '';
      if (!$page->tags()->isEmpty()) {
        foreach($page->tags()->split() as $tag) {
          if (strlen($tags) > 0) {
            $tags .= ', ';
          }
          $tags .= $tag;
        }
      }
      $modified = !$page->updated()->isEmpty()
        ? $page->updated()->toDate($format)
        : $page->date()->toDate($format);
    }
    return [
      'note' => [
        'meta' => [
          'description' => 'A wiki note concerning ' . $page->title(),
        ],
        'og' => [
          'title' => $title,
          'type' => 'website',
          'site_name' => $site->title(),
          'url' => $page->url()
        ]
      ],
      'article' => [
        'meta' => [
          'description' => $site->description()
        ],
        'og' => [
          'title' => $title,
          'type' => 'article',
          'site_name' => $site->title(),
          'url' => $page->url(),
          'namespace:article' => [
            'published_time' => $published,
            'modified_time' => $modified,
            'section' => $page->category(),
            'tag' => $tags
          ]
        ]
      ]
    ];
  }
];
