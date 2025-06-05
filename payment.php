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
 }
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    
</head>
<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
    <div class="container">
        <div class="jumbotron" style="margin-top:5%;">
            <h1>Choose your Payment Option</h1>
        </div>
        <div class="row">
    
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
            <a href="payCredit.php" class="img-fluid" style="text-decoration:none;color:black;">
            <div class="panel panel-default card-input card card-body bg-light">
            <img src=image/images.png alt="CreditImage"><hr>
              <div class="panel-heading"><h5>Credit Card/Debit Card</h5></div>
            </div>
            </a>
        </label>
        
      </div>
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
          <a href="payCash.php" class="img-fluid" style="text-decoration:none;color:black;">
            <div class="panel panel-default card-input card card-body bg-light">
            <img src=image/cashondelivery.png alt="CashImage"><hr>
              <div class="panel-heading"><h5>Cash on Delivery</h5></div>
            </div>
            </a>
        </label>
        
      </div>
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
        <a href="database/Cancel.php" class="img-fluid" style="text-decoration:none;color:black;"> 
            <div class="panel panel-default card-input card card-body bg-light">
            <img src=image/cancel.png alt="CancelImage"><hr>
              <div class="panel-heading" ><h5>Cancel Payment</h5></div>
            </div>
            </a>
        </label>
      </div>
    </div>
</div>
</body>
</html>