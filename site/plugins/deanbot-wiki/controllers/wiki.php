<?php
return function ($site, $page) {
  $notes = $page->children()->listed()->filterBy('topic', '')->sortBy('title');
  return [
    'notes' => $notes
  ];
};