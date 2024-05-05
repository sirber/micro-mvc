<?php

namespace App\Controllers;

use App\Facades\Template;

class HomeController
{
  private $template;

  public function __construct()
  {
    $this->template = new Template();
  }

  function getHome()
  {
    return $this->template->render('home.html');
  }
}
