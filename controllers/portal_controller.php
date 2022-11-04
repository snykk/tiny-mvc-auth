<?php

include "../config.php";
require_once PATH_MODELS . "user_model.php";

class PortalController
{
  private $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index($email)
  {
    $user = $this->userModel->getUserByEmail($email);
    return $user;
  }
}
