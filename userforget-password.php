<?php
  include_once 'phpfiles/config.php';
  if (isset($_POST['user-forget'])) {
    $Fname=mysqli_real_escape_string($db,$_POST['funame']);
    $Lname=mysqli_real_escape_string($db,$_POST['luname']);
    $Pnumber=mysqli_real_escape_string($db,$_POST['phn_number']);
    $psd=mysqli_real_escape_string($db,$_POST['user_psd']);
    $Cpsd=mysqli_real_escape_string($db,$_POST['Cuser_psd']);
    $sql="SELECT * FROM user WHERE Phonenumber='$Pnumber' ";
    $sqlRes=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($sqlRes);
    /*echo $row['FirstName'];
    echo $row['LastName'];
    echo $row['Phonenumber'];
*/
    if ($Fname!=$row['FirstName'] && $Lname!=$row['LastName']) {
      echo "<script>alert('You are Not Registered, Rigister First');
        window.location='signup.php';
      </script>";
    }else{
      if ($Pnumber!=$row['Phonenumber']) {
        echo "<script>alert('Wrong phone Number !');</script>";
      }else{
        if ($psd!=$Cpsd) {
          echo "<script>alert('Password Do Not Match !');</script>";
        }else{
          $passHash=password_hash($psd,PASSWORD_DEFAULT);
          $InsSql="UPDATE user SET Password='$passHash' WHERE Phonenumber='$Pnumber' ";
          mysqli_query($db,$InsSql);
            echo "<script>alert('Password Reseted, Yo can Now Login');
                window.location='login.php';
            </script>";
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en" class="allpage">
<head>
  <title>Online Medical Help</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link  rel=" stylesheet" type="text/css" href="css/signup.css" />
  <link  rel=" stylesheet" type="text/css" href="css/layout.css" />
    <style type="text/css">
        table{
            font-size: 20px;
            font-family: Times New Roman;
            width: 100%;
        }
        table tr td,th {
            margin-top: 0px;
             padding:0px;
             padding-left: 10px;
             background-color: #C6E9C3;
        }
        form {
          width: 100%;
        }
    </style>
</head>
<body>

<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="active navbar-brand" href="index.php">Medical Help</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                
                <?php
                    if (isset($_SESSION['user-in'])) {
                        echo "<li><a href='phpfiles/user-logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
                    }else{
                        echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-out'></span> Login</a></li>";
                    }
                ?>
            </ul>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</div>
<!-- /.navbar -->

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="sidebar-nav">
              <ul class="nav">
                <li class="active"><a href="welcome.php">Welcome</a></li>
                <li class="nav-divider"></li>
                <li><a href="medicalcenter.php">Medical Centers</a></li>
                <li class="nav-divider"></li>
                <li><a href="pharmacy.php">Pharmarcies</a></li>
                <li class="nav-divider"></li>
                <li><a href="userinfo.php">User Feedback</a></li>
              </ul>
            </div><!--/Sidebar-nav -->
        </div><!--/Sidebar-->
        <div class="col-xs-12 col-sm-9">
            <br>
          <div class="jumbotron ">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>

                <!--Account creating form for new user  -->
            <form class="form" action="" method="POST">
            <table align="center">
              <input type="hidden" name="uid" value="">
              <tr style="background-color: #f1f1f1; " align="center">
                <td colspan="2" style="font-size: 20px; color: #9900cc; ">
                    <i><b>RESET PASSWORD</b></i></td>
              </tr>
              <tr>
                  <td>First Name</td>
                  <td><input type="text" class="form-control" placeholder="Fisrt Name" name="funame" required></td>
              </tr>
              <tr>
                  <td>Last Name</td>
                  <td><input type="text" class="form-control" placeholder="Last Name" name="luname" required></td>
              </tr>
              <tr>
                  <td>Enter Your Phone Number</td>
                  <td><input type="text" class="form-control" placeholder="Phone Number" name="phn_number" required></td>
              </tr>
              <tr>
                  <td> Enter New Password</td>
                  <td><input type="Password" class="form-control" placeholder="Password" name="user_psd" minlength="5" required></td>
              </tr>
              <tr>
                  <td>Confirm Password</td>
                  <td><input type="Password" class="form-control" placeholder="Confirm Password" name="Cuser_psd" minlength="5" required></td>
              </tr>
              <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary" name="user-forget" >Save</button>
                </td>
              </tr>
              
            </table>
            
            </form>
           
          </div>
            <!--/row-->
        </div>  <!--/span-->
    </div><!--/row offcanvas-->
    <hr>
</div><!--/container-fluid-->
<footer>
        <p>© Online Medical Help 2019</p>
</footer>
</body>
</html>
