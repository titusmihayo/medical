<?php
include('include/doctor_loginconn.php');
   if (!isset($_SESSION['Doc_loged'])) {
      echo "<script>alert('Login First');window.location='doctorlogin.php'</script>";
    }else{
      $_SESSION['Doc_loged'];
    }
 
  $Sql_Doctor="SELECT * FROM user";
  $Doct_results=mysqli_query($db,$Sql_Doctor);
 
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
  <link  rel=" stylesheet" type="text/css" href="../css/signup.css" />
  <link  rel=" stylesheet" type="text/css" href="../css/layout.css" />
  <style type="text/css">
    .jumbotron{
      width: 100%;
    }
    table{
      background-color: #fff;
      font-family: arial;
      font-size: 16px;
      border-radius: 8px;
    }
    table tr td,th{
      border-right: 1px solid green;
    }
    .navbar .navbar-right {
      color: #fff;
      padding-top: 10px;
      font-size: 18px;
      padding-right: 20px;
      padding-left: 20px;
      font-style: none;
     
    }
    .navbar a:hover{
        color: blue;
        background-color: #f1f1f1;
        text-decoration: none;
    }

  </style>
</head>
<body>

<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid col-xs-12 col-sm-12">
        <div class="navbar-header">
            <a class="active navbar-brand" >Doctor Panel</a>
        </div>
        <div>
          <a class="navbar navbar-right" href="include/doctor_logout.php">Logout</a>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</div>
<!-- /.navbar -->

<div class="container-fluid">
        <div class="col-xs-12 col-sm-12 ">
            <br>
          <div class="jumbotron col-xs-12 col-sm-12 ">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
          <form method="POST" action="doctor_index.php" class="form-group" style=" width: 100%;">
            <table class="table col-xs-12 col-sm-12 " > 
                <tr>
                    <th>First Name</th>
                    <th>Second Name</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Views</th>
                    <?php while ($Doct_rec=mysqli_fetch_array($Doct_results)): 
                      $k=1;
                ?>
                </tr>
                
                <tr>
                    <td><?php echo $Doct_rec['FirstName'];?></td>
                    <td><?php echo $Doct_rec['LastName'];?></td>
                    <td><?php echo $Doct_rec['Email'];?></td>
                    <td><?php echo $Doct_rec['Description'];?></td>
                    <?php 
                      $_SESSION['UserEmail']=$Doct_rec['Email'];
                    ?>
                    <td>
                      <?php
                        if ($Doct_rec['status']=='0') {
                          echo "<b class='text text-danger' >PENDING</b>";
                        }else{
                          echo "<b class='text text-success' >SEEN</b>";
                        }
                      ?>
                     
                    </td>
                    <td>
                      <a href="send.php?key=<?php echo $Doct_rec['Email']; ?>">Comment</a>
                    </td>
                </tr>
                <?php 
                $k++;
              endwhile; ?>
            </table>
          </form>    
          </div>
            <!--/row-->
        </div>  <!--/span-->
    </div><!--/row offcanvas-->
    <hr>
</div><!--/container-fluid-->
</body>
</html>
