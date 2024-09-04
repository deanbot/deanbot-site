<?php
return [
  'pattern' => 'blog/(:any)',

  'action' => function ($uri) {
    // render blog article page object
    $page = page('blog/' . $uri);
    if ($page) {
      return $page;
    }

    // return a category or tag archive
    $blogPage = page('blog');
    $term = urldecode($uri);

    // render category archive if term is within category property in any blog pages
    if (hasChildrenWithCategory($blogPage, $term)) {
      // blog page object with category
      return renderWith($blogPage, 'category', $term);
    }

    // render tag archive if term is within tag property in any blog ages
    if (hasChildrenWithTag($blogPage, $term) ) {
      // blog page object with tag
      return renderWith($blogPage, 'tag', $term);
    }

    // 404
    return page('error');
  }
];

function renderWith($page, $key, $value) {
  return $page->render([
    $key => $value
  ]);
};