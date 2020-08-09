<?php
    include_once('../phpfiles/loginconn.php');
    include_once('../phpfiles/forgetphp.php');

    
?>

<!DOCTYPE html>
<html lang="en" class="allpage">
<head>
  <title>AdminPanel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link  rel=" stylesheet" type="text/css" href="logincss/logincss.css" />



</head>
<body>

            <form class="form" action="" method="POST">
            <table align="center">
              <input type="hidden" name="uid" value="">
              <tr style="background-color: #f1f1f1; " align="center">
                <td colspan="2" style="font-size: 20px; color: #9900cc; ">
                    <i><b>RESET PASSWORD</b></i></td>
              </tr>
              <tr>
                  <td>User Name</td>
                  <td><input type="text" class="form-control" placeholder="User Name" name="uname" required></td>
              </tr>
              <tr>
                  <td>Enter Your Email</td>
                  <td><input type="email" class="form-control" placeholder="Email" name="C_email" required></td>
              </tr>
              <tr>
                  <td> Enter New Password</td>
                  <td><input type="Password" class="form-control" placeholder="Username" name="new_psd" minlength="5" required></td>
              </tr>
              <tr>
                  <td>Confirm Password</td>
                  <td><input type="Password" class="form-control" placeholder="Confirm Password" name="Cnew_psd" minlength="5" required></td>
              </tr>
              <tr>
                <td>
                  <a href="login.php"><button class="button">Back</button></a>
                </td>
                <td><button type="submit" class="btn text-primary" name="submit-forget" >Login</button>
                </td>
              </tr>
              
            </table>
            
            </form>
              
</body>
</html>