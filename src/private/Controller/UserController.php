<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Facade\Template;

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
