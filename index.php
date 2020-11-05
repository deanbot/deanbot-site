<?php

require 'kirby/bootstrap.php';

function getNoteLink($note, $class = '', $label = '') {
  $class = !empty($class) ? ' ' . $class : '';
  $label = !empty($label) ? $label : $note->title();
  return sprintf(
    '<a href="%s" title="%s" class="note-link%s">'
      . '<i class="%s"></i>'
      . '<span>%s</span>'
    . '</a>',
    $note->url(),
    $note->title(),
    $class,
    $note->hasChildren()
      ? 'ri-folder-2-line'
      : 'ri-article-line',
    $label
  );
}

function hasChildrenWithCategory($page, $term) {
  $pages = $page->children()->listed();
  return count( $pages->filterBy('category', $term) ) > 0;
}

function hasChildrenWithTag($page, $term) {
  $pages = $page->children()->listed();
  return count( $pages->filterBy('tags', $term, ',') ) > 0;
}

function renderWith($page, $key, $value) {
  return $page->render([
    $key => $value
  ]);
};

function getBlogCategoryDescription($page, $categoryTitle) {
  $categoryObjects = $page->categories()->yaml();
  $categoryIndex = array_search($categoryTitle, array_column($categoryObjects, 'title'));
  $categoryDescription = $categoryObjects[$categoryIndex]['description'];
  return $categoryDescription ?? '';
}

echo (new Kirby)->render();
