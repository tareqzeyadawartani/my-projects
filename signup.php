<?php
include 'config.php';

error_reporting(0);
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=md5($_POST['password']);
  $cpassword=md5($_POST['cpassword']);
  $gender=$_POST['gender'];
  $typeuser=$_POST['typeuser'];
  if($password==$cpassword){
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 0){
       $sql ="INSERT INTO users (username,email,phone,password,gender,typeuser) VALUES('$username','$email',
       '$phone','$password','$gender','$typeuser')";
     $result= mysqli_query($conn,$sql);
     if($result){
      echo "<script>alert('user registration successfully')</script>";
     }
      else{
      echo "<script>alert('something wrong')</script>";
     }      
  }else{
    echo "<script>alert('this email already exis')</script>";
  }
    }
   else{
    echo "<script>alert('password not matched')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="eidth=fevice-width, initial-scale=0">
<link rel="stylesheet" href="index.css">
<title>sign up</title>
</head>
<body>
   <div class="container">
     <form action="" method="POST" class="fLog">
        <p id="log">sign up</p>
        <div class="input-groub">
            <input type="text"  placeholder="username" name="username" value="<?php echo $username ?>" required="">
        </div>
        <div class="input-groub">
        	<input type="email" placeholder="Email" name="email" value="<?php echo $email ?>" required="">
        </div>
        <div class="input-groub">
          <input type="number" placeholder="Phone Number" name="phone" value="<?php echo $phone ?>" required="">
        </div>
        <div class="input-groub">
        	<input type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" required="">
        </div>
        <div class="input-groub">
            <input type="password" placeholder="confirm password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required="">
        </div>    
        <div class="input-groub">
          <label id="gen">Gender:</label>
          <input  type="radio" name="gender"  value="Male" required=""><label id="gen">Male</label>
           <input  type="radio" name="gender"  value="Female" required=""><label id="gen">Female</label>
        </div>
        <div class="input-groub">
          <label id="gen">kind of user:</label>

          <select name="typeuser" id="tyuser">
            <option value="admin" required="">admin</option>
            <option value="user" required="">user</option>
          </select>
        </div>
        <div class="input-groub">
        	<button class="btn" name="submit">Register</button>
        </div>
        <p class="lrt" id="gen"> have an account ?<a href="signIn.php">login here</a></p>
     </form>
   </div>
</body>
</html>