  <?php
  $server="localhost";
  $user="root";
  $pass="";
  $database="login";
  $conn = mysqli_connect($server,$user,$pass,$database);
  if(!$conn){
  	die("<script>alert('connection failed')</script>");
  }

  if (isset($_POST['email'])) {
  
  	$id=$_POST['id'];
  	$username=$_POST['username'];
  	$email=$_POST['email'];
  	$phone=$_POST['phone'];
  	$gender=$_POST['gender'];
  	$typeuser=$_POST['typeuser'];
  	$result =mysqli_query($conn,"UPDATE users SET username='$username',email='$email',phone='$phone',gender='$gender',typeuser='$typeuser' WHERE id='$id' ");

  	if ($result) { 
      $result2 =mysqli_query($conn,"SELECT * FROM users ");
      print_r($result2);die;
  	}
    if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>ggg</title>
  </head>
  <body>
    <table>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>User Type</th>


            </tr>
            
            <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr id="<?php echo $rows['id']; ?>">
               
                <td><?php echo $rows['id'];?></td>
                <td data-target="username"><?php echo $rows['username'];?></td>
                <td data-target="email"><?php echo $rows['email'];?></td>
                <td data-target="phone"><?php echo $rows['phone'];?></td>
                <td data-target="gender"><?php echo $rows['gender'];?></td>
                <td data-target="typeuser"><?php echo $rows['typeuser'];?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $rows['id'];?>">Update</a></td>
                <td><button>delete</button></td>

              
            </tr>

            <?php
                }
             ?>

        </table>
  
  </body>
  </html>