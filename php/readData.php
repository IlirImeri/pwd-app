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
    echo "<form action='logout.php'><input name='submit' type='submit' value='LOGOUT'/></form>";
    echo "<form action='dash-functions.php' method='post'>
            <button type='submit' name='submit'>ADD</button>
          </form>";
    echo "<form action='logout.php'><input type='submit' value='DELETE'/></form>";
    echo "<form action='logout.php'><input type='submit' value='UPDATE'/></form>";
    echo "<form action='logout.php'><input type='submit' value='SEARCH'/></form>";

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

    //$sql = "SELECT ID, username, email, URL, password FROM dashboard";
    $sql = "SELECT dashboard.ID, dashboard.username, dashboard.email, dashboard.URL, dashboard.password
            FROM dashboard
            INNER JOIN users ON dashboard.owner = users.ID;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo
      "<table>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>URL</th>
          <th>Password</th>
        </tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo
        "<tr>
          <td>".$row["ID"]."</td>
          <td>".$row["username"]."</td>
          <td>".$row["email"]."</td>
          <td>".$row["URL"]."</td>
          <td>".$row["password"]."</td>
        </tr>";
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
