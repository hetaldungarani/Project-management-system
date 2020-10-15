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
    'google' => [
    'client_id' => '134131520-e8b5el7rdqrn75vj7cbvqkcakar8dsr3.apps.googleusercontent.com',
    'client_secret' => 'yBewJEo2XmuHJ8KaLDAd493A',
    'redirect' => 'http://localhost/project-management-system/auth/google/callback',
  ],
  'facebook' => [
    'client_id' => 'enter your client id',
    'client_secret' => 'enter your secret key',
    'redirect' => 'http://127.0.0.1:8000/callback/facebook',
  ],

];
