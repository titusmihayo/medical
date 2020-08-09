<?php
    include_once('../phpfiles/loginconn.php');

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
              <tr>
                <td class="text text-danger" colspan="2" align="center" style="font-size:18px; ">
                 
                    <?php
                      if (isset($_SESSION['login_user'])) {
                        echo $_SESSION['login_user'];
                        unset($_SESSION['login_user']);
                      }
                      ?>
                      <?php
                      if (isset($_SESSION['login_invalid'])) {
                      echo $_SESSION['login_invalid'];
                      unset($_SESSION['login_invalid']);
                      }
                    ?>
                 
                </td>
              </tr>
              <tr>
                  <td>Username</td>
                  <td><input type="text" class="form-control" placeholder="Username" name="admin_username" required></td>
              </tr>
              <tr>
                  <td>Password</td>
                  <td><input type="Password" class="form-control" placeholder="Password" name="admin_password" required></td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2"><a href="forgot-psw.php">Forgot Password</a></td>
              </tr>
              <tr>
                <td></td>
                <td><button type="submit" class="btn text-primary" name="login" >Login</button></td>
              </tr>
              
                  
            </table>
            
            </form>
              
</body>
</html>