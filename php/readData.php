<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./../css/dashboard-style.css">
		<title></title>
	</head>
	<body>

	</body>
</html>

<?php
if (isset($_SESSION["ID"])) {
  echo "
		<form action='logout.php'><input name='submit' type='submit' value='LOGOUT' class='button'/></form>
		<div class='container'>
			<div class='button-space'>
	  		<form action='dash-functions.php' method='post'><button type='submit' name='submit' class='button'>ADD</button></form>
	  		<form action='logout.php'><input type='submit' value='DELETE' class='button'/></form>
	   		<form action='logout.php'><input type='submit' value='UPDATE' class='button'/></form>
	   		<form action='logout.php'><input type='submit' value='SEARCH' class='button'/></form>
			</div>
	";

  require_once('db-connect.php');

  $sql = "SELECT ID, username, email, URL, password FROM dashboard WHERE owner = ?;";

  if ($statement = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($statement, 's', $_SESSION["ID"]);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    if ($result->num_rows>0) {
      echo
      "<table>
          <thead>
            <tr class='head-table'>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>URL</th>
              <th>Password</th>
            </tr>
          </thead>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo
        "<tbody>
          <tr class='tr'>
            <td class='td'>".$row["ID"]."</td>
            <td class='td'>".$row["username"]."</td>
            <td class='td'>".$row["email"]."</td>
            <td class='td'>".$row["URL"]."</td>
            <td class='td'>".$row["password"]."</td>
          </tr>
        </tbody>";
      }
      echo
       "</table>
      </div>";
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
