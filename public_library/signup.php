<?php 
  $error;
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['submit'])) {
      if (empty($_POST['name'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['confpassword'])) {
        $serror = "All fields required";
      }
      else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['confpassword'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        if ($pass === $cpass) {
          $link = mysqli_connect('localhost','root','aniruddha',"public_library");
          if (!$link) {
           die('Could not connect to database '.$link->error);
          }
          if ($cpass==$pass) {
            $user = "insert into user values ('$email','$pass')";
            $sdate = date('Y-m-d');
            $e = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
            $edate = date("Y-m-d",$e);
            $member = "insert into member (Name,Phone,Address,Start_date,End_date,email) values ('$name','$phone','$address','$sdate','$edate','$email')";
            if ($link->query($user)) {
             echo "Insertion into user successful<br>";
             if ($link->query($member)) {
                echo "<h1>Insertion into members successful<h1>";
              } 
              else{
                echo "<br>Error $link->error";
              }
            }
          }
        }
      }
    }
  }
 ?>