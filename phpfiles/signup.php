<?php
	
	if (isset($_POST['submit'])){

		include_once 'connect.php';

		$fname = mysql_real_escape_string($conn, $_POST['fname']);
		$lname = mysql_real_escape_string($conn, $_POST['lname']);
		$uid = mysql_real_escape_string($conn, $_POST['uid']);
		$email = mysql_real_escape_string($conn, $_POST['email']);
		$psw = mysql_real_escape_string($conn, $_POST['psw']);
		
		//check for empty fields
		if (empty($fname) || empty($lname) || empty($email) || empty($psw) ||  empty($uid)) {
			header("Location: ../signup.php?signup=empty");
			exit();
		//check if inputes are valid
		}else{
			//check if inputes are valid
				if(!preg_match("/^[a-zA-Z]*$/",fname) || !preg_match("/^[a-zA-Z]*$/",lname)){
					header("Location: ../signup.php?signup=invalid");
					exit();
				}else{
					//check if email is valid
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: ../signup.php?signup=email");
						exit();
					}else{
						$sql = "SELECT * FROM user WHERE User_id='$uid'";
						$results = mysqli_query($conn, $sql);
						$resultCheck = msqli_num_row($results);

						if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=usertaken");
							exit();
						}else{
							//hashing the password
							$hash = password_hash($psw, PASSWORD_DEFAULT);
							//Insert the user into database
							$sql ="INSERT INTO user(FistName, LastName, User_id, Password) VALUES ('$fname', '$lname', '$uid', '$email', '$hash',);";
							mysqli_query($conn,$sql);
							header("Location: ../signup.php?signup=success");
							exit();
							}
						}
					}

		}
	}else{
			header("Location: ../signup.php");
			exit();
		}
?>