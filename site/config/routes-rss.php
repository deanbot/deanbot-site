<?php
return [
  'pattern' => 'feed.xml',
  'method' => 'GET',
  'action'  => function () {
    $blogPage = page('blog');
    $siteUrl = site()->url();
    $options = [
      'title'       => 'Spirited Refactor',
      'description' => $blogPage->description()->value(),
      'link'        => $siteUrl . '/blog',
      'mime'        => 'xml',
      'url'         => $siteUrl,
      'feedurl'     => $siteUrl . '/feed.xml',
      'snippet'     => 'rss'
    ];
    $feed = $blogPage->children()->listed()->flip()->limit(10)->feed($options);
    return $feed;
  }
];