<?php
return [
    'event' => [
        'base_uri' => env('EVENT_SERVICE_BASE_URL'),
        'secret' => env('EVENT_SERVICE_SECRET'),
    ],
    'user' => [
        'base_uri' => env('USER_SERVICE_BASE_URL'),
        'secret' => env('USER_SERVICE_SECRET'),
    ],
    'notification' => [
        'base_uri' => env('NOTIF_SERVICE_BASE_URL'),
        'secret' => env('NOTIF_SERVICE_SECRET'),
    ],
    'scholars' => [
        'base_uri' => env('SCHOLARS_SERVICE_BASE_URL'),
        'secret' => env('SCHOLARS_SERVICE_SECRET'),
    ],
    'attendance' => [
        'base_uri' => env('ATTENDANCE_SERVICE_BASE_URL'),
        'secret' => env('ATTENDANCE_SERVICE_SECRET'),
    ],

];