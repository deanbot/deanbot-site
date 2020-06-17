<?php

Kirby::plugin('mark/tag', [
  'tags' => [
    'mark' => [
      'html' => function($tag) {
        return '<mark>' . $tag->value . '</mark>';
      }
    ]
  ]
]);