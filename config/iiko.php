<?php

return [
    'url' => env('IIKO_URL', 'https://iiko.biz:9900/api/0'),
    'user' => env('IIKO_USER', 'demoDelivery'),
    'password' => env('IIKO_PASSWORD', 'PI1yFaKFCGvvJKi'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Client Handler [Optional]
    |--------------------------------------------------------------------------
    |
    | If you'd like to use a custom HTTP Client Handler.
    | Must be an instance of KMA\IikoApi\HttpClients\IHttpClient
    |
    | Default: GuzzlePHP
    |
    */
    'http_client_handler'          => null,
];
