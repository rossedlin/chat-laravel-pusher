<?php

return [
    'app'     => [
        'id'     => env('PUSHER_APP_ID'),
        'key'    => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
    ],
    'channel' => 'public',
    'event'   => 'chat',
];
