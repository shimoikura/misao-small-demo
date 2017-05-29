<?php
// setting to conect db and php
$severname = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($severname,$username,$password);
$db = mysqli_select_db($conn,"misao_small_demo");
// 配列の中身を明示してくれる
echo '<pre>';
var_dump($_POST);
echo '</pre>';
//---------------------------
$errors = array();
// isset関数は変数にNULL以外の値がセットされているかを調べる関数
if(isset($_POST['register']) && $_POST['register'] == "Create your MISAO account"){
  // Definition and Initialization
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password1 = $_POST["check-password"];
  $phone = $_POST["phone"];
  $city = $_POST["city"];
  $country = $_POST["country"];
  $day = $_POST["day"];
  $month = $_POST["month"];
  $year = $_POST["year"];
  // ------------------------------------------------------
  // Validation ↓↓↓↓↓↓↓↓↓↓↓↓↓ ----------------------------
  if(!empty($_POST['gender'])) {
    $gender=$_POST['gender'];
  }
  elseif(empty($_POST['gender'])) {
    $errors['gender1'] = "no gender ";
    $gender="";
  }
  if (empty($name)) {
    $errors['name1'] = "Enter the name";
  }
  if (empty($email)) {
   $errors['email1'] = "Enter the email";
  }
  elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email2'] = "Enter a valid email";
  }
  if (empty($password)) {
    $errors['password1'] = "Enter the password";
  }
  elseif (! preg_match("/^[a-z A-Z 0-9]+$/",$password)) {
    $errors['password2'] = "Enter a valid password";
  }
  elseif (strlen($password) < 6 || strlen($password) > 8) {
    $errors['password3'] = "Your passward number of characters is different";
  }
  if ($password != $password1) {
    $errors['password4'] = "Passward is wrong";
  }
  if (empty($phone)) {
    $errors['phone1'] = "Enter the phone";
  }
  elseif (! preg_match("/^[0-9]+$/",$phone)) {
    $errors['phone2'] = "Enter a valid phone number";
  }
  elseif (strlen($phone) < 8 || strlen($phone) > 10) {
    $errors['phone3'] = "The number of phone number is different";
  }
  else {
  // empty of city and country is OK!
    if (empty($city)) {
      $city = "";
    }
    if (empty($country)) {
      $country = "";
    }
  // -------------------------
    $query = "insert into user_information (id,name,email,password,phone,city,country,day,month,year,gender)values('','$name','$email','$password','$phone','$city','$country','$day','$month','$year','$gender')";
    $run = mysqli_query($conn,$query);
// 確認---------------------
    if($run){
      echo "success";
    }
    else {
      echo "error.";
    }
// --------------------------
    // リダイレクトを実行
    header("location: login.php");
      mysqli_close($conn);
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
      <form class="form-registration" action="registration.php" method="post">
        <img src="img/logo1.png" alt="">
        <h2 class="form-registration-heading">Create account</h2>
        <input type="text" name="name" class="input-block-level" placeholder="Name">
        <input type="text" name="email" value="" class="input-block-level" placeholder="Email">
        <input type="password" name="password" value="" class="input-block-level" placeholder="Password (6-8)">
        <input type="password" name="check-password" value="" class="input-block-level" placeholder="Confirm password">
        <input type="text" name="phone" value="" class="input-block-level" placeholder="Phone Number (8-10)">
        <input type="text" name="city" value="" class="input-block-level" placeholder="City">
        <input type="text" name="country" value="" class="input-block-level" placeholder="Country">
        <table>
          <tr>
            <td>
              <select class="" name="day">
                <option value="">Day</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </td>
            <td>
              <select class="" name="month">
                <option value="">Month</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">Month</option>
                <option value="5">Month</option>
                <option value="6">Month</option>
                <option value="7">Month</option>
                <option value="8">Month</option>
                <option value="9">Month</option>
              </select>
            </td>
            <td>
              <select class="" name="year">
                <option value="">Month</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">Month</option>
                <option value="5">Month</option>
                <option value="">Month</option>
                <option value="">Month</option>
                <option value="">Month</option>
                <option value="">Month</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><input type="radio" name="gender" value="1">Male</td>
            <td><input type="radio" name="gender" value="2">Female</td>
          </tr>
        </table>
        <input id="registration-button" class="btn btn-large btn-primary" type="submit" name="register" value="Create your MISAO account"></input>
      </form>
      <a href="index.php">HOME</a>
    </div>
  </body>
</html>
