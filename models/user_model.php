<?php

class UserModel
{

  private $db;
  public function __construct()
  {
    $this->db = new mysqli("localhost", "root", "", "coba", "3306");
    $this->migration();
  }

  public function getUserByEmail($email)
  {
    // query to get users by email
    $sql = "SELECT * FROM users WHERE email = '$email'"; // bisa pakai binding untuk alasan keamanan
    $result = $this->db->query($sql);
    return $result->fetch_assoc();
  }

  public function insertUser($email, $password)
  {
    // query to inser user with email and password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(email, password)
            VALUES('$email', '$password')
    ";
    return $this->db->query($sql);
  }


  public function migration()
  {
    // allow migration if table is not exists
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL
            )";

    $this->db->query($sql);
  }
}
