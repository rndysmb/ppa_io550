<?php

return [

    // Guard default (biasanya 'web')
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    // Semua guards
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'mentor' => [
            'driver' => 'session',
            'provider' => 'mentors',
        ],
        'anak' => [
            'driver' => 'session',
            'provider' => 'anaks',
        ],
    ],

    // Semua providers
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'mentors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Mentor::class,
        ],
        'anaks' => [
            'driver' => 'eloquent',
            'model' => App\Models\Anak::class,
        ],
    ],

    // Konfigurasi reset password
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'mentors' => [
            'provider' => 'mentors',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'anaks' => [
            'provider' => 'anaks',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    // Timeout untuk re-auth
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
