<?php

if (isset($_POST["submit"])) {
  require_once 'db-connect.php';
  require_once 'dashboard-functions.php';

  insertData($conn, uniqid(), $ID, $username, $email, $URL, $password, $owner);

}
else {
  header("Location: ./../main/login.php");
  exit();
}
