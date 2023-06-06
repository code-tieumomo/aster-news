<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => 'c53d3e585ebf03c9eda4',
        'client_secret' => 'e8237110ebc5163a8f8a3fd782118e03405c2fc7',
        'redirect' => 'https://aster-news.com/auth/callback',
    ],

    'google' => [
        'client_id' => '960199766724-9jl46epb68lmuflgjpsjf3u65prl3aqi.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://aster-news.com/auth/callback/google',
    ],
];
