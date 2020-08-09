<?php
include_once('../phpfiles/loginconn.php');
if (!isset($_SESSION['loged'])) {
    header('Location:login.php');
}
else{
    $_SESSION['loged'];
}
   include_once('../phpfiles/postconn.php');
   $sqlPost="SELECT * FROM post";
   $sqlresult=mysqli_query($db,$sqlPost);

    $postedit=false;
    $fetch_heading='';
    $fetch_post='';

if (isset($_GET['edit'])) {
    $Eid=$_GET['edit'];
    $postedit=true;
    $edit_sqli=mysqli_query($db,"SELECT * FROM post WHERE post_id= $Eid;");
    $edit_fetch=mysqli_fetch_array($edit_sqli);
    $fetch_heading=$edit_fetch['heading'];
    $fetch_image=$edit_fetch['images'];
    $fetch_post=$edit_fetch['text_info'];


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
  <link  rel=" stylesheet" type="text/css" href="../css/postcss.css" />
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
                <form class="form" method="POST" action="" enctype="multipart/form-data">
                    <table class="post_table form-group" >

                    <tr bgcolor="#f1f1f1">
                      <th>Heading</th>
                      <th>Post</th>
                      <th>Action</th>
                    </tr>
                      <?php while ($row=mysqli_fetch_assoc($sqlresult)): ?>
                    <tr>
                        <td><b><?php echo $row['heading']; ?></b></td>
                        <td>
                          <img src="../uploaded_images/<?php echo $row['images']; ?>">
                          <?php echo $row['text_info']; ?>
                        </td>

                        <td class="col-xs-3 col-sm-3">
                          <a href="postinfo.php?delete=<?php echo $row['post_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                
                    <tr>
                      <td colspan="2">
                        <?php 
                    if (isset($_SESSION['empty_sms'])): ?>
                      <div class="text text-danger" >
                          <?php
                          echo $_SESSION['empty_sms'];
                          unset($_SESSION['empty_sms']);
                          ?>
                      </div>
                   <?php endif; ?>
                      </td>
                    </tr>   

                     <tr>
                        <input type="hidden" name="Uid" value="<?echo $Eid?>">
                        <th>Heading</th>
                        
                        <td colspan="3"><input type="text" class="form-control" placeholder="Heading" name="H_eading" value="<?php echo $fetch_heading ?>" />
                        </td>
                     </tr>
                     <tr>
                        <th>Upload image</th>
                        <td colspan="3">
                          <p>The image should be in (png,jpg or jpeg' formats</p>
                          <input type="file" name="file" value="<?php echo $fetch_image ?>">
                        </td>
                     </tr>
                     <tr>
                        <th>Info</th>
                        <td colspan="3">
                          <textarea type="comment" class="form-control" rows="10" placeholder="Description" name="information" value="<?php echo $fetch_post ?>"></textarea>
                        </td>
                     </tr>
                     <td></td>
                     <tr>
                      
                          <td><button type="submit" class="btn btn-primary" name="submit_post">Submit</button></td>
                     
                     </tr>
                </table>
                </form>
            </div>
            </div>
        </div> 
    </div>
    <hr>

<footer>
        <p>© Online Medical Help 2019</p>
</footer>
</body>
</html>
