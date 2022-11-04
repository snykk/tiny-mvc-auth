<?php
include "../config.php";
require_once PATH_MODELS . "user_model.php";

class AuthController
{
  private $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel();

    // start session if there is no session yet
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function register($email, $password, $verif_pass)
  {
    // validate null input
    if ($email == "" || $password == "" || $verif_pass == "") {
      return "input cannot be empty";
    }

    // verify password
    if ($password != $verif_pass) {
      return "password verification is not the same";
    }

    // length password >= 8
    if (strlen($password) < 8) {
      return "password must contains atleast 8 character";
    }

    // cek whether email is exists in database
    // if user is exists return error message
    $user = $this->userModel->getUserByEmail($email);
    if (isset($user)) {
      return "email is already taken";
    }

    // insert user record from form credential
    if (!$this->userModel->insertUser($email, $password)) {
      return "internal server error";
    }

    // send session to login page
    $_SESSION["message-success"] = "registration success";
    header("Location:login.php");
  }

  public function login($email, $password)
  {
    // validate null input
    if ($email == "" || $password == "") {
      return "input cannot be empty";
    }

    // length password >= 8
    if (strlen($password) < 8) {
      return "password must contains atleast 8 character";
    }

    // cek whether email is exists in database
    //  if user not exist return error message
    $user = $this->userModel->getUserByEmail($email);
    if (!isset($user)) {
      return "email not found";
    }

    // verify hash password
    if (!password_verify($password, $user["password"])) {
      return "password is not valid";
    }

    // set cookies from authenticated user
    setcookie("user", $user["email"]);
    header("Location:portal.php");
  }

  public function logout()
  {
    // set expired cookies to the past
    setcookie("user", "", time() - 3600);

    // send sesion to login page
    $_SESSION["message-success"] = "logout success";
    header("Location:login.php");
  }
}
