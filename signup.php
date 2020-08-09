<?php
    include_once('phpfiles/signupconn.php');

            
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
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
            <!--/Sidebar-nav -->
        </div><!--/Sidebar-->
        <div class="col-xs-12 col-sm-9">
            <br>
          <div class="jumbotron ">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>

                <!--Account creating form for new user  -->
            <form action="" method="POST">
                <div class="container ">
                    <h2>Submit Your Information</h2>
                    <p>Please fill in this form to provide some infomations that will be helpful to the Medical Staff to provide assistence to you</p>
                    <p>The Medical Staff will Contact you for more infomation and diagnosis</p>
                    <hr>

                    <input type="text" placeholder="First Name" name="fname" required>
                    <input type="text" placeholder="Last Name" name="lname" required>
                    <!--<input type="number" placeholder="Enter your Age" name="age" min="15" max="120" required>
                     <input type="text" placeholder="Physical Address" name="address" > -->
                    <input type="text" placeholder="Email if any" name="email" required >
                    <!--<input type="text" placeholder="+255xxxxxxxxxs" name="phoneNumber" minlength="13" maxlength="13">
                     <textarea type="comment" class="form-control" name="description" rows="10" placeholder="Describe Your Health status in brief" ></textarea> -->
                    <input type="Password" name="psw" minlength="5" placeholder="Enter Your Password" required >
                    <input type="Password" name="Cpsw" minlength="5" placeholder="Enter Your Password" required>

                    <div class="clearfix col-xs-12 col-sm-12">
                        <button type="reset" class="cancelbtn col-xs-8 col-sm-4">Reset</button>
                        <button type="submit" class="signupbtn col-xs-8 col-sm-4" name="signupbutton">Submit</button>
                    </div>
                </div>
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
