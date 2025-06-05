<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../../css/food.css" rel="stylesheet"> 
    <script src="../../js/delete.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../../css/table.css" rel='stylesheet' type='text/css'>
    <link href="../../css/picture.css" rel='stylesheet' type='text/css'>
</head>
<?php
session_start();
require('../../database/pdo.php');
require('../../database/mysql.php');
$sql = 'SELECT food.f_id, food.nameFood, food.description,food.imageFood,food.price,category.name
        FROM food
        LEFT JOIN category
        ON food.cart_id = category.c_id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
$results_per_page = 6;
$sql='SELECT * FROM food';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM food LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
foreach ($arr_all as $key){}
?>
						
<div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;Food</h1> 
    <h1 style=" text-align: right;"><a href="admincontrolside.php"  >Back</a></h1> 
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Food list</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                  <a href="FoodList.php" class="btn btn-sm btn-primary btn-create" >Create New</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th> 
                        <th>Price</th>    
                    </tr> 
                  </thead>
                  <tbody>
                          <tr>
                          <?php
                            while($row = mysqli_fetch_array($result)) {
                          ?>
                            <td align="center">
                              <a class="btn btn-default" href ="FoodList2.php? f_id=<?php echo $row['f_id'];?>"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger" href="deleteFood.php?f_id=<?php echo $row['f_id']; ?>"><span class="new badge" data-badge-caption="" onclick="return ConfirmDelete();"><em class="fa fa-trash"></em></span></a>
                            </td>
                            <td><img src="../../image/<?php echo $row['imageFood']; ?>" alt="image" style="width:150px; height:150px;object-fit: contain;" ></td>
                            <td><?php echo $row['nameFood'];?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $key['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                          </tr>
                        </tbody>
                            <?php } ?>
                </table>        
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">  
                      <?php
                      for ($page=1;$page<=$number_of_pages;$page++) {
                        echo ' <li><a href="food.php?page=' . $page . '">' . $page . '</a> </li> ';}
                        ?>                
                    </ul>
                  </div>
                </div>
              </div>
            </div>
</div></div></div>

</html>