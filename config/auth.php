<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults as
    | required, but they're a good start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Check your .env file for AUTH_GUARD configuration
        'passwords' => 'users',  // This is fine as long as you're using the 'users' provider for password resets
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Here you may configure every authentication guard for your application.
    | We have provided a great default setup for you using session storage
    | and the Eloquent user provider. You can modify these as needed.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session', // Standard for web guard
            'provider' => 'users', // Uses 'users' provider
        ],

        'api' => [
            'driver' => 'sanctum', // Use Sanctum for API authentication
            'provider' => 'users', // Uses 'users' provider
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how users
    | are retrieved from your database or other storage mechanisms used by your
    | application. You may configure multiple providers if you have more than
    | one model or table that needs authentication.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // Using Eloquent for user model
            'model' => App\Models\User::class, // Ensure that this points to the correct User model
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | This option controls the password reset settings for your application.
    | You may configure multiple password reset configurations if you have
    | different user models or types that need separate configurations.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users', // Links to 'users' provider
            'table' => 'password_reset_tokens', // Ensure this table exists in your database
            'expire' => 60, // Token expiration time (in minutes)
            'throttle' => 60, // Throttle password reset requests
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may configure the number of seconds before a password confirmation
    | times out. The user will need to confirm their password again if this
    | time is exceeded.
    |
    */

    'password_timeout' => 10800, // Timeout in seconds (3 hours)
];
