 <?php

	//save new added doctortb
if(isset($_POST['save'])){
		$f_name=mysqli_real_escape_string($db,$_POST['firsrname']);
		$s_name=mysqli_real_escape_string($db,$_POST['secondname']);
		$u_name=mysqli_real_escape_string($db,$_POST['username']);
		$Psd=mysqli_real_escape_string($db,$_POST['psw']);
		$Cpsd=mysqli_real_escape_string($db,$_POST['cpsw']);

    $sql = "SELECT * FROM doctortb WHERE FirstName = '$f_name' AND UserName='u_name' ;";
    $register=mysqli_query($db,$sql);
    $register_fetch = mysqli_fetch_array($register);

    $dbFname = $register_fetch['FirstName'];
    $dbUname = $register_fetch['UserName'];

    if ($f_name==$dbFname && $u_name==$dbUname){
    	echo "<script>alert('The Doctor is Alread Registered');</script>";
    }else{
    	if ($Psd!=$Cpsd) {
    		echo "<script>alert('Password Do Not Match');</script>";
    	}else{
    		$Hash=password_hash($Psd,PASSWORD_DEFAULT);
    		$sql2="INSERT INTO doctortb (FirstName,SecondName,UserName,Password) VALUES ('$f_name','$s_name','$u_name','$Hash')";
	    $register2=mysqli_query($db,$sql2);
			echo "<script>alert('Successiful Registered');</script>";
			header('Location:adddoctor.php');
		exit();
    	}
      }
	}

	//delete medical center
if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	$sql="DELETE FROM doctortb WHERE DocID =$id;";
	$rec=mysqli_query($db,$sql);
	echo "<script>alert('Deleted');</script>";

}

	//submit ubdated doctortb
if (isset($_POST['update'])) {
	$id=mysqli_real_escape_string($db,$_POST['id']);
	$UpdFname=mysqli_real_escape_string($db, $_POST['firsrname']);
	$UpdSname=mysqli_real_escape_string($db, $_POST['secondname']);
	$UpdUname=mysqli_real_escape_string($db, $_POST['username']);
	$UpdPass=mysqli_real_escape_string($db, $_POST['psw']);
	$UpdCpass=mysqli_real_escape_string($db, $_POST['cpsw']);

	
	if ($UpdPass!=$UpdCpass) {
    		echo "<script>alert('Password Do Not Match');</script>";
    	}else{
    		$UpHash=password_hash($UpdPass,PASSWORD_DEFAULT);
    		$hupdate="UPDATE doctortb SET FirstName='$UpdFname',SecondName='$UpdSname' ,UserName='$UpdUname',Password='$UpHash' WHERE DocID =$id;";
			$sub = mysqli_query($db, $hupdate);
			echo "<script>alert('Updated');</script>";;
			header("Location:adddoctor.php");
			exit();
		}
}