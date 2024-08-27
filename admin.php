<?php   
session_start();
if(!isset($_SESSION[ 'user_login'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div class="top_nav">
<div class="manu_btn">
  <i class="fa-solid fa-bars"></i>
  </div> 
</div>
<div class="side_bar">
   <div class="close_btn">
   <i class="fa-solid fa-circle-xmark"></i>
   </div> 
    <div class="manu">
   <div class="logo">
   <img width="100px" height="100px" src="image/images.jpeg" alt="">
   </div>
        <div class="items">
            <a href="admin.php?page=dashbord"><i class="fa-solid fa-desktop"></i>Dashboard</a>
        </div>
        <div class="items">
            <a class="sub_btn"><i class="fa-solid fa-table"></i>Table <i class="fas fa-angle-right dropdown "></i></a>
            <div class="sub_manu">
                <a href="#" class="sub_items" >Sub item 01</a>
                <a href="#" class="sub_items" >Sub item 02</a>
                <a href="#" class="sub_items" >Sub item 03</a>
            </div>
        </div>
        <div class="items">
            <a href="#"><i class="fa-solid fa-th"></i>Form</a>
        </div>
        <div class="items">
            <a class="sub_btn"><i class="fa-solid fa-cogs"></i>Settings <i class="fas fa-angle-right dropdown "></i></a>
            <div class="sub_manu">
                <a href="#" class="sub_items" >Sub item 01</a>
                <a href="#" class="sub_items" >Sub item 02</a>
            </div>
        </div>
        <div class="items">
            <a href="#"><i class="fa-solid fa-info-circle"></i>About</a>
        </div>
        <div class="items">
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </div>
    </div>
 </div>
<div class="min_content">
    <div class="row">
        <?php  
        if(isset($_GET['page'])){
            $page=$_GET['page'].'.php';
        }else{
            $page='dashbord.php';
        }
        if(file_exists($page)){
            require $page;
        }else{
            require 'not_found.php';
        }
        ?>
    </div>
</div>
 <script src="admin.js"></script>
</body>
</html>