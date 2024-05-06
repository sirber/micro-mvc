<?php

use Symfony\Component\Dotenv\Dotenv;

// Environment
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
  $dotenv = new Dotenv();
  $dotenv->load($envFile);
}

// Package
require_once __DIR__ . '/vendor/autoload.php';

// Session
session_start();

// Routes
require_once __DIR__ . '/routes.php';
