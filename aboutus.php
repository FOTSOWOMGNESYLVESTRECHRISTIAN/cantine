<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "foodtiger";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    <title>FoodTiger - About Us</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/aboutus.css">
    
</head>
<body>
        <?php 
          require "navandfooter/nav.php";
        ?>
    </header>
    <body>
    <div class="in1">
        <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/food.jpg" alt="food" width="1100" height="500">
            <div class="carousel-caption">
              <h1>FoodTiger</h1>
              <p class="p2">Hungry always Hungry</p>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="image/food4.jpg" alt="food2" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Quality Food</h1>
              <p class="p2">We deliver Quality Food and deliver On Time!</p>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="image/food3.jpg" alt="food3" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Best Customer Service</h1>
              <p class="p2">We deliver Best Customer Service and Support!</p>
            </div>   
          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
    </div>
        <!-- About Us -->
        <div style="text-align:center;margin-top:3%;">
            <h2>About Us</h2>
          
          <!-- First -->
          <div class="container" style="margin-top: 3%;">
            <div class="row">
              <div class="column-66" style="text-align: left;">
                <h1 class="large-font" style="color:#FFBD00;"><b>We are FoodTiger.</b></h1>
                <p style="font-size:1.3em;">FoodTiger is a convenient online food ordering website. Customers can browse through the system and place order easily. "Bringing good food into your everyday. That's our mission.</p>
              </div>
              <div class="column-33" style="margin-top: 1%;">
                  <img src="image/logo + font_4.png" alt="Logo" width="335" height="471">
              </div>
            </div>
          </div>
          
          <!-- Clarity Section -->
          <div class="container1" style="background-color:#f1f1f1;margin-top:3%;"> 
          <div class="container">
            <div class="row">
              <div class="column-33">
                <img src="image/aboutpicture.jpg" alt="Jobs" width="335" height="471" >
              </div>
              <div class="column-66" style="text-align: left;">
                <h1 class="large-font" style="color:#FFBD00;"><b>Jobs?</b></h1>
                <p style="font-size:1.3em;"> Ride with Us Flexible hours. Competitive pay. It’s exercise. It’s fitness. Most of all, it’s incredibly fun. Become a rider today and join our brilliant team.</p>
                <a class="abutton" href="#"><button class="button3">Apply Now</button></a>
              </div>
            </div>
          </div>
        </div>

          <!-- Third -->
          <div class="container" style="margin-top: 3%;margin-bottom:3%;">
            <div class="row">
              <div class="column-66" style="text-align: left;" >
                <h1 class="large-font" style="color:#FFBD00;"><b>Need Some Help?</b></h1>
                <p style="font-size:1.3em;">You can contact our customer service center. We provide the best customer service. </p>
                <a class="abutton" href="#"><button class="button3">Contact Us</button></a>
              </div>
              <div class="column-33" style="margin-top: 2%;">
                  <img src="image/helppicture.jpg" alt="Support" width="335" height="471" >
              </div>
            </div>
          </div>
          </div>
          <footer>
            <?php 
              require "navandfooter/footer.php";
            ?>
          </footer>
    </body>
    </html>