<?php
session_start();
// setting to conect db and php
$severname = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($severname,$username,$password);
$db = mysqli_select_db($conn,"misao_small_demo");

// 配列の中身を明示してくれる
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
//---------------------------
$errors = array('email1'=>"",'email2'=>"",'password1'=>"",'password2'=>"");
// isset関数は変数にNULL以外の値がセットされているかを調べる関数
if(isset($_POST['login']) && $_POST['login'] === "Login"){
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(empty($email)){
    $errors['email1'] = "Enter the email";
  }
  elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errors['email2'] = "Enter a valid email";
  }
  if(empty($password)){
    $errors['password1'] = "Enter the password";
  }
  elseif (! preg_match("/^[a-z A-Z 0-9]+$/",$password)) {
    $errors['password2'] = "Enter a valid password";
  }
  else {
    // email and password sent from form
      $array = "select * from user_information where email='".$email."' and password = '".$password."'";
      $result = mysqli_query($conn,$array);
      $count = mysqli_num_rows($result);
      $data = mysqli_fetch_array($result);
    // If result matched $email and $password, table row must be 1 row
      if($count >= 1) {
        $_SESSION['login_user'] = $data["name"];
        header("location: welcome.php");
      }else {
        echo "Your Login Name or Password is invalid";
        //  $error = "Your Login Name or Password is invalid";
      }
    // 確認---------------------
        // if($run){
        //   echo "success";
        // }
        // else {
        //   echo "error.";
        // }
    // ------------------------------------
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <?php
    // echo "<ul>";
    // foreach($errors as $message){
    //     echo "<li>";
    //     echo $message;
    //     echo "</li>";
    // }
    // echo "</ul>";
    ?>
    <div class="container box-login">
      <form class="form-signin" action="login.php" method="post">
        <img src="img/logo1.png" alt="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="email">
        <p><?php echo $errors['email1']; ?></p>
        <p><?php echo $errors['email2']; ?></p>
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <p><?php echo $errors['password1']; ?></p>
        <p><?php echo $errors['password2']; ?></p>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-large btn-primary" type="submit" name="login" value="Login" style="background-color: #e4007b; background-image: none;"></input>

      </form>
      <p>New customer? <a href="registration.php">Start here</a></p>
      <p><a href="index.php">HOME</a></p>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script> -->

  </body>
</html>
