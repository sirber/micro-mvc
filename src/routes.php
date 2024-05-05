<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

$routes = array(
  array(
    'endpoint' => '/',
    'controller' => HomeController::class,
    'function' => 'getHome'
  ),
  array(
    'endpoint' => '/users',
    'controller' => UserController::class,
    'function' => 'getUsers'
  )
);
