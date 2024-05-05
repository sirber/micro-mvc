<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;

$request = $_SERVER["REQUEST_URI"];
$parts = explode('/', $request);
$endpoint = '/' . $parts[1];
$id = isset($parts[2]) ? $parts[2] : null;

$routeFound = false;
foreach ($routes as $route) {
  if ($route['endpoint'] == $endpoint) {
    try {
      $routeFound = true;
      $controller = new $route['controller']();

      $args = array();
      if ($id) {
        $args['id'] = $id;
      }

      echo call_user_func_array([$controller, $route['function']], $args);
    } catch (Exception $e) {
      header("HTTP/1.0 500 Internal Server Error");
      die($e);
    }
  }
}

if (!$routeFound) {
  header("HTTP/1.0 404 Not Found");
  echo "not found!";
}
