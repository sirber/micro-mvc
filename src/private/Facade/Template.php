<?php

namespace App\Facade;

class Template
{
  private $twig;

  public function __construct()
  {
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates/');
    $this->twig = new \Twig\Environment($loader);
  }

  public function render(string $file, array $options = []): string
  {
    return $this->twig->render($file, $options);
  }
}
