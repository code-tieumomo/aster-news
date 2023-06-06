<?php

// Remove all attrs except data-src and src regex: /\b(?!(data-src|src))([a-zA-Z][a-zA-Z0-9-]*)\s*=\s*["'][^"']*["']/g

return [
    'cache' => [
        'ttl' => 86400, // one day
    ],
    'keep_html_tags' => [
        'p',
        'br',
        'strong',
        'em',
        'u',
        'img',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
    ],
];
