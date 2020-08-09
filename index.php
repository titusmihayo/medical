<?php 
include_once('phpfiles/user-loginconn.php');
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
           
        </div>
        <!--/span-->

        <div class="col-xs-12 col-sm-9">
            <br>
            <div class="jumbotron">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                <h2>Noncommunicable diseases (NCDs)</h2>
                <p>According to The International Federation of Medical Students’ Associations (IFMSA)Noncommunicable diseases (NCDs) represent the largest and even growing proportion of the global burden of disease. In addition to their mortality burden, NCDs have major economic consequences worldwide. Premature deaths from NCDs are largely preventable, and many are mainly driven by four big risk factors: physical inactivity, unhealthy diets, tobacco use, and the   harmful use of alcohol. These risk factors are interrelated, and rooted in social, political, economic, cultural, environmental and commercial factors that are  often outside of an   individuals’ control. Underfunding, lack of social mobilization, and conflicts of interest with the private sector make NCDs a challenging public health space, but also creates an interesting opportunity for coordinated and multi-sector   al actio
                </p>
            </div>
            
        </div>  <!--/span-->


    </div>
    <!--/row-->

    <hr>

    

</div>
<!--/.container-->
<footer style="text-align: center;">
        <p>© Online Medical Help 2019</p>
</footer>
</body>
</html>
