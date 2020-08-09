 <?php


 	  define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'medicaldb');

   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	session_start();
    if(isset($_POST['signupbutton'])){

    $firstname =mysqli_real_escape_string( $db,$_POST['fname']);
    $lastname = mysqli_real_escape_string( $db,$_POST['lname']);
    $email = mysqli_real_escape_string( $db,$_POST['email']);
    $Psd = mysqli_real_escape_string( $db,$_POST['psw']);
    $CPsd = mysqli_real_escape_string( $db,$_POST['Cpsw']);

    if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname)) {
    	echo "Check Your Characters";
    	}else{
          $UserResult=mysqli_query($db,"SELECT * FROM user;");
          $useRow=mysqli_fetch_array($UserResult);
          $Use_FName=$useRow['FirstName'];
          $Use_LName=$useRow['LastName'];

          if ($firstname !=$Use_FName && $lastname!=$Use_LName ) {
              if ($Psd!=$CPsd) {
              echo "<script>alert('Password do not match');</script>";
            }else{
              $hashpsq=password_hash($Psd,PASSWORD_DEFAULT);
              $sql="INSERT INTO user (FirstName, LastName, Email, Password) VALUES ('$firstname', '$lastname', '$email','$hashpsq');";
                mysqli_query($db, $sql);
                echo "<script>alert('Registered successifully, You can Now Login');
                  window.location='login.php';
                </script>";
               
              }

            /*}*/
          }else{
            echo "<script>alert('Another User May Be Using The Phone Number You Entered');</script>";
          }
        /*}*/
	    }
    }
    	
        