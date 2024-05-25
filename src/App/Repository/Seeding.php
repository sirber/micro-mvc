<?php

namespace App\Repository;

class Seeding extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  public function seed()
  {
    $pattern = __DIR__ . '/../../database/seeds/*.sql';
    $files = glob($pattern);

    foreach ($files as $file) {
      $filename = basename($file);
      $content = file_get_contents($file);

      echo "Running: $filename... ";
      $migration = $this->preparedQuery('SELECT * FROM migrations WHERE filename=:filename', ['filename' => $filename]);

      $this->query($content);
      echo "done.\n";
    }
  }
}
