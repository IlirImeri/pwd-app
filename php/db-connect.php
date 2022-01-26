<?php

$serverName = "localhost";
$user = "root";
$dbPassword = "";
$dbName = "pwd_app";

$conn = mysqli_connect($serverName, $user, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
