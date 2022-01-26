<?php

if (isset($_POST["submit"])) {
  $inputUsername = $_POST["inputUsername"];
  $inputPwd = $_POST["inputPwd"];

  require_once 'db-connect.php';
  require_once 'db-functions.php';

  if (inputIsEmpyy($inputUsername, $inputPwd) !== false){
    header("Location: ./../main/login.php?error=emptyInput");
    exit();
  }

  loginUser($conn, $inputUsername, $inputPwd);

}
else {
  header("Location: ./../main/login.php");
  exit();
}
