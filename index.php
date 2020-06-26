<?php

require 'kirby/bootstrap.php';

function getNoteLink($note, $class = '') {
  $class = !empty($class) ? ' ' . $class : '';
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
    $note->title()
  );
}

echo (new Kirby)->render();
