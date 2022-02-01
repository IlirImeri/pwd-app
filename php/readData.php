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

    require_once('db-connect.php');

    $sql = "SELECT ID, username, email, URL, password FROM dashboard WHERE owner = ?;";

    if ($statement = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($statement, 's', $_SESSION["ID"]);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);
      if ($result->num_rows>0) {
        echo
        "<table>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>URL</th>
            <th>Password</th>
          </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
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
      }else {
        echo "0 results";
      }
      mysqli_stmt_close($statement);
    }
  }else {
    header("Location: ./../main/login.php");
    exit();
  }
  ?>
