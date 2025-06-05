<?php
include "../database/connection.php";
//if user click create buttom
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['insert'])) {
    require "../database/protect.php";
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST); 
    
    $gump->validation_rules(array(
      'Name'        => 'required|alpha_space|max_len,30|min_len,5',
      'Email'       => 'required|valid_email',
      'Password'    => 'required|max_len,50|min_len,6',
    ));
    $gump->filter_rules(array(
      'Name'     => 'trim|sanitize_string',
      'Password' => 'trim',
      'Email'    => 'trim|sanitize_email',
      ));
      $validated_data = $gump->run($_POST);
      if($validated_data === false) {
        ?>
       <script>alert(' <?php echo $gump->get_readable_errors(true); ?> ')</script>;
        <?php
      }
      else if ($_POST['Password'] !== $_POST['Password2']) 
      {
        echo  "<script>alert('Passwords do not match ')</script>";
      }
     else {
        $Name = $validated_data['Name'];
        $checkusername = "SELECT * FROM admin WHERE Name = '$Name'";
        $run_check = mysqli_query($conn , $checkusername) or die(mysqli_error($conn));
        $countusername = mysqli_num_rows($run_check); 
        if ($countusername > 0 ) {
      echo  "<script>alert('Username is already taken! try a different one')</script>";
        }
      $Email = $validated_data['Email'];
      $checkemail = "SELECT * FROM admin WHERE Email = '$Email'";
          $run_check = mysqli_query($conn , $checkemail) or die(mysqli_error($conn));
          $countemail = mysqli_num_rows($run_check); 
          if ($countemail > 0 ) {
        echo  "<script>alert('Email is already taken! try a different one')</script>";
    }
    else {
    $Name = $validated_data['Name'];
    $Email = $validated_data['Email'];
    $Password = $_POST['Password'];
    $Password = password_hash("$Password" , PASSWORD_DEFAULT);
 
    $query = "INSERT INTO admin(Name,Email,Password) VALUES ('$Name','$Email','$Password')";
    $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) { 
      echo "<script>alert('SUCCESSFULLY REGISTERED');
      window.location.href= 'adminlogin.php';</script>";
}
else {
echo "<script>alert('Error ');</script>";
}
}
}
}
?>
<!DOCTYPE html>
<html>

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

    <form name="adminregister" action="adminregister.php" method="POST">
    <h3 style="color: rgb(120,120,120)">Sign Up</h3>
    <label>
        <p class="label-txt">Username</p>
        <input type="text" class="input" name="Name" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="" placeholder="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Password</p>
        <input type="password" class="input" name="Password" id="Password" value="" placeholder="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Comfirm Password</p>
        <input type="password" class="input" name="Password2" id="Password2" value=""placeholder=""  required>
        <div class="line-box">
        <div class="line"></div>
        </div> 
    </label>
    <button type="submit" name="insert">Submit</button>
    <div style="margin-top:30px auto;text-align:center">Have an account? <a href="adminlogin.php">Login</a></div>
    </form>
</html>