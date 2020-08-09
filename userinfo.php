<?php
    include_once('phpfiles/user-loginconn.php');
    
    if (!isset($_SESSION['user-in'])) {
        echo "<script>alert('You Should Login or Register If Not Registered To Access Your Information');
            window.location='login.php';
            </script>";
    }else{
        $_SESSION['user-in'];

    }

    $dbMail1=$_SESSION['user-in'];
    $sql="SELECT * FROM user WHERE Email='$dbMail1' ";
     $sqlResult=mysqli_query($db,$sql);

if(isset($_POST['signupbtn'])){

    $Descrip = mysqli_real_escape_string( $db,$_POST['description']);

          $UserResult=mysqli_query($db,"SELECT * FROM user");
          $useRow=mysqli_fetch_array($UserResult);

          $sql="UPDATE user SET Description='$Descrip', status='0',Doctor_Comment='' WHERE Email= '$dbMail1'";
            mysqli_query($db, $sql);
            echo "<script>alert('Submited');
            window.location='userinfo.php';
            </script>";
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
             border:1px solid green;
             padding: 12px;
             background-color: #C6E9C3;
             
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
            <a class="active navbar-brand" href="index.php " >Medical Help</a>
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
            <!--/Sidebar-nav -->
        </div><!--/Sidebar-->
        <div class="col-xs-12 col-sm-9">
            <br>
          <div class="jumbotron ">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>

                <!--Account creating form for new user  -->
            
                <table >
                   <h2>User Information</h2> 
                <?php while ($sqlRec=mysqli_fetch_assoc($sqlResult)): ?>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $sqlRec['FirstName'];?></td>
                    </tr>
                    <tr>
                        <th>Second Name</th>
                        <td><?php echo $sqlRec['LastName'];?></td>
                    </tr>
            
                    <tr>
                        <th>Email</th>
                        <td><?php echo $sqlRec['Email'];?></td>
                    </tr>
                      
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php
                            if ($sqlRec['status']==0) {
                                echo "<b class='text text-danger' >REQUEST PENDING</b>";
                            }else{
                                 echo "<b class='text text-success' >SEEN</b>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>My Description </th>
                        <td><?php echo $sqlRec['Description'];?></td>
                    </tr>
                    <tr>
                        <th>Doctor's Reply</th>
                        <td><?php echo $sqlRec['Doctor_Comment'];?></td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                    <td colspan="2">
                        <form action="" method="POST">
                             <textarea type="comment" class="form-control" name="description" rows="10" placeholder="Describe Your Age and Health status in brief" required ></textarea> 

                            <div class="clearfix col-xs-12 col-sm-12">
                                <button type="reset" class="cancelbtn scol-xs-8 col-sm-4">Reset</button>
                                <button type="submit" class="signupbtn col-xs-8 col-sm-4" name="signupbtn">Submit</button>
                            </div>
                        
                        </form>
                    </td>
                </tr>    
                </table>
            
           
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
