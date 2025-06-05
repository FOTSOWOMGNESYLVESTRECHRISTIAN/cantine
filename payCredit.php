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
                <form class="form-horizontal" role="form" name="form" action="database/creditpaycode.php" method="POST">

          <div class="col-25">
            <h3 style="margin-top:20px;">Credit/Debit Card Payment</h3>
            <h3>Total Price: RM<?php echo "$gtotal"; ?></h3>
            <hr>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="Name">Name on Card</label>
            <input type="text" id="Name" name="Name" value="<?php echo $_SESSION['Name']; ?>">
            <label for="PhoneNo">Contact Number</label>
            <input type="text" id="Name" name="PhoneNo" value="<?php echo $_SESSION['PhoneNo']; ?>">
            <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" value="<?php echo $_SESSION['Address']; ?>">
            <label for="CreditNum">Credit card number</label>
            <input type="text" id="Card" name="Card" placeholder="0000-0000-0000-0000" required>
            

            <div class="row">
              <div class="col-25">
                <label for="Month">Month</label>
                    <select name="Month" style="margin-top:9px;">
                        <option value="01">January</option>
                        <option value="02">February </option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
              </div>
              <div class="col-25">
                <label for="Year">Year</label>
                    <select name="Year" style="margin-top:9px;">
                        <option value="2020"> 2020</option>
                        <option value="2021"> 2021</option>
                        <option value="2022"> 2022</option>
                        <option value="2023"> 2023</option>
                        <option value="2024"> 2024</option>
                        <option value="2025"> 2025</option>
                        <option value="2026"> 2026</option>
                        <option value="2027"> 2027</option>
                        <option value="2028"> 2028</option>
                        <option value="2029"> 2029</option>
                        <option value="2030"> 2030</option>
                    </select>
              </div>
              <div class="col-25">
                <label for="cvv">CVV</label>
                <input type="password" id="CCV" name="CCV" maxlength="3" placeholder="---" required>
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="Continue to checkout" class="btn" onclick="return Confirm();" name="Pay" id="Pay">
        <input type="text" name="Email" class="form-control" placeholder="Email"  value="<?php echo $_SESSION['Email']; ?>" style="display: none;"/>
        <input type="text" name="price" class="form-control" placeholder=""  value="<?php echo "$gtotal"; ?>" style="display: none;" style="display: none;"/>
        <input type="text" class="form-control" name="order_id"  value="<?php echo  $generateid; ?>" style="display: none;"/>  
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