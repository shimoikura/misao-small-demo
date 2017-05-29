<?php
  $severname = "localhost";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($severname,$username,$password);
  $db = mysqli_select_db($conn,"misao_small_demo");

  $query = "insert into user info"

  $email = $_PUSH["email"];
  $password = $_GET["password"];

 ?>
