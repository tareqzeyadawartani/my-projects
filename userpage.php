<?php
  
session_start();
//print_r($_SESSION['id']);die;
$user = 'root';
$password = ''; 
  
$database = 'login'; 
  
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
$id=$_SESSION['id'];
//echo $id; die;
$sql = "SELECT * FROM users WHERE id =$id ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>User page</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <section>
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
            <tr>
                
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['typeuser'];?></td>
                <td><button>update</button></td>
                <td><button>delete</button></td>

            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  
</html>