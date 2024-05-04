<?php

namespace App\Controller;

use App\Facade\Template;

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
