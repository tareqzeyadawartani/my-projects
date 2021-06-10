<?php
  

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
  
$sql = "SELECT * FROM users WHERE typeuser = 'user' ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        
    </section>

</body>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">UPDATE</button></td>

  <script>
      $(document).ready(function(){
        $(document).on('click','a[data-role="update"]',function(){
            var id =$(this).data('id');
            var username=$('#'+id).children('td[data-target=username]').text();
            var email=$('#'+id).children('td[data-target=email]').text();
            var phone=$('#'+id).children('td[data-target=phone]').text();
            var gender=$('#'+id).children('td[data-target=gender]').text();
            var typeuser=$('#'+id).children('td[data-target=typeuser]').text();

            $('#username').val(username);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#gender').val(gender);
            $('#typeuser').val(typeuser);
            $('#userId').val(id);
            $('#myModal').modal('toggle');

        })

        $('#save').click(function(){
            var id= $('#userId').val();
            var username=$('#username').val();
            var email=$('#email').val();
            var phone=$('#phone').val();
            var gender=$('#gender').val();
            var typeuser=$('#typeuser').val();

            $.ajax({
                url  :'config.php',
                method  :'post',   
                data  : {username : username,email : email,phone : phone,gender : gender,typeuser : typeuser,id : id},
                success:  function(response){
                    //console.log(response);
                    $('#'+id).children('td[data-target=username]').text();
                    $('#'+id).children('td[data-target=email]').text();
                    $('#'+id).children('td[data-target=phone]').text();
                    $('#'+id).children('td[data-target=gender]').text();
                    $('#'+id).children('td[data-target=typeuser]').text();
                    $('#myModal').modal('toggle');
                }
            });
        })
      });
  </script>
</html>  

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="form-groub">
            <label>userName</label>
            <input type="text" id="username" class="form-control" >
        </div>
        <div class="form-groub">
            <label>Email</label>
            <input type="email" id="email" class="form-control">
        </div>
        <div class="form-groub">
            <label>phone</label>
            <input type="number" id="phone" class="form-control">
        </div>
        <div class="form-groub">
            <label>Gender</label>
            <input type="text" id="gender" class="form-control">
        </div>
        <div class="form-groub">
            <label>Type User</label>
            <input type="text" id="typeuser" class="form-control">
        </div>
        <input type="hidden" id="userId" class="form-control">
      </div>
      <div class="modal-footer">
        <a href="#" id="save" class="btnbtn">update</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>