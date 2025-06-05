<!DOCTYPE html>
<html>
<?php
session_start();
include "../database/connection.php";
if (isset($_POST['login'])) {
  $Email  = $_POST['Email'];
  $Password = $_POST['Password'];
  mysqli_real_escape_string($conn, $Email);
  mysqli_real_escape_string($conn, $Password);
$query = "SELECT * FROM admin WHERE Email = '$Email'";
$result = mysqli_query($conn , $query) or die (mysqli_error($conn));
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    $cus_id = $row['ad_id'];
    $Name = $row['Name'];
    $Email = $row['Email'];
    $pass = $row['Password'];

 
    if (password_verify($Password, $pass )) {
      $_SESSION['ad_id'] = $cus_id;
      $_SESSION['Name'] = $Name;
      $_SESSION['Email'] = $Email;
      header('location: adminhome.php');
    }
    else {
      echo "<script>alert('invalid username/password !');
      window.location.href= 'adminlogin.php';</script>";

    }
  }
}
else {
      echo "<script>alert('invalid username/password');
      window.location.href= 'adminlogin.php';</script>";

    }
}

    
?>
<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../css/main.css" rel="stylesheet"> 
    
</head>
<script>
    $(document).ready(function(){

    $('.input').focus(function(){
    $(this).parent().find(".label-txt").addClass('label-active');
    });

    $(".input").focusout(function(){
    if ($(this).val() == '') {
        $(this).parent().find(".label-txt").removeClass('label-active');
    };
    });
    });  
</script>

    <form name="login" action="adminlogin.php"method="POST">
    <h3 style="color: rgb(120,120,120)">Logn In</h3>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Password</p>
        <input type="password" class="input" name="Password"  value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
   
   
    <button type="submit" name="login" value="Sign In">LOGN IN</button>
    
    <div style="margin-top:30px auto;text-align:center">Have an account? <a href="adminregister.php">register</a></div>
    </form>
</html>