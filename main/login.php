<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="./../css/styling.css">
    <meta charset="utf-8">
    <title>dPass</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1>Log In</h1>
      </div>
      <div class="main">
        <form action="./../php/login.php" method="post">
          <span>
            <i></i>
            <input required type="text" placeholder="Username" name="inputUsername">
          </span><br>
          <span>
            <i></i>
            <input required type="text" placeholder="Password" name="inputPwd">
          </span><br>
          <button type="submit" name="submit">Submit</button>
          <div class="signUp">
            <a href="./signUp.php" class="link" >Sign up</a>
          </div>
        </form>
      </div>
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"]=="emptyInput") {
          echo "<p>Please fill in all the fields!</p>";
        }
        elseif ($_GET["error"]=="wronguserorpwd") {
          echo "<p>Wrong Username or Password!</p>";
        }
      }
      ?>
    </div>
  </body>
</html>
