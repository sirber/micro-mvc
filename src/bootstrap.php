<?php

use Symfony\Component\Dotenv\Dotenv;

// Packages
require_once __DIR__ . '/vendor/autoload.php';

// Environment
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
  $dotenv = new Dotenv();
  $dotenv->load($envFile);
}

// Session
session_start();

// Routes
require_once __DIR__ . '/routes.php';
