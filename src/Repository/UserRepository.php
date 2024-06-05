<?php

namespace App\Repository;

class UserRepository extends Database
{
  public function getUsers(): array
  {
    return $this->query("
      SELECT * FROM users;
    ");
  }
}
