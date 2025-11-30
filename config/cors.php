<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS & Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Set to `true` to allow all origins, or define specific allowed origins
    | for cross-origin requests.
    |
    | Supported values: `true`, `false`, or an array of allowed origins.
    |
    */

    'allowedOrigins' => ['*'],  // Allow all origins (use an array of domains to restrict)

    'allowed_origins_patterns' => [],  // Optional: Use regex patterns for allowed origins

    /*
    |--------------------------------------------------------------------------
    | Allowed HTTP Methods
    |--------------------------------------------------------------------------
    |
    | Here you can specify which HTTP methods should be allowed for cross-origin
    | requests. The default is to allow all methods.
    |
    | Supported methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
    |
    */

    'allowed_methods' => ['*'],  // Allow all HTTP methods

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Define which HTTP headers are allowed in cross-origin requests. The default
    | is to allow all headers. You can specify specific headers here if needed.
    |
    | For instance, to allow custom headers: ['X-Custom-Header', 'Content-Type']
    |
    */

    'allowed_headers' => ['*'],  // Allow all headers

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Define which headers are exposed to the browser in response to a cross-origin
    | request. The default is to expose no headers.
    |
    | For example, if you want to expose the `X-Total-Count` header in pagination,
    | you can specify it here.
    |
    */

    'exposed_headers' => [],  // No headers exposed by default

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | The maximum time (in seconds) that the results of a preflight request can be
    | cached by the browser. The default is 0, meaning that preflight requests are
    | not cached.
    |
    */

    'max_age' => 0,  // Preflight request caching time (0 means no caching)

    /*
    |--------------------------------------------------------------------------
    | Credentials
    |--------------------------------------------------------------------------
    |
    | If you need to allow cookies or HTTP authentication credentials to be sent
    | with cross-origin requests, set this option to true. The default is false.
    |
    */

    'supports_credentials' => true,  // Set to true to allow credentials (cookies, auth tokens)

    /*
    |--------------------------------------------------------------------------
    | Expose Headers for OPTIONS Preflight Requests
    |--------------------------------------------------------------------------
    |
    | Here you can define which headers should be exposed during the OPTIONS preflight
    | request. This is important when browsers send preflight requests before the actual request.
    |
    */

    'preflight_max_age' => 86400,  // Preflight request caching duration in seconds (24 hours)

];
