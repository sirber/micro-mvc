<?php

namespace App\Controllers;

class HomeController extends Controller
{
  public function getHome()
  {
    return $this->template->render('home.html');
  }
}
