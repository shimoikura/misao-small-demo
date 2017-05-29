<?php
session_start();
if (! isset($_SESSION["login_user"])) {
  header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>WELCOME!!!</h1>
    <a href="index.php">HOME</a>
  </body>
</html>
