<?php
session_start();
require 'database/connection.php';
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
unset($_SESSION["cart"]);
$Email = $_SESSION['Email'];
$sql = "select * from payment where Email = '$Email' ";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
     $_SESSION['id']=$row['id'];
     $_SESSION['order_id']=$row['order_id'];
     $_SESSION['Email']=$row['Email'];
     $_SESSION['Name']=$row['Name'];
     $_SESSION['PhoneNo']=$row['PhoneNo'];
     $_SESSION['Address']=$row['Address'];
     $_SESSION['price']=$row['price'];
     $_SESSION['Card']=$row['Card'];
     $_SESSION['Month']=$row['Month'];
     $_SESSION['Year']=$row['Year'];
     $_SESSION['CCV']=$row['CCV'];
     $_SESSION['time_date']=$row['time_date'];
     
}
}else{
  $_SESSION['id']='';
  $_SESSION['order_id']='';
  $_SESSION['Email']='';
  $_SESSION['Name']='';
  $_SESSION['PhoneNo']='';
  $_SESSION['Address']='';
  $_SESSION['price']='';
  $_SESSION['Card']='';
  $_SESSION['Month']='';
  $_SESSION['Year']='';
  $_SESSION['CCV']='';
  $_SESSION['time_date']='';
}

  ?>
<!DOCTYPE html>
<html>
<head>
    <title>FoodTiger - Receipt</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <script src="js/confirm.js"></script>
    <script src="js/cancel.js"></script>
</head>
<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
<form>
<div class="container" style="text-align:center;margin-top:100px;">
  <img src="image/done.png" alt="done" style="width:150px;height:150px;">
  <h4 style="margin-top:50px">You order number is <?php echo  $_SESSION['order_id']?>.It done at <?php echo $_SESSION['time_date'];?>. Please wait your order arrive.</h4>
  <hr>
  <h5>Name: <?php echo  $_SESSION['Name']?></h5>
  <h5>Phone Number: <?php echo  $_SESSION['PhoneNo']?></h5>
  <h5>Address: <?php echo  $_SESSION['Address']?></h5>
</div>

</form>
</body>
</html>