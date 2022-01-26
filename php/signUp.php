<?php

//Check if the file was loaded correctly through the signup page and not directly from the http_build_url

if (isset($_POST["submit"])) {
  $inputUsername = $_POST["inputUsername"];
  $inputPwd = $_POST["inputPwd"];

  require_once 'db-connect.php';
  require_once 'db-functions.php';
  require_once('uuid-generator.php');
  $UUID = guidv4();

  if (inputIsEmpyy($inputUsername, $inputPwd) !== false){
    header("Location: ./../main/signUp.php?error=emptyInput");
    exit();
  }

  if (usernameExists($conn, $inputUsername) !== false){
    header("Location: ./../main/signUp.php?error=usernameTaken");
    exit();
  }

  createUser($conn, $UUID, $inputUsername, $inputPwd);

}
else {
  header("Location: ./../main/signUp.php");
  exit();
}
