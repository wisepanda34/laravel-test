<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | This file is where you may configure your settings for cross-origin
    | requests. By default, we have set the values to allow all origins
    | but you can change this to something more restrictive as needed.
    |
    */

  'paths' => ['api/*'],  // Разрешить CORS для всех API-роутов

  'allowed_methods' => ['*'],  // Разрешить все методы (GET, POST, PUT, DELETE и т.д.)

  'allowed_origins' => [
    'http://localhost:5173',   // Фронтенд на порту 5173
    'http://127.0.0.1:5173',  // Аналогичная запись с IP
  ],

  'allowed_origins_patterns' => [],

  'allowed_headers' => ['*'],  // Разрешить все заголовки

  'exposed_headers' => [],  // Не expose заголовки по умолчанию

  'max_age' => 0,  // Время кэширования CORS-заголовков (в секундах)

  'supports_credentials' => true,  // Разрешить использование cookies (если нужно)

];
