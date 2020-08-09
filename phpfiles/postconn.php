 <?php

	//save new added post
 if (isset($_POST['submit_post'])) {
 	$id=$_POST['Uid'];
 	$head_post=mysqli_real_escape_string($db,$_POST['H_eading']);
 	$head_text=mysqli_real_escape_string($db,$_POST['information']);
 	$file=$_FILES['file'];
 	$file_Name=$file['name'];
 	$file_TempName=$file['tmp_name'];
 	$file_error=$file['error'];
 	$file_size=$file['size'];


 		$fileExt=explode('.', $file_Name);
 		$fileActualExt=strtolower(end($fileExt));
 		$allowedExt=array('png', 'jpg', 'jpeg');

 	if (empty($head_text)) {
 		$_SESSION['empty_sms']="Heading Should be Filled";
 	}else{
 		 	if (in_array($fileActualExt, $allowedExt)) {
 		 	
 				if ($file_error==0) {
 					if ($file_size < 5000000) {
 						$NewFile=uniqid('',true).".".$fileActualExt;
 						$imageDestination='../uploaded_images/'.$NewFile;
 						move_uploaded_file($file_TempName, $imageDestination);

 						$post_sql= "INSERT INTO post (heading,images,text_info) VALUES ('$head_post','$NewFile','$head_text')";
				 		$post_result=mysqli_query($db,$post_sql);
				 		$_SESSION['empty_success']="Submitted";

 					}else{
 						echo "File should be less than 5mb";
 					}
 				}else{
 					echo "Uploading Error";
 				}

 		 	}else{
 		 		echo "Invalid file Format";
 		 	}
 		}
 	}

	//delete post
	if (isset($_GET['delete'])) {
	$delete_id=$_GET['delete'];
	$delete_sql="DELETE FROM post WHERE post_id='$delete_id';";
	$delete_rec=mysqli_query($db,$delete_sql);
	$_SESSION['hdelete'] = "Medical Center has been deleted from database";

	}
