<?php

  session_start();
  session_unset();
  unset($_SESSION['Doc_loged']);
  session_destroy();
  header('Location:../doctorlogin.php');