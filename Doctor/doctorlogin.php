<?php
    include_once('include/doctor_loginconn.php');

?>

<!DOCTYPE html>
<html lang="en" class="allpage">
<head>
  <title>Doctor | Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
      body{
        background-color: #99ff99;
      }
      table{
        border:1px solid 000099;
        width: 500px;
        margin-top:180px;
        border-radius: 5px;
        background-color: rgba(255,204,102,.2);
        box-shadow: 0 5px 15px rgba(0,0,0,.5);
      }
      table tr td{
        padding:15px;
        font-size: 16px;
      }
      button{
        float: right;
        width: 100px;
      }
  </style>



</head>
<body>

            <form class="form" action="" method="POST">
           
            <table align="center">
              <tr>
                <td colspan="3" align="center"><h2>Doctor</h2></td>
              </tr>
              <tr>
              </tr>
              <tr>
                  <td>Username</td>
                  <td><input type="text" class="form-control" placeholder="Username" name="username" required></td>
              </tr>
              <tr>
                  <td>Password</td>
                  <td><input type="Password" class="form-control" placeholder="Password" name="password" required></td>
              </tr>
              <tr>
                <td></td>
                <td><button type="submit" class="btn text-primary" name="login" >Login</button></td>
              </tr>
              
                  
            </table>
            
            </form>
              
</body>
</html>