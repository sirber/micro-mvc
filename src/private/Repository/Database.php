<?php

namespace App\Repository;

use PDOException;

abstract class Database
{
  private $db;

  public function __construct()
  {
    try {
      $this->db = new \PDO($_ENV['PDO_DB_STRING'], $_ENV['PDO_DB_USER'], $_ENV['PDO_DB_PASS']);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query(string $query): array
  {
    $stmt = $this->db->query($query);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function preparedQuery(string $query, array $params = []): array
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute($params);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}
