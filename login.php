<?php
// 配列の中身を明示してくれる
echo '<pre>';
var_dump($_POST);
echo '</pre>';
//---------------------------
$errors = array();
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
    echo "<ul>";
    foreach($errors as $message){
        echo "<li>";
        echo $message;
        echo "</li>";
    }
    echo "</ul>";
    ?>
    <div class="container">
      <form class="form-signin" action="login.php" method="post">
        <img src="img/logo1.png" alt="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="email">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-large btn-primary" type="submit" name="login" value="Login" style="background-color: #e4007b; background-image: none;"></input>

      </form>
      <p>New customer? <a href="registration.php">Start here</a></p>
      <a href="index.php">back</a>
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
