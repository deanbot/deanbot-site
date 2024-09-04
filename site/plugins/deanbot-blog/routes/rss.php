<?php
// feed method provided by site/plugins/kirby3-feed
return [
  'pattern' => 'feed.xml',
  'method' => 'GET',
  'action'  => function () {
    $blogPage = page('blog');
    $siteUrl = site()->url();
    $options = [
      'title'       => 'Deanbot',
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