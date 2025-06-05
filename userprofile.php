<?php  
include "database/connection.php";

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
 } else {
   
 }
?>
<!DOCTYPE html>  
<html>  
 <head>  
 <title>FoodTiger - User Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
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
    <h2>Profile</h2><hr>
      <label for="Name"><b>Username</b></label>
      <input type="text" value="<?php echo $_SESSION['Name']; ?>" readonly>
      <label for="Email"><b>Email</b></label>
      <input type="text" value="<?php echo $_SESSION['Email']; ?>" readonly>
      <label for="PhoneNo"><b>Phone Number</b></label>
      <input type="text" value="<?php echo $_SESSION['PhoneNo']; ?>" readonly>
      <label for="Address"><b>Address</b></label>
      <input type="text" value="<?php echo $_SESSION['Address']; ?>" readonly> 
      <p><a href="editprofile.php">Edit Profile</a></p> 
      <p><a href="#">Blog</a></p>
      <p><a href="feedback.php">Feedback</a></p>
      <p><a href="paymenthistory.php">Payment History</a></p>
    </div>
    <footer>
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>
 </body>
                  
  
 
</html>
 