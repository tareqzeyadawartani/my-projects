<?php
include 'config.php';
session_start();
error_reporting(0);
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['username']=$row['username'];
         $_SESSION['id']=$row['id'];
         $_SESSION['typeuser']=$row['typeuser'];
        //header("location:welcome.php");
         if($_SESSION['typeuser']=="admin"){
             header('Location: admipage.php');
         }else{
            header('Location: userpage.php');
         }
       
    }else{
         echo "<script>alert('Email or password incorrect')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="eidth=fevice-width, initial-scale=0">
<link rel="stylesheet" href="index.css">
<title>Login</title>
</head>
<body>
   <div class="container">
     <form action="" method="POST" class="fLog">
        <p>Login</p>
        <div class="input-groub">
        	<input type="email" placeholder="Email" name="email" value="<?php echo $email ?>" required="">
        	<div class="input-groub">
        	<input type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" required="">
        	<div class="input-groub">
        	<button class="btn" name="submit">Login</button>
        </div>
        <p class="lrt">dont have an account ?<a href="signup.php">Register Here</a></p>
     </form>
   </div>
</body>
</html>