<?php  
session_start();
if(isset($_SESSION['user_login'])){
    header('location:admin.php');
}
$con=mysqli_connect("localhost","root","","data");
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $input_erro=array();
    if(empty($username)){
        $input_erro['username']="error";
    }
    if(empty($password)){
        $input_erro['password']="error";
    }
    $user_check=mysqli_query($con, "SELECT * FROM `register` WHERE `username`='$username'");
    if(mysqli_num_rows($user_check)==1){
    $rows=mysqli_fetch_assoc($user_check);
    if($rows['password']=md5($psseord)){
   if($rows['status']=='Active'){
    $_SESSION['user_login']=$username;
    header('location:admin.php');
   }else{
    echo"<script>
    alert('Your account inactive.Please at first active your account!');
    window.location.href='login.php';
    </script>";
   }
    }else{
        echo"<script>
        alert('wrong password!');
        window.location.href='login.php';
        </script>";
    }
    }else{
       echo"<script>
        alert('The username is not found!');
        window.location.href='login.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- ----form_section_design_start_---- -->
     <div class="login">
        <h1 class="login_logo">Login</h1>
        <form action="#" method="POST" >
         <!-- ---number_01_start_----    -->
            <div class="log_itams">
                <p class="name">Username</p>
                <input type="text" name="username" placeholder="Your answer" class="log_info <?php if(isset($input_erro['username'])){echo $input_erro['username'];} ?> ">
            </div>
         <!-- ---number_01_end_----    -->
         <!-- ---number_02_stert_----    -->
         <div class="log_itams">
                <p class="name">password</p>
                <input id="show" type="password" name="password" placeholder="Your answer" class="log_info <?php if(isset($input_erro['password'])){echo $input_erro['password'];} ?>  ">
            </div>
         <!-- ---number_02_end_----    -->
       <!-- ----form_bottom_section_start---- -->
        <div class="form_botton">
            <div class="form_forgot">
                <a class="forgot" href="#">Forgot passwod</a>
            </div>
            <div class="check">
          <input type="checkbox" name="chk"  onclick="myFunction()" > <span>
            Show password
          </span>     
            </div>
        </div>
       <!-- ----form_bottom_section_end---- -->
      <!-- .form_button_section_start__---- -->
       <div class="form_button">
        <input type="submit" name="login" value="Submit" class="log_btn" >
       </div>
      <!-- .form_button_section_end__---- -->
       <!-- -----re_link_start__-- -->
        <div class="re_link">
            Not a Member?<a href="register.php" class="link"><i class="fa-solid fa-right-to-bracket"></i></a>
        </div>
       <!-- -----re_link_end__-- -->
         
        </form>
     </div>
    <!-- ----form_section_design_end_---- -->
     <script src="show_pass.js"></script>
</body>
</html>