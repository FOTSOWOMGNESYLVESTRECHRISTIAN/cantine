<?php
require 'connection.php';
session_start();
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $username=$_SESSION['Email'];
    $gtotal = $gtotal + $total;
     $query = "INSERT INTO orders ( foodname, price,  quantity, username,) 
              VALUES ('" . $foodname . "','" . $price . "','" . $quantity . "','" . $username . "')";
              $success = $conn->query($query);         
              echo "<script>window.location.href='../payment.php';</script>";
      if(!$success)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>
        <?php
    }      
  }
        ?>