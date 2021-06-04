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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '601123237272212',
        'client_secret' => 'd0ab1ea1d7ac0a4400829a946062f903',
        'redirect' => 'https://app-blog-food.herokuapp.com/admins/login/facebook/callback',
    ],

    'google' => [
        'client_id'     => '697803386976-fkn5ghamgsk06nr16cpbeg5im56f3no1.apps.googleusercontent.com',
        'client_secret' => 'eF8eRjXAJZ3qihFHZRESuYro',
        'redirect'      => 'https://app-blog-food.herokuapp.com/admins/login/google/callback'
    ],

];
