<?php

namespace App\Controllers;

use App\Facades\Template;

abstract class Controller
{
  protected $template;

  public function __construct()
  {
    $this->template = new Template();
  }
}
