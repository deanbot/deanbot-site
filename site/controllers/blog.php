<?php

return function ($page, $tag, $category, $entry) {
  $articles = $page->children()->listed()->flip();

  if ($category) {
    $articles = $articles->filterBy('category', $category);
  } else if ($tag) {
    $articles = $articles->filterBy('tags', $tag, ',');
  }

  $articles = $articles->paginate(10);
  $pagination = $articles->pagination();
  $tags = $articles->pluck('tags', ',', true);
  $categories = $articles->pluck('category', ',', true);

  return [
    'articles'    => $articles,
    'category'    => $category,
    'tag'         => $tag,
    'categories'  => $categories,
    'tags'        => $tags,
    'pagination'  => $pagination,
  ];
};