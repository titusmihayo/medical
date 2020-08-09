<?php
include_once('../phpfiles/loginconn.php');
if (!isset($_SESSION['loged'])) {
    header('Location:login.php');
}
else{
    $_SESSION['loged'];
}
    include_once('../phpfiles/pharmaconn.php');
    $sql = "SELECT * FROM pharmacies";
    $records =mysqli_query($db, $sql);

    $editdata=false;

//edit button picks data from database into input fields
if (isset($_GET['edit'])) {
      $id = $_GET['edit'];
      $editdata=true;
      $results = mysqli_query($db, "SELECT * FROM pharmacies where P_ID = $id;");
      $row = mysqli_fetch_array($results);
      $pname = $row['PharmacyName'];
      $plocation = $row['Location'];
      $pcontact = $row['Contacts'];
        
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
  <link  rel=" stylesheet" type="text/css" href="../css/addpharmacy.css" />
  <script type="text/javascript">
    function deletedata(){
      if (confirm("Are you sure you want to delete ?")){
        return true;
      }else{
      return false;
      }
    }
  </script>
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
            <!--Shows who has Loged In -->
               <li class="glyphicon glyphicon-user" style="margin-top: 8px; font-size: 20px; color: #006633; cursor: pointer; background-color: #ccc; padding: 9px; border-radius: 20px; padding-top: 3px; ">
                    <?php if (isset($_SESSION['loged'])) {
                        echo $_SESSION['loged'];
                      } ?>
               </li>
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        <!-- end of nav-collapse -->
    </div>
    <!-- end of container-fluid -->
</div>
<!-- end of navbar -->

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            
        <!-- Sidebar -->
            <?php
                require '../menu/adminsidebar.php';
            ?>
            
      </div><!-- end of sidebar-offcanvas -->

      <div class="col-xs-12 col-sm-9">
          <br>
              <?php 
                if (isset($_SESSION['pdelete'])): ?>
                  <div class="pdeletebutton" >
                      <?php
                      echo $_SESSION['pdelete'];
                      unset($_SESSION['pdelete']);
                      ?>
                  </div>
              <?php endif; ?>
          <div class="jumbotron">
            <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                
              <table class="table">
                    <tr>
                      <th>No.</th>
                      <th>Pharmacy Name</th>
                      <th>Location</th>
                      <th>Contacts</th>
                      <th>Action</th>
                    </tr>
                     <!--Fetch data from pharmacy tabe in database -->
                    <?php
                    $b=1;
                      while ($row =mysqli_fetch_assoc($records)): ?>
                    <tr>
                        <td><?php echo $b; ?></td>
                        <td><?php echo $row['PharmacyName']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['Contacts']; ?></td>
                        <td>
                          <a href="addpharmacy.php?edit=<?php echo $row['P_ID']; ?>" class="btn btn-info">Edit</a>
                         
                          <a onclick="return deletedata()" href="addpharmacy.php?delete=<?php echo $row['P_ID']; ?>" class="btn btn-danger"> Delete</a>
                          </td>
                    </tr>
                    <?php 
                    $b++;
                    endwhile; ?>
              </table>
              <form action="" method="POST">
                <div class="container">
                     <h2>Add Pharmacy</h2>
                        <!-- Display message after pharmacy is added to the database-->
                        <?php 
                          if (isset($_SESSION['save'])): ?>
                            <div class="psavebutton" >
                                <?php
                                echo $_SESSION['save'];
                                unset($_SESSION['save']);
                                ?>
                            </div>
                          <?php endif; ?>

                            <!---->
                          <?php if (isset($_SESSION['uptodate'])): ?>
                            <div class="psavebutton">
                              <?php
                                  echo $_SESSION['uptodate'];
                                  unset($_SESSION['uptodate']);
                              ?>
                            </div>
                          <?php endif ?>
                          <!--Table-->

                    <table class="table">
                      <tr style="color: red;">
                        <b>
                          <?php if (isset($_SESSION['registered'])){
                             echo $_SESSION['registered'];
                             unset($_SESSION['registered']);
                              }
                          ?>
                         </b>
                      </tr>
                      <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <tr>
                          <td><label ><b>Pharmacy Name</b></label></td>
                          <td><input type="text" class="form-control" placeholder="Enter Pharmacy Name" name="pharmacyname" value="<?php echo $pname; ?>" required></td>
                        </tr>
                        <tr>
                          <td><label><b>Location</b></label></td>
                          <td><input type="text" class="form-control" placeholder="Pharmacy Location" name="location" value="<?php echo $plocation; ?>" required></td>
                        </tr>
                        <tr>
                          <td><label><b>Contacts</b></label></td>
                          <td><input type="text" class="form-control" minlength="13" maxlength="13" placeholder="+255xxxxxxxxx" name="contacts" value="<?php echo $pcontact; ?>" ></td>
                        </tr>
                    </table><!--end table-->
                        <!--save and update buttons-->
                        <?php if ($editdata == true): ?>
                        <button type="submit" class="signupbtn btn-info col-xs-4 col-sm-4" name="update" >Update</button>
                        <?php else: ?>
                        <button type="submit" class="signupbtn col-xs-4 col-sm-4 " name="save">Save</button>
                        <?php endif; ?>
                </div><!--end container-->
              </form> <!--form end-->

          </div> <!--end jumbotron-->
            
          </div><!--end jumbotron body-->

        </div>  <!--  end-->
    </div><!--container-fluid end-->
    <hr>
<footer>
        <p>© Online Medical Help 2019</p>
</footer>

</body>
</html>
