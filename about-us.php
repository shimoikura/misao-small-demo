<?php
 include "header.php"
?>
  <h1>ABOUT US</h1>
<?php
  // $file = fopen("test.txt","r");
  // while (! feof($file)) {
  //   echo fgets($file). "<br>";
  // }
  //
  // $file = fopen("test.txt",'w+');
  // fwrite($file,"yoshiki");
  // while (! feof($file)) {
  //   echo fgets($file). "<br>";
  // }

  if(isset($_POST['submit']) && $_POST['submit'] == "submit"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password1 = $_POST["check-password"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $country = $_POST["country"];

    $informations = array('phone' => $phone ,'name' => $name,'email' => $email );
    foreach ($informations as $key) {
      // echo $key. "<br>";
      $file1 = fopen("user_information.txt","a+");
      // $file2 = fopen("user_information.doc","a+");
      fwrite($file1,"$key".PHP_EOL);

      // echo "<br><br>";
      // fwrite($file2,"$key".PHP_EOL);
    }
    fwrite($file1,PHP_EOL.PHP_EOL);
    
  }
 ?>


 <form class="" action="about-us.php" method="post">
   <input type="text" name="name" class="input-block-level" placeholder="Name">
   <input type="text" name="email" value="" class="input-block-level" placeholder="Email">
   <input type="password" name="password" value="" class="input-block-level" placeholder="Password (6-8)">
   <input type="password" name="check-password" value="" class="input-block-level" placeholder="Confirm password">
   <input type="text" name="phone" value="" class="input-block-level" placeholder="Phone Number (8-10)">
   <input type="text" name="city" value="" class="input-block-level" placeholder="City">
   <input type="text" name="country" value="" class="input-block-level" placeholder="Country">
   <input type="submit" name="submit" value="submit">
 </form>

    <!-- footer -->
        <div id="footer">
          <div class="container">
            <p class="muted credit">copy&copy MISAO.language.institude</p>
          </div>
        </div>
