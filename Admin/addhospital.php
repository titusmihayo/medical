<?php
include_once('../phpfiles/loginconn.php');
if (!isset($_SESSION['loged'])) {
    header('Location:login.php');
}
else{
    $_SESSION['loged'];
}
    include_once('../phpfiles/addhospconn.php');

    $sql = "SELECT * FROM medicalcenter";
    $records =mysqli_query($db, $sql);
    $hupdate=false;

  $hname='';
  $hlocation='';
  $hPnumber='';

  if (isset($_GET['edit'])) {
  $id=$_GET['edit'];
  $hupdate=true;
  $selectdata = mysqli_query($db, "SELECT * FROM medicalcenter WHERE CenterID = $id;");
  $row = mysqli_fetch_array($selectdata);
  $hname = $row['CenterName'];
  $hlocation = $row['Location'];
  $hPnumber = $row['Contact'];
 }
?>

<!DOCTYPE html>
<html lang="en" class="allpage">
<head>
  <title>AdminPanel</title>
  <meta charset="utf-8"> <!-- Unicode Transformation Format -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link  rel=" stylesheet" type="text/css" href="../css/layout.css" />
  <link  rel=" stylesheet" type="text/css" href="../css/addhospital.css" />

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
            <a class="active navbar-brand" href="#">Admin Panel</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

               <li class="glyphicon glyphicon-user" style="margin-top: 8px; font-size: 20px; color: #006633; cursor: pointer; background-color: #ccc; padding: 9px; border-radius: 20px; padding-top: 3px; ">
                    <?php if (isset($_SESSION['loged'])) {
                        echo $_SESSION['loged'];
                      } ?>
               </li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
            
            <!-- Sidebar -->
            <?php
                require '../menu/adminsidebar.php';
            ?>
            <!--/.well -->
        </div>
        <!--/span-->

        <div class="col-xs-12 col-sm-9">
            <br>
            <?php
                    if (isset($_SESSION['hdelete'])): ?>
                      <div class="hdeletebutton"> 
                        <?php 
                            echo $_SESSION['hdelete'];
                            unset($_SESSION['hdelete']);
                             ?>
                      </div>
                 <?php endif; ?>
            <div class="jumbotron">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                
                <table class="table">
                     <tr>
                        <th>No.</th>
                        <th>Center Name</th>
                        <th>Medical Center Location</th>
                        <th>Contact</th>
                        <th>Action</th>
                     </tr>
                    <?php
                    $SNo=1;
                    while ($row = mysqli_fetch_assoc($records)): ?>
                       
                       <tr>
                           <td><?php echo $SNo; ?></td>
                           <td><?php echo $row['CenterName']; ?></td>
                           <td><?php echo $row['Location']; ?></td>
                           <td><?php echo $row['Contact']; ?></td>
                           <td>
                                <a href="addhospital.php?edit=<?php echo $row['CenterID']; ?>" class="btn btn-info">Edit</a>
                                <a href="addhospital.php?delete=<?php echo $row['CenterID']; ?>" class="btn btn-danger">Delete</a>
                           </td>
                       </tr>

                    <?php $SNo++; endwhile; ?>
                </table>
                <form action="" method="POST">
                    <?php if(isset($_SESSION['save'])): ?>
                        <div class="hsave">
                            <?php 
                                echo $_SESSION['save'];
                                unset($_SESSION['save']);
                            ?>
                        </div>
                    <?php endif?>
                    <?php if(isset($_SESSION['sms_center'])): ?>
                        <div class="hdeletebutton">
                            <?php 
                                echo $_SESSION['sms_center'];
                                unset($_SESSION['sms_center']);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="">
                        <label for="Hospital name">Enter the name of the Hospital</label></br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="text" placeholder="Hospital Name" value="<?php echo $hname;?>" name="addcenter" required></br>
                        <input type="text" placeholder="Medical Center Location" value="<?php echo $hlocation;?>" name="addLocation" required></br>
                        <input type="text" placeholder="+255xxxxxxxxx" value="<?php echo $hPnumber;?>" minlength="13" maxlength="13" name="addCont" required></br>
                    </div>

                    <div class="clearfix">
                      <?php if ($hupdate == true): ?>
                        <button type="submit" class="btn btn-primary col-xs-4 col-sm-4 " name="update">Update</button>
                      <?php else: ?>
                         <button type="submit" class="signupbtn col-xs-4 col-sm-4 " name="save">Save</button>
                      <?php endif; ?>
                    </div> 
                </form>
            </div><!--/row-->
        </div>
    </div>
    <hr>

    
</div>
<!--/.container-->
<footer >
         <p>© Online Medical Help 2019</p>
</footer>
</body>
</html>
