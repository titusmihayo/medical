<?php

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'medicaldb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   session_start();
   
   if (isset($_POST['login'])) {
      $myusername = mysqli_real_escape_string($db,$_POST['admin_username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['admin_password']); 
      
      $sql_login = "SELECT * FROM admintable WHERE user_name='$myusername'";
      $result_login = mysqli_query($db,$sql_login);
      $row_login = mysqli_fetch_array($result_login);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
         if ($myusername != $row_login['user_name']) {
            $_SESSION['login_user']= "Username Not Registered";
         }else{
            if (password_verify($mypassword,$row_login['Password'])) {
               $_SESSION['loged']= $myusername;
               header("location: Admin.php");
            }else{
               $_SESSION['login_invalid']= "Invalid Password";
            }
         }
   }
   