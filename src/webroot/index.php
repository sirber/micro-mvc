<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;

$request = $_SERVER["REQUEST_URI"];
$parts = explode('/', $request);
$endpoint = $parts[1];
$id = isset($parts[2]) ? $parts[2] : null;

switch ('/' . $endpoint) {
  case '/':
    $c = new HomeController();
    echo $c->getHome();
    break;

  case '/users':
    $c = new UserController();

    if ($id) {
      echo "users id: " . $id;
    } else {
      echo $c->getUsers();
    }
    break;

  default:
    header("HTTP/1.0 404 Not Found");
    echo "not found!";
    break;
}
