<?php
require_once('uuid-generator.php');
$UUID = guidv4();

$mysqli = new mysqli("localhost", "root", "", "pwd_app");

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Escape user inputs for security, anti SQL injection
$username = $mysqli->real_escape_string($_REQUEST['inputUsername']);
$password = $mysqli->real_escape_string($_REQUEST['inputPwd']);

// Attempt insert query execution
$sql = "INSERT INTO users (ID, username, password ) VALUES ('$UUID' ,'$username', '$password')";

if($mysqli->query($sql) === true){
    header ("Location: readData.php");
} else{
    header("Location: ./../html/formError.html");
}

// Close connection
$mysqli->close();
?>
