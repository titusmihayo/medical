 <?php

	//save new added medicalcenter
if(isset($_POST['save'])){
    $centername=mysqli_real_escape_string($db,$_POST['addcenter']);
    $centerLoc=mysqli_real_escape_string($db,$_POST['addLocation']);
    $centerNum=mysqli_real_escape_string($db,$_POST['addCont']);

    $sql = "SELECT * FROM medicalcenter WHERE CenterName = '$centername';";
    $register=mysqli_query($db,$sql);
    $register_fetch = mysqli_fetch_array($register);

    $Med_name = $register_fetch['CenterName'];
    if ($centername==$Med_name){
    	echo "<script>alert('The medical Center is Alread Registered');</script>";
    }else{
    	if (!preg_match("/^[+0-9]*$/", $centerNum)) {
    		echo "<script>alert('Phone Number Has Invalid Characters');</script>";
    	}else{
    		$sql2="INSERT INTO medicalcenter (CenterName,Location,Contact) VALUES ('$centername','$centerLoc','$centerNum')";
	    $register2=mysqli_query($db,$sql2);
		$_SESSION['save'] = $centername . " has been added to database";
		header('Location:addhospital.php');
		exit();
    	}
    	
    }

	}
	//delete medical center
if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	$sql="DELETE FROM medicalcenter WHERE CenterID =$id;";
	$rec=mysqli_query($db,$sql);
	$_SESSION['hdelete'] = "Medical Center has been deleted from database";

}

	//submit ubdated medicalcenter
if (isset($_POST['update'])) {
	$id=mysqli_real_escape_string($db,$_POST['id']);
	$hsname=mysqli_real_escape_string($db, $_POST['addcenter']);
	$hsLocation=mysqli_real_escape_string($db, $_POST['addLocation']);
	$hsPNumber=mysqli_real_escape_string($db, $_POST['addCont']);

	$hupdate="UPDATE medicalcenter SET CenterName = '$hsname',Location='$hsLocation', Contact='$hsPNumber' WHERE CenterID =$id;";
	$sub = mysqli_query($db, $hupdate);
	$_SESSION['updated'] = "Updated Successiful";
	header("Location:addhospital.php");
}

if (isset($_SESSION['ad_loged']) > 0) {
	header("Location:addhospital.php");
}