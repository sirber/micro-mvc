<?php

namespace App\Controllers;

use App\Facades\Request;

class HomeController extends Controller
{
  public function getHome(Request $request)
  {
    return $this->template->render('home.html');
  }
}
