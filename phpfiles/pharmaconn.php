<?php 

    $pname ='';
    $plocation ='';
    $pcontact ='';
    $id = 0;

    /* if delete button is pressed on addpharmacy*/
    if (isset($_GET['delete'])){
       $id=$_GET['delete'];
       $sql="DELETE FROM pharmacies WHERE P_ID=$id";
       $record=mysqli_query($db, $sql);
       $_SESSION['pdelete'] = "Record has been deleted from database";
       header("Location: addpharmacy.php");
       exit();
     }
      /* if save button is pressed on addpharmacy*/
    if (isset($_POST['save'])) {
     $pharmacyname= mysqli_real_escape_string($db,$_POST['pharmacyname']);
     $locations = mysqli_real_escape_string($db,$_POST['location']);
     $contacts= mysqli_real_escape_string($db,$_POST['contacts']);
    
     if (!preg_match("/^[+0-9]*$/", $contacts)) {
       echo "<script>alert('Invalid Phone Number Number')</script>";
       }else{
        
          $rec="SELECT * FROM pharmacies WHERE PharmacyName = '$pharmacyname';";
          $result = mysqli_query($db, $rec);
          $fetchdata = mysqli_fetch_array($result);

          $phname = $fetchdata['PharmacyName'];
          $phlocation = $fetchdata['Location'];
          $phcontacts = $fetchdata['Contacts'];
          if ($pharmacyname == $phname || $locations == $phlocation && $contacts == $phcontacts) {
            /*$_SESSION['registered']="ALREADY REGISTERED";*/
            echo "<script> alert('Pharmacy is is already Registered');</script>";
          }else{
            $sql="INSERT INTO pharmacies (PharmacyName, Location, Contacts) VALUES ('$pharmacyname','$locations','$contacts');";
            $results=mysqli_query($db, $sql);
            $_SESSION['save'] = $pharmacyname . " has been added to the database";
          }
       }
   	}

   // update button
    if (isset($_POST['update'])){
      $id=$_POST['id'];
      $username = mysqli_real_escape_string($db, $_POST['pharmacyname']);
      $userlocation = mysqli_real_escape_string($db, $_POST['location']);
      $usercontact = mysqli_real_escape_string($db, $_POST['contacts']);
      mysqli_query($db,"UPDATE pharmacies SET PharmacyName='$username', Location ='$userlocation' , Contacts='$usercontact' WHERE P_ID=$id;");
      $_SESSION['uptodate'] = "Record Updated successfully";
      header("Location:addpharmacy.php");
   }