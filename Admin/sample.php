<?php
	include_once('connect.php');
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
</head>
<form method="POST" action="sample.php" enctype="multipart/form-data">
	<input type="file" name="file"><br>
	<button type="submit" name="submit" >UPLOAD</button>
</form>

<body>

</body>
</html>