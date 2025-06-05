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

if(isset($_GET['f_id'])){
    $f_id=$_GET['f_id'];
    $sql="select * from food where food.f_id='".$f_id."'";
    $result=$conn->query($sql);
    if($result->num_rows >0){
        while($row = $result -> fetch_assoc()){     
            $nameFood=$row['nameFood'];
            $description=$row['description'];
            $imagefood=$row['imageFood'];
            $cart_id=$row['cart_id'];
            $price=$row['price'];
            $f_id=$row['f_id'];
        }
}

}
                 
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Food</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="css/fooddetails.css">
    <link href="js/replace.css" rel="stylesheet"> 
    
</head>
<body>
<header>        
        <?php 
          include "navandfooter/nav.php";
        ?>           
</header>
    <div class="container" style="margin-top:12%;margin-bottom:3%;">
        <?php
        $sql = 'SELECT c_id,name FROM category';
        $sql = "SELECT * FROM food WHERE options = 'ENABLE' ORDER BY f_id";
        $connect = mysqli_connect("localhost", "root", "", "foodtiger");
        
        $query = "SELECT * FROM food ORDER BY f_id ASC";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_all($result))
            {
        ?>
    <form method="post" action="cart.php?action=add&id=<?php echo $f_id; ?>">
    <div class="card">
	    <div class="row" >
            
                <aside class="col-sm-6 border-right">
                    <article class="gallery-wrap"> 
                        <div class="img-big-wrap">
                            <img src="image/<?php echo $imagefood;?>" alt="<?php echo $nameFood;?>" class="img-fluid" style="width:100%;height:70%;margin-top:100px;text-align:center;">
                        </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-6">
                    <article class="card-body p-5">
                        <h3 class="title mb-3"><?php echo $nameFood;?></h3>

                <p class="price-detail-wrap"> 
                    <span class="price h3 text-warning"> 
                        <span class="currency">RM<?php echo $price;?></span>
                    </span> 
                </p> <!-- price-detail-wrap .// -->
                <dl class="item-property">
                <dt>Description</dt>
                <dd><p><?php echo  $description;?></p></dd>
                </dl>
                <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="param param-inline">
                            <dt>Quantity: </dt>
                            <dd>
                            <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 80px;">
                            </dd>
                            </dl>  <!-- item-property .// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                    <hr>
                    <input  name="hidden_name" value="<?php echo $nameFood; ?>" style="display: none;">
                    <input  name="hidden_price" value="<?php echo  $price; ?>" style="display: none;">
                    <input name="hidden_c_id" value="<?php if (isset($_GET['f_id'])){echo $cart_id; }?>" style="display: none;">
                    <?php
                    if (isset($_SESSION['Name'])) { ?>
                        <input type="submit" name="add" class="btn btn-lg btn-warning text-uppercase text-white" value="Add to Cart" >
                    <?php
                    } else {?>
                        <a href="#" class="btn btn-lg btn-warning text-uppercase text-white" name="add" value="Add to Cart" onclick="document.getElementById('id01').style.display='block'">Add to Cart</a>
                    <?php 
                    } ?>   
                </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card.// -->
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
    <footer style="margin-top:15%;">
        <?php 
          include "navandfooter/footer.php";
        ?>
    </footer>
    </body>
    </html>