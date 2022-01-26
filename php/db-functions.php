<?php

function inputIsEmpyy($inputUsername, $inputPwd){
  $result;
  if ($inputUsername == " " || $inputPwd == " " ) {
    $result = true;
  }else {
    $result = false;
  }
  return $result;
}

function usernameExists($conn, $inputUsername){

  $sql = "SELECT * FROM users WHERE username = ?;"; // ? = placeholder to avoid SQL injection
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ./../main/signUp.php?error=failedStmt");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $inputUsername);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  //check if $sql is true, and asign to $row
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn, $UUID, $inputUsername, $inputPwd){

  $sql = "INSERT INTO users (ID, username, password ) VALUES (?, ?, ?);"; // ? = placeholder to avoid SQL injection
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ./../main/signUp.php?error=failedStmt");
    exit();
  }

  $hashedPwd = password_hash($inputPwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sss", $UUID, $inputUsername, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: ./readData.php");
  exit();
  // header("Location: ./../main/signUp.php?error=none");
  // exit();
}

function loginUser($conn, $inputUsername, $inputPwd) {
  $usersExists = usernameExists($conn, $inputUsername);

  if ($usersExists === false) {
    header("Location: ./../main/login.php?error=wronguserorpwd");
    exit();
  }

  $hashedPwd = $usersExists["password"];
  $verifyPwd = password_verify($inputPwd, $hashedPwd);

  if ($verifyPwd === false) {
    header("Location: ./../main/login.php?error=wronguserorpwd");
    exit();
  }
  elseif ($verifyPwd === true) {
    session_start();
    $_SESSION["ID"] =  $usersExists["ID"];
    $_SESSION["userName"] =  $usersExists["username"];
    header("Location: ./readData.php");
    exit();
  }

}

// function emailIsInvalid($email){
//   $result;
//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $result = true;
//   }else {
//     $result = false;
//   }
//   return $result;
// }
