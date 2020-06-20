<?php

Kirby::plugin('cite/tag', [
  'tags' => [
    'cite' => [
      'html' => function($tag) {
        return '<cite>—' . $tag->value . '</cite>';
      }
    ]
  ]
]);