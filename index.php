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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/aboutus.css">
    
    
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
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

    <!-- Card -->
    <div class="container" style="margin-top:3%;"><h2>Our Foods</h2>
        <div class="card-deck" style="margin-top:5%;">
            <div class="card">
                <div class="inner">
                    <a href="category.php"><img class="card-img-top" src="image/malay food.jpg" alt="Malay Cuisine"></a>
                </div>
              <div class="card-body">
                <h5 class="card-title">Malay</h5>
                <p class="card-text">Malay cuisine is the cooking tradition of ethnic Malays of Southeast Asia, residing in modern-day Malaysia, Indonesia , Singapore, Brunei and Southern Thailand. Malay cooking also makes plentiful use of lemongrass.</p>
                <a href="category.php" class="btn btn-warning text-white">Learn More</a>
              </div>
            </div>
            <div class="card">
                <div class="inner">
                    <a href="category.php"><img class="card-img-top" src="image/chinese food.jpg" alt="Chinese Cuisine"></a>
                </div>
              <div class="card-body">
                <h5 class="card-title">Chinese</h5>
                <p class="card-text">Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.</p>
                <a href="category.php" class="btn btn-warning text-white">Learn More</a>
              </div>
            </div>
            <div class="card">
                <div class="inner">
                    <a href="category.php"><img class="card-img-top" src="image/western food.jpg" alt="Western Cuisine"></a>
                </div>
              <div class="card-body">
                <h5 class="card-title">Western</h5>
                <p class="card-text">European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term "European". &nbsp;</p>
                <a href="category.php" class="btn btn-warning text-white">Learn More</a>
              </div>
            </div>
          </div>
    </div>
     
        <!-- Carousel 2 -->
      <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="margin-top:5%;">
          <div class="carousel-item active">
            <img src="image/food2.jpg" alt="food4" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="image/food5.jpg" alt="food5" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="image/food6.jpg" alt="food6" width="1100" height="500">
          </div>
        </div>
      </div>

      <!-- About Us -->
      <div class="container" style="margin-top:3%;"><h2>About Us</h2></div>
        <div class="container" style="text-align: left;">
            <div class="row">
            <div class="column-66">
                <h1 class="large-font" style="color:#FFBD00;"><b>We are FoodTiger.</b></h1>
                <p style="font-size:1.3em;">FoodTiger is a convenient online food ordering website. Customers can browse through the system and place order easily. "Bringing good food into your everyday. That's our mission.</p>
                <a class="abutton" href="aboutus.php"><button class="button3">Read More</button></a>
            </div>
            <div class="column-33">
                <img src="image/logo 256x256.png" width="335" height="471">
            </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="container" style="margin-top:3%;margin-bottom: 3%;"><h2>Frequently Asked Questions(FAQ)</h2>
            <button class="collapsible">What are your opening hours?</button>
            <div class="content">
              <p class="p3">FoodTiger is open from 10am to 11pm from Monday to Sunday.</p>
            </div>
            <button class="collapsible">How can I pay for my order?</button>
            <div class="content">
              <p class="p3">We provide Credit/Debit Card and Cash on Delivery. Once the payment is comfirmed, the order will be transmitted to the system. </p>
            </div>
            <button class="collapsible">How can I create an account at FoodTiger?</button>
            <div class="content">
            <p class="p3">Click on "Sign Up" at the top of the page. Then fill out all information in the "Sign Up" section and click the "Submit" button.</p>
            </div>
        </div>
    </div>
    <footer>
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
        content.style.maxHeight = null;
        } else {
        content.style.maxHeight = content.scrollHeight + "px";
        }
    });
    }
</script>
</body>
</html>