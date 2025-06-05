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
    <script src="../../js/picture.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../../css/pic.css" rel="stylesheet" >
    
</head>
<?php
session_start();
?>
    <div class="container">    
 <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Add Categories</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="category.php" >Dismiss</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form"action="addCategory.php" method="POST" >
                                
                                <div class="form-group">
                                    <label for="name" class="col-md-3 control-label">Category Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="name" id="name" >
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="description" class="col-md-3 control-label">Description :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-md-3 control-label">Image :</label>
                                    <div class="col-md-9"  >
                                    <img src="../../image/uknown.png" onclick="triggerClick()" id="profileDisplay">
                                    <input name="image" type="file"  id="image"  onchange="displayImage(this)" style="display: none;">  
                                    </div>
                                </div>
                                
                                <input name="category_exixts" id="category_exixts"  value="exixts" style="display: none;"> 
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-6">
                                        <button id="btn-signup" type="submit"  name="insert"class="btn btn-info btn-block"><i class="icon-hand-right"></i> Add New</button>
                                       
                                    </div>
                                </div>
                                
             
                                
                                
                            </form>
                         </div>

               
               
                
         </div> 
</html>