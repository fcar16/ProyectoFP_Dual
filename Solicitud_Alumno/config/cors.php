<?php
return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    //'allowed_origins' => ['http://localhost:5173'], // Reemplaza con la URL de tu frontend

    'allowed_origins' => ['http://docvalle.duckdns.org'], // Reemplaza con la URL de tu frontend

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
