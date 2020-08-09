<?php

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'medicaldb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   session_start();
   
   if (isset($_POST['login'])) {
      $doc_username = mysqli_real_escape_string($db,$_POST['username']);
      $doc_psd = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql_login = "SELECT * FROM doctortb WHERE UserName='$doc_username'";
      $result_login = mysqli_query($db,$sql_login);
      $row_login = mysqli_fetch_array($result_login);
      
      // matching $myusername and $mypassword
         if ($doc_username != $row_login['UserName']) {
           echo "<script>alert('Invalid User Name');</script>";
         }else{
            if (!password_verify($doc_psd,$row_login['Password'])) {
               $_SESSION['Doc_loged']= $row_login['FirstName'];
               echo "<h2><script>alert('Welcome Doctor');
                  window.location='../Doctor/doctor_index.php';
               </script></h2>";

            }else{
               echo "<script>alert('Wrong Password');</script>";
            }
         }
   }
   