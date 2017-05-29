<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MISAO SMALL DEMO</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
          <!-- <a class="brand" href="#">Project name</a> -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
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
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">
      <!-- top-img-box -->
      <div class="row top-img-box">
        <img src="img/top1.jpg" alt="">
      </div>
      <!-- midle-img-box -->
      <div class="row midle-img-box">
        <div class="span4 midle-img-box">
          <h3>ssssss</h3>
          <img src="img/product1.jpg" alt="">
          <p>sssssssssssssss</p>
        </div>
        <div class="span4 midle-img-box">
          <h3>ssssss</h3>
          <img src="img/product1.jpg" alt="">
          <p>sssssssssssssss</p>
        </div>
        <div class="span4 midle-img-box">
          <h3>ssssss</h3>
          <img src="img/product1.jpg" alt="">
          <p>sssssssssssssss</p>
        </div>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit">copy&copy MISAO.language.institude</p>
      </div>
    </div>
  </body>
</html>
