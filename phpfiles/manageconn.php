 <?php
 
 	// Number of Users Registered
	$sql="SELECT * FROM user";
	$record=mysqli_query($db,$sql);
	$ucount=mysqli_num_rows($record);
	$_SESSION['user_count']=$ucount;


	// Number of Pharmacies Registered
	$psql="SELECT * FROM pharmacies";
	$precord=mysqli_query($db,$psql);
	$pcount=mysqli_num_rows($precord);
	$_SESSION['pharmacies_count']=$pcount;

	// Number of Medical Center Registered
	$msql="SELECT * FROM medicalcenter";
	$mrecord=mysqli_query($db,$msql);
	$mcount=mysqli_num_rows($mrecord);
	$_SESSION['count_hospitals']=$mcount;

	$update=false;

	if (isset($_POST['save-admin'])) {
		$name=mysqli_real_escape_string($db, $_POST['Admin_name']);
		$Email=mysqli_real_escape_string($db, $_POST['email']);
		$Password_Ad=mysqli_real_escape_string($db, $_POST['psw']);
		$CPassword_Ad=mysqli_real_escape_string($db, $_POST['Cpsw']);

		
		$sql_adm="SELECT * FROM admintable";
		$record_Ad=mysqli_query($db, $sql_adm);
		$row_Ad=mysqli_fetch_array($record_Ad);

		if ($Email==$row_Ad['admin_email']){
			echo "<script>alert('Email Already Registered, Choose another Email');</script>";

		}else{
			if ($Password_Ad != $CPassword_Ad) {
			echo "<script>alert('Password do not Match');</script>";
			}else{
				$hashpass=password_hash($Password_Ad,PASSWORD_DEFAULT);
				$sql_insert="INSERT INTO admintable (user_name,admin_email,Password) VALUES ('$name','$Email','$hashpass');";
				$results_instert=mysqli_query($db,$sql_insert);
				echo "Inserted";
				header('Location:manage.php');
			}
			
		}

	}
	if (isset($_POST['update_data'])){
		$update=true;
		$id=mysqli_real_escape_string($db, $_POST['id']);
      	$name_admin = mysqli_real_escape_string($db, $_POST['Admin_name']);
      	$Email_admin = mysqli_real_escape_string($db, $_POST['email']);
      	$pass_admin = mysqli_real_escape_string($db, $_POST['psw']);
      	$Cpass_admin = mysqli_real_escape_string($db, $_POST['psw']);

      	$passhash=password_hash($pass_admin,PASSWORD_DEFAULT);
      		mysqli_query($db,"UPDATE admintable SET user_name='$name_admin', admin_email ='$Email_admin' , Password='$passhash' WHERE A_ID=$id;");
			   	echo "Record Updated successfully";
   }

   if (isset($_GET['delete'])){
   		$id=$_GET['delete'];
   		$sql_delete="DELETE FROM admintable WHERE A_ID=$id";
   		mysqli_query($db, $sql_delete);
   		$_SESSION['term_admin'] = "Admin deleted";
   }