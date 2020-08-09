<?php
include('../phpfiles/config.php');
session_start();
if (!isset($_SESSION['Doc_loged'])) {
    echo "<script>alert('Login First');window.location='doctorlogin.php'</script>";
    }else{
      $_SESSION['Doc_loged'];
    }


 $key=$_GET['key'];
$Sql="SELECT * FROM user WHERE Email='$key'";
$ResultSql=mysqli_query($db,$Sql);
$RecordSql=mysqli_fetch_array($ResultSql);
if ($RecordSql['status']=='1') {
  echo "<script>alert('Patient is Alread Serverd');window.location='doctor_index.php'</script>";
}else{
  if (isset($_POST['send'])) {
    $DocComment=mysqli_real_escape_string($db,$_POST['com']);
      $SqlIns="UPDATE user SET Doctor_Comment='$DocComment',status='1' WHERE Email='$key'";
    $InsQuery=mysqli_query($db,$SqlIns);
     header('Location:doctor_index.php');
   
}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor | Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body{
  background-color: #ccffcc;
}
table{
  border:1px solid 000099;
  width: 500px;
  margin-top:180px;
  border-radius: 5px;
  background-color: rgba(255,204,102,.2);
  box-shadow: 0 5px 15px rgba(0,0,0,.5);
}
table tr td{
  padding:15px;
  font-size: 16px;
}
button{
  float: right;
  width: 100px;
}
  </style>
</head>
<body>
<form method="POST" action="" >
	<table align="center">
		<tr>
			<td><textarea type="text" class="form-control" name="com" placeholder="Comment here" required ></textarea></td>
		</tr>
		<tr>
			<td><button type="submit" class="btn" name="send" value="send">Send</button> </td>
		</tr>
	</table>
	
	
</form>
</body>
</html>