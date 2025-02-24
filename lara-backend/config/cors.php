<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Ensure this includes sanctum/csrf-cookie
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'], // Change to your frontend domain
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Required for Sanctum authentication
];
