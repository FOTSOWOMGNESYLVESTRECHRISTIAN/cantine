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
if(isset($_POST["add"]))
{ 
  if(isset($_SESSION["cart"]))
  { 
    $item_array_id = array_column($_SESSION["cart"], "food_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["cart"]);
      $item_array = array(
      'food_id' => $_GET["id"],
      'food_name' => $_POST["hidden_name"],
      'food_price' => $_POST["hidden_price"],
      'c_id' => $_POST["hidden_c_id"],
      'food_quantity' => $_POST["quantity"],
      );
      $_SESSION["cart"][$count] = $item_array;
      echo '<script>alert("Added succesful!")</script>';
      echo '<script>window.location="cart.php"</script>';
    }   
    else
    {
      echo '<script>alert("This food already added to cart")</script>';
      echo '<script>window.location="cart.php"</script>';
    }
  }
  else
  {
    $item_array = array(
    'food_id' => $_GET["id"],
    'food_name' => $_POST["hidden_name"],
    'food_price' => $_POST["hidden_price"],
    'c_id' => $_POST["hidden_c_id"],
    'food_quantity' => $_POST["quantity"],
    );
    $_SESSION["cart"][0] = $item_array;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Cart</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <script src="js/confirm.js"></script>
    <script src="js/empty.js"></script>
    
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
    <?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron" style="margin-top:5%;">
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
      </div>
      
    </div>
    <div class="container-fluid">
      <div class="table-responsive"  >
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th width="40%">Food Name</th>
              <th width="10%">Quantity</th>
              <th width="20%">Price Details</th>
              <th width="15%">Order Total</th>
              <th width="5%">Action</th>
            </tr>
          </thead>


          <?php  
            $total = 0;
            foreach($_SESSION["cart"] as $keys => $values)
            {
          ?>
          <tr>
            <td><?php echo $values["food_name"]; ?></td>
            <td><?php echo $values["food_quantity"] ?></td>
            <td>RM <?php echo $values["food_price"]; ?></td>
            <td>RM <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
            <td><a href="database/cartcode.php?action=delete&id=<?php echo $values["food_id"]; ?>"><button class="btn btn-danger" style="font-size:0.8em"><span class="glyphicon glyphicon-trash"></span> Remove</button></a></td>
          </tr>
          <?php 
            $total = $total + ($values["food_quantity"] * $values["food_price"]);
            }
          ?>
          <tr>
            <td colspan="3" ></td>
            <td >Total</td>
            <td>RM <?php echo number_format($total, 2); ?></td>
          </tr>
        </table>

        <a href="database/cartcode.php?action=empty"><button class="btn btn-danger" onclick="return Confirm2();"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>
        <a href="food.php"><button class="btn btn-primary">Continue Shopping</button></a>
        <a href="database/paymentoptioncode.php"><button class="btn btn-success pull-right" onclick="return Confirm();"><span class="glyphicon glyphicon-share-alt"></span>Checkout</button></a>
      </div>
    </div>
    <?php
    }
    if(empty($_SESSION["cart"]))
    {
  ?>
  <div class="container">
      <div class="jumbotron" style="margin-top:5%;">
        <h1>Your Shopping Cart</h1>
        <p>Oops! We can't smell any food here. Go back and <a href="food.php">order now.</a></p>
      </div>
    </div>
    <?php
      }
    ?>
    </body>
</html>
    
