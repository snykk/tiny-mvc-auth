<?php
include "../config.php";
require PATH_CONTROLLERS . "auth_controller.php";

if (isset($_COOKIE["user"])) {
  header("Location: portal.php");
  die();
}

if (isset($_POST["register"])) {
  $objAuth = new AuthController();
  $err = $objAuth->register($_POST["email"], $_POST["password"], $_POST["verif-password"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="container p-10">
    <h1 class="text-5xl">Registration Page</h1>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="POST">
      <?php
      if (isset($err)) {
        include "./partials/error_message_partial.php";
      }
      ?>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Insert your email">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Insert your password">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password Verification
        </label>
        <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="verif-password" name="verif-password" type="password" placeholder="Insert your password verification" c>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="register">
          Sign Up
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="./login.php">
          Already have account?
        </a>
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      &copy;2020 Samboz Company. All rights reserved.
    </p>
  </div>

  <script src="../assets/js/close-alert.js"></script>
</body>

</html>