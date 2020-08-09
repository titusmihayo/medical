<?php
include_once('../phpfiles/loginconn.php');
if (!isset($_SESSION['loged'])) {
    header('Location:login.php');
}
else{
    $_SESSION['loged'];
}
    
    include_once('../phpfiles/manageconn.php');
    
    //For previewing admins 
    $sql = "SELECT * FROM admintable";
    $records =mysqli_query($db, $sql);

    $Adname = '';
    $Ademail = '';
    $Adpassword ='';
    $Aid= 0;
    $edit_data=false;

    if (isset($_GET['edit'])) {
      $Aid = $_GET['edit'];
      $edit_data=true;
      $Adresults = mysqli_query($db, "SELECT * FROM admintable WHERE A_ID = $Aid");
      $Adrow = mysqli_fetch_array($Adresults);
      $Adname = $Adrow['user_name'];
      $Ademail = $Adrow['admin_email'];
      //$Adpassword = $Adrow['Password'];
        
    }
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
  <link  rel=" stylesheet" type="text/css" href="../css/layout.css" />
  <link rel="stylesheet" type="text/css" href="../css/manage.css" />
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


              <!--Admin Name from Database displayed on the navbar --> 
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
            <!--/sidebar nav -->
        </div>
        <!--/siebsr offcanvas-->

        <div class="col-xs-12 col-sm-9" style="margin-top: 0px;">
            <br>
            <div class="jumbotron">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                <div class="text text-danger text-center" style="font-size: 20px; font-family: arial; font-weight: bold;">
                  <?php
                  if (isset($_SESSION['term_admin'])) {
                      echo $_SESSION['term_admin'];
                      unset($_SESSION['term_admin']);
                  }
                  ?>
                </div>
                <table class="table">
                  <tr class="icons" align="center">
                    <td>
                      <div class="text-manage" >Registered Users</div>
                      <img src="../image/person_icon2.png" data-toggle="collapse" data-target="#demo" alt="Photo">
                          <div id="demo" class="collapse">
                          <?php echo $_SESSION['user_count']?> Users<br>
                          <a href="users.php">View</a>
                          </div>
                    </td>
                    <td>
                      <div class="text-manage">Registered Pharmacies</div>
                      <img src="../image/pharmacy_icon.png" data-toggle="collapse" data-target="#demo1" alt="Photo">
                          <div id="demo1" class="collapse">
                          <?php echo $_SESSION['pharmacies_count']?> Pharmacies<br>
                          <a href="addpharmacy.php">View</a>
                          </div>
                    </td>
                    <td>
                      <div class="text-manage" >Registered Medical Centers</div>
                      <img src="../image/medicalcenter_icon.png" data-toggle="collapse" data-target="#demo2" alt="Photo">
                          <div id="demo2" class="collapse">
                          <?php echo $_SESSION['count_hospitals']?> Hospital<br>
                          <a href="addhospital.php">View</a>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" >
                      <div class="text-manage" >Manage admin</div>
                      <img src="../image/Admin.png" data-toggle="collapse" data-target="#myForm" />
                    </td>
                  </tr>
                </table>
                  <div class="collapse " id="myForm">
                    <form action="" class="form-container" method="POST">
                     <h3>Registers Admin</h3>
                     <table class="table" style="background-color: #ccffff; border-radius: 4px;">
                       <tr>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Action</th>
                       </tr>
                       <tr>
                        <?php while ($row=mysqli_fetch_assoc($records)) :?>
                         <td><?php echo $row['user_name'];?></td>
                         <td><?php echo $row['admin_email'];?></td>
                         <td>
                           <a href="manage.php?delete=<?php echo $row['A_ID'];?>" class="text text-danger" >Delete</a>
                           <a href="manage.php?edit=<?php echo $row['A_ID']?>" class="text text-primary" >Edit</a>
                        </td>
                       </tr>
                     <?php endwhile; ?>
                     </table class="table1">
                     <tr>
                        <td><b>User Name</b></td>
                        <input type="hidden" name="id" value="<?php echo $Aid; ?>" >
                        <td><input type="text" class="form-control" placeholder="Admin Name" name="Admin_name" value="<?php echo $Adname; ?>" required></td>
                     </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $Ademail; ?>" required></td>
                      </tr>
                      <tr>
                        <td><b>Password</b></td>
                        <td><input type="password" class="form-control" placeholder="Enter Password" name="psw" required></td>
                      </tr>
                      <tr>
                        <td><input type="password" class="form-control" placeholder="Confirm Password" name="Cpsw" required></td>
                      </tr>
                      <tr>
                        <td>
                          <?php
                            if ($edit_data==true): ?>
                                <button type="submit" class="btn btn-primary" name="update_data">Update</button>
                              <?php else:?>
                                <button type="submit" class="btn" name="save-admin">Save</button>
                              <?php endif; ?>
                                <button type="reset" class="btn" name="reset">Clear</button>
                        </td>
                      </tr>
                      
                    </form>
                  </div>
            </div> <!--end jumbotron-->
          </div>
        </div>  <!--/span-->
    </div>
    <!--/row-->
    <hr>
</div>
<!--/.container-->
<footer>
        <p>© Online Medical Help 2019</p>
</footer>
</body>
</html>
