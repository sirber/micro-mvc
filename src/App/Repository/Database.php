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

    return $this->fetchAll($stmt);
  }

  public function preparedQuery(string $query, array $params = []): array
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute($params);

    return $this->fetchAll($stmt);
  }

  private function fetchAll(\PDOStatement $stmt): array
  {
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return $this->resultToCamel($data);
  }

  private function resultToCamel(array $data): array
  {
    $camelCaseData = [];
    foreach ($data as $key => $value) {
      $camelCaseData[$this->snakeToCamel($key)] = $value;
    }

    return $camelCaseData;
  }

  private function snakeToCamel(string $snake_case_string): string
  {
    return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $snake_case_string))));
  }
}
