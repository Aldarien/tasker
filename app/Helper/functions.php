<?php
function model($class_name) {
  return App\Alias\Model::factory($class_name);
}
function registerRoutes(&$app, array $routes) {
  foreach ($routes['routes'] as $url => $data) {
    foreach ($data as $http => $method) {
      $app->{$http}($url, $routes['controller'] . ':' . $method);
    }
  }
}
