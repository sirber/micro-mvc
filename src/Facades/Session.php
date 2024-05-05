<?php

namespace App\Facades;

class Session
{
  public static function get(string $key): mixed
  {
    return $_SESSION[$key];
  }

  public static function set(string $key, mixed $value): void
  {
    $_SESSION[$key] = $value;
  }
}
