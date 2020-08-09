<?php
include_once('../phpfiles/loginconn.php');
if (!isset($_SESSION['loged'])) {
    header('Location:login.php');
}
else{
    $_SESSION['loged'];
}
    $sql = "SELECT * FROM user";
    $records =mysqli_query($db, $sql);


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
  <link  rel=" stylesheet" type="text/css" href="../css/signup.css" />
</head>
<script type="text/javascript">
  function deleteuser(){
    if (confirm("Do You Real Want To Delete ?")) {
      return true;
    }else{
      return false;
    }
  }
</script>
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
      <!--/Sidebar-nav -->
    </div>
    <div class="col-xs-12 col-sm-9">
            <br>
      <div class="jumbotron col-xs-12" >
          <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>

          <table class="table">
              <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
              <?php
               $Sno=1;
              while ($row = mysqli_fetch_assoc($records)): ?>
                       
              <tr>
                  <td><?php echo $Sno; ?></td>
                  <td><?php echo $row['FirstName']; ?></td>
                  <td><?php echo $row['LastName']; ?></td>
                  <td><?php echo $row['Email']; ?></td>
                  <td>
                    <?php 
                    if (isset($_GET['delete'])){
                        $id=$_GET['delete'];
                        $sql="DELETE FROM user WHERE ID=$id";
                        $record=mysqli_query($db, $sql);
                        header("Location: users.php");
                        exit();
                      }
                        ?>
                    <a onclick="return deleteuser()" href="users.php?delete=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
                  </td>
                  <td><?php 
                        if ($row['status']==0) {
                          echo "Pending";
                        }else{
                          echo "Attended";
                        }
                      ?>
                  </td>
              </tr>
              <?php $Sno++; endwhile; ?>
          </table>
      </div> <!-- End Jumbotron-->
    </div> <!--/row-->
  </div>  <!--/Sidebar-->
</div><!--/Container Fluid-->
    <hr>
<footer>
        <p>© Online Medical Help 2019</p>
</footer>
</body>
</html>
