<?php

namespace App\Repository;

class UserRepository extends Database
{
  public function getUsers(): array
  {
    return array(
      array('id' => 1, 'username' => 'user1', 'email' => 'user1@example.com'),
      array('id' => 2, 'username' => 'user2', 'email' => 'user2@example.com'),
      array('id' => 3, 'username' => 'user3', 'email' => 'user3@example.com')
    );
  }
}
