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
    <title>FoodTiger - Feedback</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/aboutus.css">
    
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
    <div class="container" style="margin-top:100px;"><h2>Feedback</h2><br/>
        <form action="database/feedbackcode.php" method="post" >
            <h5>Please help us to serve you better by taking a couple of minutes. </h5>
            <hr>
            <h5>How the Food taste?</h5>
            <div class="row">
                <div class="col-sm-3"><input type="radio" name="feedback" value="excellent" id="excellent" required><br/><label for="excellent"><h6>excellent</h6></label></div>
                <div class="col-sm-3"><input type="radio" name="feedback" value="good" id="good"><br/><label for="good"><h6>good</h6></label></div>
                <div class="col-sm-3"><input type="radio" name="feedback" value="neutral" id="neutral"><br/><label for="neutral"><h6>neutral</h6></label></div>
                <div class="col-sm-3"><input type="radio" name="feedback" value="poor" id="poor"><br/><label for="poor"><h6>poor</h6></label></div>
            </div>
            <br/>
            <h5>If you have specific feedback, please write to us...</h5>
            <textarea placeholder="Additional comments" class="w3l_summary" name="suggestions" rows="4" cols="50"></textarea><br/><br/>
            <input type="Name" placeholder="Your Name (optional)" name="Name"  style="display: none;"/>
            <input type="Email" placeholder="Your Email (optional)" name="Email" style="display: none;"/>
            <input type="PhoneNo" placeholder="Your Number (optional)" name="PhoneNo"  style="display: none;"/><br>
            <input type="submit" value="submit" class="btn btn-warning text-uppercase text-white" >
        </form>
    </div>
    <footer style="margin-top:10%;">
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>

</body>
</html>