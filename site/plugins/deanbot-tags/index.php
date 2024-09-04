<?php

Kirby::plugin('deanbot/tags', [
    'tags' => [
        'mark' => [
            'html' => function($tag) {
                return '<mark>' . $tag->value . '</mark>';
            }
        ],
        'cite' => [
            'html' => function($tag) {
                return '<cite>—' . $tag->value . '</cite>';
            }
        ]
    ]
]);