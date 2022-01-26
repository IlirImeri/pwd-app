<?php
session_start();
?>

<style>
table, td, th {
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
}

th, td {
  padding: 15px;
}
</style>
</head>
<body>

<!DOCTYPE html>
<html>
<head>
  <?php
  if (isset($_SESSION["ID"])) {
    echo "<button>Profile</button>";
    echo "<form action='logout.php'><input type='submit' value='Logout'/></form>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pwd_app";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT ID, username, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>Name</th><th>Password</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();
  }else {
    header("Location: ./../main/login.php");
    exit();
  }
  ?>
