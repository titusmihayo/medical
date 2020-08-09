<?php
include_once('../phpfiles/loginconn.php');
if (!isset($_SESSION['loged'])) {
    header('Location:login.php');
}
else{
    $_SESSION['loged'];
}
    include_once('../phpfiles/adddocpconn.php');

    $sql = "SELECT * FROM doctortb";
    $records =mysqli_query($db, $sql);
    $hupdate=false;

  $Fname='';
  $Sname='';
  $Uname='';

  if (isset($_GET['edit'])) {
  $id=$_GET['edit'];
  $hupdate=true;
  $selectdata = mysqli_query($db, "SELECT * FROM doctortb WHERE DocID = $id;");
  $row = mysqli_fetch_array($selectdata);
  $Fname = $row['FirstName'];
  $Sname = $row['SecondName'];
  $Uname = $row['UserName'];
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
            <div class="jumbotron">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                
                <table class="table">
                  <p>Registered Doctors</p>
                     <tr>
                        <th>No.</th>
                        <th>Doctors Name</th>
                        <th>User Name</th>
                        <th>Action</th>
                     </tr>
                    <?php
                    $SNo=1;
                    while ($row = mysqli_fetch_assoc($records)): ?>
                       
                       <tr>
                           <td><?php echo $SNo; ?></td>
                           <td><?php echo $row['FirstName']; ?> <?php echo $row['SecondName'];?></td>
                           <td><?php echo $row['UserName']; ?></td>
                           <td>
                                <a href="adddoctor.php?edit=<?php echo $row['DocID']; ?>" class="btn btn-success">Edit</a>
                                <a href="adddoctor.php?delete=<?php echo $row['DocID']; ?>" class="btn btn-danger">Delete</a>
                           </td>
                       </tr>

                    <?php $SNo++; endwhile; ?>
                </table>
                <form action="" method="POST" >
                    
                    <div class="">
                        <label for="Hospital name">Register Doctor</label></br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        
                    </div>
                    <div class="">
                        <input type="text" placeholder="First Name" value="<?php echo $Fname;?>" name="firsrname" required>
                        <input type="text" placeholder="Second Name" value="<?php echo $Sname;?>" name="secondname" required></br>
                    </div>
                    <div class="">
                        <input type="text" placeholder="User Name" value="<?php echo $Uname;?>" name="username" required></br>
                    </div>
                    <div class="">
                        <input type="Password" placeholder="Enter Password" value="" name="psw" required></br>
                    </div>
                    <div class="">
                        <input type="Password" placeholder="Confirm Password" value="" name="cpsw" required></br>
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
