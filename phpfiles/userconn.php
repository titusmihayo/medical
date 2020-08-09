<!--  <?php

if (isset($_POST['update-user'])){
      $id=$_POST['id'];
      $F_name = mysqli_real_escape_string($db, $_POST['fname']);
      $L_name = mysqli_real_escape_string($db, $_POST['lname']);
      $U_Age = mysqli_real_escape_string($db, $_POST['u_age']);
      $U_Add = mysqli_real_escape_string($db, $_POST['u_address']);
      $E_mail = mysqli_real_escape_string($db, $_POST['email']);
      $U_Phn = mysqli_real_escape_string($db, $_POST['u_phone']);
      $U_DES = mysqli_real_escape_string($db, $_POST['u_desc']);

      $sql1="SELECT * FROM user WHERE Email='$E_mail' ";
      $sql1Res=mysqli_query($db,$sql1);
      $db_Row=mysqli_fetch_array($sql1Res);

      $db_E_mail=$db_Row['Email'];

      mysqli_query($db,"UPDATE user SET FirstName='$F_name', LastName ='$L_name' , Age='$U_Age' Address='$U_Add', Email='$E_mail' Phonenumber='$U_Phn' Description='U_DES' WHERE Email='$db_E_mail';");
      
      echo "Submited";
   }










 -->