<?php

use App\Facades\Request;

require_once __DIR__ . '/../src/bootstrap.php';

$request = new Request();

$uri = $request->getUri();
$parts = explode('/', $uri);
$endpoint = '/' . $parts[1];

$routeFound = false;
foreach ($routes as $route) {
  if ($route['endpoint'] != $endpoint) {
    continue;
  }

  try {
    $routeFound = true;
    $controller = new $route['controller']();

    $args = array($request);

    echo call_user_func_array([$controller, $route['function']], $args);
  } catch (Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
    die($e);
  }
}

if (!$routeFound) {
  header("HTTP/1.0 404 Not Found");
  echo "not found!";
}
