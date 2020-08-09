<?php
  include('../phpfiles/config.php');
  session_start();
  $Sql_Doctor="SELECT * FROM user";
  $Doct_results=mysqli_query($db,$Sql_Doctor);

  if (isset($_POST['send'])) {
    $CatchEmail=$_SESSION['UserEmail'];
    $DocComment=mysqli_real_escape_string($db,$_POST['doc_com']);
    $SqlIns="UPDATE user SET Doctor_Comment='$DocComment',status='1' WHERE Email='$CatchEmail' ";
    $InsQuery=mysqli_query($db,$SqlIns);
   /* $StaSql="UPDATE user SET status='1' WHERE Email='$CatchEmail' ";
    $StaRes=mysqli_query($db,$StaSql);
    echo $CatchEmail;*/
    header('Location:doctor_index.php');
  }
?>
<!DOCTYPE html>
<html lang="en" class="allpage">
<head>
  <title>Doctor | Medical</title>
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
  </style>
</head>
<body>

<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="active navbar-brand" >Doctor Panel</a>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</div>
<!-- /.navbar -->

<div class="container-fluid">
        <div class="col-xs-12 col-sm-12 ">
            <br>
          <div class="jumbotron ">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
          <form method="POST" action="doctor_index.php" style=" width: 100%;">
            <table class="table" > 
                <tr>
                    <th>First Name</th>
                    <th>Second Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Views</th>
                    <?php while ($Doct_rec=mysqli_fetch_array($Doct_results)): 
                ?>
                </tr>
                
                <tr>
                    <td><?php echo $Doct_rec['FirstName'];?></td>
                    <td><?php echo $Doct_rec['LastName'];?></td>
                    <td><?php echo $Doct_rec['Age'];?></td>
                    <td><?php echo $Doct_rec['Email'];?></td>
                    <td><?php echo $Doct_rec['Phonenumber'];?></td>
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
                      <input type="text" name="doc_com" placeholder="Doc Comment" >
                    </td>
                    <td>
                      <button type="submit" class="btn btn-info" name="send" >Send</button>
                      
                    </td>
                </tr>
                <?php endwhile; ?>
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
