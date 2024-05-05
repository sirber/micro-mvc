<?php

namespace App\Controllers;

use App\Repository\UserRepository;
use App\Facades\Template;

class UserController
{
  private $userRepository;
  private $template;

  public function __construct()
  {
    $this->userRepository = new UserRepository();
    $this->template = new Template();
  }

  function getUsers()
  {
    $users = $this->userRepository->getUsers();

    return $this->template->render('users.html', ['users' => $users]);
  }
}
