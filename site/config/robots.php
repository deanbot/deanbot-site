<?php
return [
  'bnomei.robots-txt.content' => function() {
    $robots = 'user-agent: *
disallow: /kirby/
disallow: /site/';
    $pages = kirby()->page('blog')->children()->listed()->filterBy('noIndex', true);
    $slugs = array();
    foreach($pages as $page) {
      $robots .= '
disallow: /' . $page->uri();
    }

    return $robots;
  },
  'bnomei.robots-txt.groups' => ''
];