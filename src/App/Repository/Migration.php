<?php

namespace App\Repository;

class Migration extends Database
{
  public function __construct()
  {
    parent::__construct();

    $this->init();
  }

  private function init()
  {
    $this->query('
      CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

        INDEX idx_filename (filename)
      );
    ');
  }

  public function migrate()
  {
    $pattern = __DIR__ . '/../../migrations/*.sql';
    $files = glob($pattern);

    foreach ($files as $file) {
      $filename = basename($file);
      $content = file_get_contents($file);

      echo "Running: $filename... ";
      $migration = $this->preparedQuery('SELECT * FROM migrations WHERE filename=:filename', ['filename' => $filename]);
      if (count($migration) > 0) {
        echo "already applied.\n";
        continue;
      }

      $this->query($content);
      $this->preparedQuery("INSERT INTO migrations (filename) VALUES(:filename)", ['filename' => $filename]);
      echo "done.\n";
    }
  }
}
