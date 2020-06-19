<?php

return function ($page, $tag, $category) {
  // get all articles in the blog sorted descending by date
  $articles = $page->children()->listed()->sortBy('date', 'desc');

  // get all categories and tags
  $tags = $articles->pluck('tags', ',', true);
  $categories = $articles->pluck('category', ',', true);

  // apply category or tag filtering and set flags
  $isCategoryArchive = $isTagArchive = false;
  if ($category) {
    $isCategoryArchive = true;
    $articles = $articles->filterBy('category', $category);
  } else if ($tag) {
    $isTagArchive = true;
    $articles = $articles->filterBy('tags', $tag, ',');
  }

  // apply pagination
  $articles = $articles->paginate(10);
  $pagination = $articles->pagination();

  // get intro text
  if (
    !$isCategoryArchive
    && !$isTagArchive
    && $page->text()->isNotEmpty()
  ) {
    $intro = $page->text()->kt();
  } else if (
    $isCategoryArchive
  ) {
    $categoryObjects = $page->categories()->yaml();
    $categoryIndex = array_search($category, array_column($categoryObjects, 'title'));
    $categoryDescription = $categoryObjects[$categoryIndex]['description'];

    if (!empty($categoryDescription)) {
      $intro = sprintf('<p>%s</p>', $categoryDescription);
    }
  }

  return [
    'articles'    => $articles,

    // current category name
    'category'    => $category,

    // all blog categories
    'categories'  => $categories,

    'intro'       => $intro,

    // is category archive flag
    'isCategoryArchive'   => $isCategoryArchive,

    // is tag archive flag
    'isTagArchive'        => $isTagArchive,

    // current tag name
    'tag'         => $tag,

    // all blog tags
    'tags'        => $tags,

    // pagination object
    'pagination'  => $pagination
  ];
};