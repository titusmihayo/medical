<?php 
include_once('phpfiles/user-loginconn.php');

    $sql_posted="SELECT * FROM post";
    $sql_result=mysqli_query($db,$sql_posted);
    

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
  <link  rel=" stylesheet" type="text/css" href="css/layout.css" />
    <style type="text/css">
        table{
            width: 100%;
            font-family: Arial;
            background-color: #f1f1f1;

        }
        tr td h2{
            background-color: #fafafa;
            padding: 5px;
            border-radius: 2px;
        }
        tr td img{
            width: 400px;
            border:2px solid #000;
            border-radius: 10px;
            padding: 2px;
            float: left;
            margin-right: 10px;
            margin-bottom: 5px;

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
            <a class="active navbar-brand" href="index.php">Medical Help</a>
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
            <!--/.well -->
        </div>
        <!--/span-->

        <div class="col-xs-12 col-sm-9">
            <br>
            <div class="jumbotron">
                <table >
                    <?php while ($row_posted=mysqli_fetch_assoc($sql_result)): ?>
                    <tr>
                        <td>
                            <h2><b><?php echo $row_posted['heading']; ?></b></h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><img src="uploaded_images/<?php echo $row_posted['images']; ?>"></p>
                          <p><?php echo $row_posted['text_info']; ?></p>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                    </tr>
                <?php endwhile; ?>
                
                </table>
            </div>

            <!--/row-->
        </div>  <!--/span-->


    </div>
    <!--/row-->

    <hr>

    

</div>
<footer>
         <p>© Online Medical Help 2019</p>
    </footer>
<!--/.container-->

</body>
</html>
