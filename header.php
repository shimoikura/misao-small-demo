<?php
  session_start();
  $directoryURI = $_SERVER['REQUEST_URI']; ///yoshiki/misao-small-demo/index.php
  $path = parse_url($directoryURI, PHP_URL_PATH); ///yoshiki/misao-small-demo/index.php
  $components = explode('/', $path);//Array ( [0] => [1] => yoshiki [2] => misao-small-demo [3] => contact.php )
  $first_part = $components[3];
  // echo $first_part;
  // print_r($components);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MISAO SMALL DEMO</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"</script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!-- Top Page Slider Setting -------------------------------------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="css/jquery.bxslider.min.css" rel="stylesheet" />
     <script src="js/jquery.bxslider.min.js"></script>]
     <!-- <link href="css/jquery.bxslider.css" rel="stylesheet" /> -->
     <script type="text/javascript">
             $(document).ready(function(){
                 $('.bxslider').bxSlider({
                     auto: true,
                     speed: 1000, //スピード設定
                    //  画像のスライド方法の変更。horizontal（平行方向）vertical（垂直方向）fade（フェードアウト）の3つが選択できる。（デフォルトでは"horizontal"）
                    // mode:'vertical'
                 });
           });
      </script>
<!-- Top Page Slider Setting -------------------------------------------------------------------->
  </head>
  <body>
    <!-- header -->
    <div class="container-fluid header">
      <div class="row-fluid">
        <div class="span4 header-img-box">
          <img src="img/logo1.png" alt="">
        </div>
        <div class="span8 header-title-box">
          <h1><a href="#">MISAO</a></h1>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <div class="navbar navbar-inverse ">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="header2 nav-collapse collapse">
            <ul class="nav">
              <li class="nav_list <?php if ($first_part=="index.php") {echo "active"; } else  {echo "noactive";}?>"><a href="index.php">Home</a></li>
              <li class="nav_list <?php if ($first_part=="about-us.php") {echo "active"; } else  {echo "noactive";}?>"><a href="about-us.php">About</a></li>
              <li class="nav_list <?php if ($first_part=="contact.php") {echo "active"; } else  {echo "noactive";}?>"><a href="contact.php">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <!-- <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password"> -->
              <button type="submit" class="btn"><a href="login.php" style="text-decoration: none; color:inherit;">Sign in</a></button>
              <button type="submit" class="btn"><a href="registration.php" style="text-decoration: none; color:inherit;">Registration</a></button>
            </form>
            <?php
              if (! isset($_SESSION['login_user'])) {
                $_SESSION['login_user'] = "Guest";
              }
             ?>
            <p class="pull-right">hello <?php echo $_SESSION['login_user'] ?></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
