<?php
if (isset($_POST['submit-forget'])) {
      // $Adid=$_POST['uid'];
      $Adm_uname=mysqli_real_escape_string($db,$_POST['uname']);
      $Adm_email=mysqli_real_escape_string($db,$_POST['C_email']);
      $Adm_pass=mysqli_real_escape_string($db,$_POST['new_psd']);
      $Adm_Cpass=mysqli_real_escape_string($db,$_POST['Cnew_psd']);

      $sql_rew="SELECT * FROM admintable WHERE admin_email='$Adm_email'";
      $record_rew=mysqli_query($db, $sql_rew);
      $row_res=mysqli_fetch_array($record_rew);

      $db_id=$row_res['A_ID'];
      $db_user=$row_res['user_name'];
      $db_email=$row_res['admin_email'];

      if ($Adm_uname!=$db_user) {
        echo "<script> alert('User name not registered !')</script>";
      }else{
        if ($db_email!=$Adm_email) {
          echo "<script> alert('wrong email Address')</script>";
        }else{

          if ($Adm_pass!=$Adm_Cpass) {
              echo "<script>alert('Password Do not Match')</script>";
          }else{
            $hash_Pass=password_hash($Adm_pass,PASSWORD_DEFAULT);
            $Squery=mysqli_query($db,"UPDATE admintable SET Password='$hash_Pass' WHERE A_ID='$db_id'");
            if ($Squery) {
              echo "<script>alert('Updated successfully');</script>";    
              header('Location:../Admin/login.php');
            }
          }
        }
      }
    }