<?php

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'medicaldb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   session_start();
   
   if (isset($_POST['login-btn'])) {
     $U_mail=mysqli_real_escape_string($db,$_POST['user-email']);
     $U_psw=mysqli_real_escape_string($db,$_POST['user-psw']);
     
     $sql="SELECT * FROM user WHERE Email='$U_mail'";
     $sqlResult=mysqli_query($db,$sql);
     $sqlRec=mysqli_fetch_assoc($sqlResult);

     if ($U_mail!=$sqlRec['Email']) {
          echo "<script> alert ('You are Not Registered ! , Register To The Next Page');
                window.location = 'signup.php';
          </script>";
     }else{
        if ($U_psw==password_verify($U_psw,$sqlRec['Password'])) {
            $_SESSION['user-in']=$U_mail;
            header('Location:userinfo.php');
        }else{
          echo "<script>alert('Wrong Password')</script>";
        }
     }
   }