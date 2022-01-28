<?php

function insertData($conn, $ID, $username, $email, $URL, $password, $owner){
  $sql = "INSERT INTO dashboard (ID, username, email, URL, password, owner) VALUES (?, ?, ?, ?, ?, ?);"; // ? = placeholder to avoid SQL injection
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ./../main/signUp.php?error=failedStmt");
    exit();
  }

  $hashedPwd = password_hash($inputPwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssssss", $ID , $username, $email, $URL, $hashedPwd, $owner);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: ./readData.php");
  exit();
}
