<?php
   include('phpfiles/user-loginconn.php');
   
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
  <link  rel=" stylesheet" type="text/css" href="css/login.css" />
  <link  rel=" stylesheet" type="text/css" href="css/layout.css" />
  <style type="text/css">
    table{
      font-family: Times New Roman;
      font-size: 20px;
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
            <!--Sidebar-->
            <?php
                require 'menu/sidebar.php';
            ?>
            <!--/.well -->
        </div>
        <!--/span-->

        <div class="col-xs-12 col-sm-9">
            <br>
            <div class="jumbotron">
              <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                <p>Login</p>
                <form action="" method="POST" >
                
                      <table class="form-group table" >

                        <tr>
                          <th>Email</th>
                          <td><input type="email" class="form-control" placeholder="User Email" name="user-email" required>
                          </td>
                        </tr>
                        <tr>
                          <th>Password</th>
                          <td>
                            <input type="password" class="form-control" placeholder="User Password" id="bc" name="user-psw" required>

                          </td>
                        </tr>
                        <tr>
                          <td><button class="btn" type="submit" name="login-btn">Login</button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="signup.php">Register Here</a>
                          </td>
                          <td>
                            <a href="userforget-password.php" >Forgot password?</a>
                          </td>
                        </tr>
                      </table>
                        
                    </div>
                </form>
            </div>
            <!--/row-->
        </div>  <!--/span-->
    </div>
    <!--/row-->
    <hr>
    <footer>
        <p>© Online Medical Help 2019</p>
    </footer>

</div>
<!--/.container-->

</body>
</html>
