<?php  
include "database/connection.php";
include "database/updatecode.php";

session_start();  
if(isset($_SESSION['Email'])){
    $Email=$_SESSION['Email'];
    $sql="select * from customer where Email = '$Email'";
    $result=$conn->query($sql);
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
            $_SESSION['Name']=$row['Name'];
            $_SESSION['Email']=$row['Email'];
            $_SESSION['PhoneNo']=$row['PhoneNo'];
            $_SESSION['Address']=$row['Address'];
            $_SESSION['Password']=$row['Password'];
            
      }
    }
 }
?>  
<!DOCTYPE html>
<html>  
 <head>  
 <title>FoodTiger - Edit Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="js/confirmUpdate.js"></script>
 </head>  
 <body>  
 <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>
    </header>
    <div class="imgcontainer">
      <img src="image/avatar6.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <form name="" action="database/updatecode.php" method="POST">
    <h2>Edit Profile</h2><hr>
      <label for="Name"><b>Username</b></label>
      <input type="text" name="Name" id="Name" value="<?php echo $_SESSION['Name']; ?>" >
      <label for="Email"><b>Email</b></label>
      <input type="text" name="Email" id="Email" value="<?php echo $_SESSION['Email']; ?>">
      <label for="PhoneNo"><b>Phone Number</b></label>
      <input type="text" name="PhoneNo" id="PhoneNo" value="<?php echo $_SESSION['PhoneNo']; ?>">
      <label for="Address"><b>Address</b></label>
      <input type="text" name="Address" id="Address" value="<?php echo $_SESSION['Address']; ?>">  
      <label for="Password"><b>Password</b></label>
      <input type="password" value="" name="Password" id="Password"> 
      <input type="submit" name="update" class="btn btn-warning text-uppercase text-white" onclick="return ConfirmUpdate();" value="Update" >
    </div>
    <footer style="margin-top:5%;">
        <?php 
          require "navandfooter/footer.php";
        ?>