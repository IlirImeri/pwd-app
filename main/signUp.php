<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="./../css/styling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"> 
    <meta charset="utf-8">
    <title>dPass</title>
  </head>
  <body body class="bg-image">
    <div class="container">
      <div class="header">
        <h1>Sign Up</h1>
      </div>
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"]=="emptyInput") {
          echo "<p class='errorMessage'>Please fill in all the fields!</p>";
        }
        elseif ($_GET["error"]=="usernameTaken") {
          echo "<p class='errorMessage'>Username already taken!</p>";
        }
        elseif ($_GET["error"]=="failedStmt") {
          echo "<p class='errorMessage'>Something went wrong, please try again!</p>";
        }
        elseif ($_GET["error"]=="none") {
          echo "<p class='errorMessage'>Sign Up successful!</p>";
        }
      }
      ?>
      <div class="main">
        <form action="./../php/signUp.php" method="post">
          <span>
            <i></i>
            <input required type="text" placeholder="Username" name="inputUsername">
          </span><br>
          <span>
            <i></i>
            <input required type="password" placeholder="Password" name="inputPwd">
          </span><br>
          <button type="submit" name="submit">Submit</button>
          <div class="signUp">
            <a href="./login.php" class="link" >Log In</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
