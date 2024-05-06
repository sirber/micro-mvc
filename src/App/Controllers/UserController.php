<?php

namespace App\Controllers;

use App\Facades\Request;
use App\Repository\UserRepository;

class UserController extends Controller
{
  private $userRepository;

  public function __construct()
  {
    parent::__construct();

    $this->userRepository = new UserRepository();
  }

  function getUsers(Request $request)
  {
    $users = $this->userRepository->getUsers();

    return $this->template->render('users.html', ['users' => $users]);
  }
}
