<?php
// setting to conect db and php
$severname = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($severname,$username,$password);
$db = mysqli_select_db($conn,"misao_small_demo");
// 配列の中身を明示してくれる  (チェック用)
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
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
  $error_num = 0;
  // -----------------------------------------------
  // email sent from form
    $array = "select id from user_information where email='".$email."'";
    $result = mysqli_query($conn,$array);
    $count = mysqli_num_rows($result);
    // echo $count; （チェック用）
  // ------------------------------------------------------
  // Validation ↓↓↓↓↓↓↓↓↓↓↓↓↓ ----------------------------
  if(!empty($_POST['gender'])) {
    $gender=$_POST['gender'];
  }
  else if(empty($_POST['gender'])) {
    $errors['gender1'] = "no gender ";
    $gender="";
    $error_num++;
  }
  if (empty($name)) {
    $errors['name1'] = "Enter the name";
    $error_num++;
  }
  if (empty($email)) {
   $errors['email1'] = "Enter the email";
   $error_num++;
  }
  else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email2'] = "Enter a valid email";
    $error_num++;
  }
  if ($count >= 1) {
    $errors['email3'] = "Your email address is already used.";
    $error_num++;
  }
  if (empty($password)) {
    $errors['password1'] = "Enter the password";
    $error_num++;
  }
  else if (! preg_match("/^[a-z A-Z 0-9]+$/",$password)) {
    $errors['password2'] = "Enter a valid password";
    $error_num++;
  }
  else if (strlen($password) < 6 || strlen($password) > 8) {
    $errors['password3'] = "Your passward number of characters is different";
    $error_num++;
  }
  else if ($password != $password1) {
    $errors['password4'] = "Passward is wrong";
    $error_num++;
  }
  if (empty($phone)) {
    $errors['phone1'] = "Enter the phone";
    $error_num++;
  }
  else if (! preg_match("/^[0-9]+$/",$phone)) {
    $errors['phone2'] = "Enter a valid phone number";
    $error_num++;
  }
  else if (strlen($phone) < 8 || strlen($phone) > 10) {
    $errors['phone3'] = "The number of phone number is different";
    $error_num++;
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
  // エラーが一つも無かったら　成功
    if ($error_num == 0) {
    //データベースへ情報を挿入 --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $query = "insert into user_information (id,name,email,password,phone,city,country,day,month,year,gender)values('','$name','$email','$password','$phone','$city','$country','$day','$month','$year','$gender')";
      $run = mysqli_query($conn,$query);
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // リダイレクトを実行----------------
      header("location: login.php");
    // -------------------------------
      // email and password sent from form ---------------------------------------------------------------------
      $array = "select * from user_information where email='".$email."' and password = '".$password."'";
      $result = mysqli_query($conn,$array);
      // 登録したデータを配列で取得
      $data = mysqli_fetch_array($result);
    //DATABASE close
      mysqli_close($conn);
    //--------------------------------------------------------------------------------------------------------------------------------------------------
      $id = $data["id"];    //Definition $id
// record to user_information.txt and user_information.doc
      $informations = array('id' => $id ,'name' => $name,'email' => $email, 'password' => $password,'phone' => $phone,'city' =>$city,'country'=>$country);
      foreach ($informations as $key) {
        $file1 = fopen("user_information.txt","a+");
        $file2 = fopen("user_information.doc","a+");
        fwrite($file1,"$key".PHP_EOL);
        fwrite($file2,"$key".PHP_EOL);
      }
        fwrite($file1,PHP_EOL.PHP_EOL);
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

    }
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
      <p><a href="index.php">HOME </a></p>
      <p><a href="login.php">To Login page</a></p>
    </div>
  </body>
</html>
