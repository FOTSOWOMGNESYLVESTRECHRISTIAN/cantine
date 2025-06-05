<?php
session_start();
require 'database/connection.php';
$generateid = uniqid();
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $gtotal = $gtotal + $total;
  }
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
    <title>FoodTiger - Payment</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/payCredit.css">
    <script src="js/confirm.js"></script>
    <script src="js/cancel.js"></script>
    <script src="js/card.js" charset="utf-8"></script>
</head>
<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>   
    <a href="payment.php" style="text-decoration:none;"><button  class="btn btn-danger btn-block" style="margin-top:55px;" onclick="return Cancel();">Cancel</button></a>
    <div class="row" style="margin-top:50px;">
    
        <div class="col-75">
            <div class="container">
              <form class="form-horizontal" role="form" action="database/cashCode.php" method="POST">

          <div class="col-25">
            <h3 style="margin-top:20px;">Cash Payment</h3>
            <h3>Total Price: RM<?php echo "$gtotal"; ?></h3>
            <hr>
            <label for="Name">Name</label>
            <input type="text" id="Name" name="Name" value="<?php echo $_SESSION['Name']; ?>">
            <label for="PhoneNo">Contact Number</label>
            <input type="text" id="Name" name="PhoneNo" value="<?php echo $_SESSION['PhoneNo']; ?>">
            <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" value="<?php echo $_SESSION['Address']; ?>">
          </div>
        </div>
        <input type="submit" value="Continue to checkout" class="btn" onclick="return Confirm();" name="Pay" id="Pay">
        <input type="text" class="form-control" name="Email" value="<?php echo $_SESSION['Email']; ?>"  style="display: none;"/>
        <input type="text" class="form-control" name="price" placeholder="Email" value="<?php echo $gtotal; ?>" style="display: none;"/>
        <input type="text" class="form-control" name="order_id"  value="<?php echo  $generateid; ?>" style="display: none;"/>
        <input type="text" name="Card" class="form-control" style="display: none;"  value="-"/>
        <input type="text" class="form-control" name="Month" style="display: none;" value="-"/>
        <input type="text" class="form-control" name="Year"style="display: none;" value="-"/>
        <input type="text" class="form-control" name="CCV" style="display: none;" value="-"/>
      </form>
    </div>
  </div>

  
</body>
<script>
    payform.cardNumberInput(document.getElementById('Card'));
    payform.expiryInput(document.getElementById('expiry'));
    payform.cvcInput(document.getElementById('CCV'));
    payform.numericInput(document.getElementById('numeric'));
  </script>
</html>