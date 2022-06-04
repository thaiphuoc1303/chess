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
    'firebase' => [
        'api_key' => 'AIzaSyCLjI-0LCEvAFqegkyEAEqQ7RU9kHY4fa4', // Only used for JS integration
        'auth_domain' => 'chessproject-c80f6.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://chessproject-c80f6-default-rtdb.firebaseio.com',
        'secret' => 'a1phy4hUgsBo9n68Eg1REr4GMdssQTunYPnarSGn',
        'storage_bucket' => 'chessproject-c80f6.appspot.com', // Only used for JS integration
    ],

];
