<?php  
$con=mysqli_connect("localhost","root","","data");
if(isset($_POST['register'])){
    $sname=$_POST['sname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $c_pass=$_POST['c_pass'];
    $input_erro=array();
    if(empty($sname)){
        $input_erro['sname']="error";
    }
    if(empty($username)){
        $input_erro['username']="error";
    }
    if(empty($email)){
        $input_erro['email']="error";
    }
    if(empty($number)){
        $input_erro['number']="error";
    }
    if(empty($password)){
        $input_erro['password']="error";
    }
    if(empty($c_pass)){
        $input_erro['c_pass']="error";
    }
    if(count($input_erro)==0){
    $user=mysqli_query($con, "SELECT * FROM `register` WHERE `username`='$username'");
    if(mysqli_num_rows($user)==0){
    if($password==$c_pass){
    $pass32bit=md5($password);
    $query=mysqli_query($con, "INSERT INTO `register`(`sname`, `username`, `email`, `number`, `password`) VALUES ('$sname','$username','$email','$number','$pass32bit')");
    if($query){
        echo "<script>
        alert('Successfully Submit your information');
        window.location.href='admin.php';
        </script>";
    }else{
        echo "<script>
        alert('Some Error please try again!');
        window.location.href='register.php';
        </script>";
    }
    }else{
        $input_erro['pass_match']="<script>
        alert('Your Confirm password is to match please try again!');
        window.location.href='register.php';
        </script>";
    }
    }else{
        $input_erro['user_unique']="<script>
        alert('The username already exist plase try again!');
        window.location.href='register.php';
        </script>";
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="register.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
   <!-- -----form_section_design_start_----  -->
    <div class="register">
        <h1 class="re_logo">Register</h1>
        <form action="#" method="POST" >
        <!-- ---number_01_start_--- -->
            <div class="re_itams">
                <p class="name">Name</p>
                <input type="text" name="sname" placeholder="Your answer" class="re_info <?php if(isset($input_erro['sname'])) {echo $input_erro['sname'];} ?> ">
            </div>
            <!-- ---number_01_end_--- -->
             <!-- ---number_02_start_--- -->
            <div class="re_itams">
                <p class="name">Username</p>
                <input type="text" name="username" placeholder="Your answer" class="re_info <?php if(isset($input_erro['username'])) {echo $input_erro['username'];} ?> ">
            </div>
             <!-- ---number_02_end_--- -->
             <!-- ---number_03_start_--- -->
             <div class="re_itams">
                <p class="name">Email</p>
                <input type="email" name="email" placeholder="Your answer" class="re_info  <?php if(isset($input_erro['email'])) {echo $input_erro['email'];} ?>">
            </div>
             <!-- ---number_03_end_--- -->
             <!-- ---number_04_start--- -->
             <div class="re_itams">
                <p class="name">Number</p>
                <input type="number" name="number" placeholder="Your answer" class="re_info <?php if(isset($input_erro['number'])) {echo $input_erro['number'];} ?> ">
            </div>
             <!-- ---number_04_end--- -->
             <!-- ---number_05_start--- -->
             <div class="re_itams">
                <p class="name">Password</p>
                <input type="password" name="password" placeholder="Your answer" class="re_info <?php if(isset($input_erro['password'])) {echo $input_erro['password'];} ?> ">
            </div>
             <!-- ---number_05_end--- -->
             <!-- ---number_06_start--- -->
             <div class="re_itams">
                <p class="name">Confirm Password</p>
                <input type="password" name="c_pass" placeholder="Your answer" class="re_info  <?php if(isset($input_erro['c_pass'])) {echo $input_erro['c_pass'];} ?>">
            </div>
             <!-- ---number_06_end--- -->
         <!-- ------form_button_start_--- -->
           <div class="register_button">
            <input type="submit" name="register"  class="re_btn" value="Submit" title="Fill the blanks and submit your information">
           </div>
         <!-- ------form_button_end_--- -->
<!-- ---form_link_start_--- -->
<div class="form_link">
Alraday Have a Accunt  <a href="login.php" class="log_link"><i class="fa-solid fa-right-to-bracket" title="login form "></i> </a>
</div>
 <!-- ---form_link_end_--- -->
        </form>
    </div>
<!-- -----form_section_design_end_----  -->
</body>
</html>