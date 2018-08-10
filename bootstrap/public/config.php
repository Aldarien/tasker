<?php
$config = [
  "settings" => [
    "debug" => config('app.debug'),
    "diplayErrorDetails" => config('app.debug'),
    "renderer" => [
      "blade_template_path" => config('locations.views'),
      "blade_cache_path" => config('locations.cache')
    ]
  ]
];
