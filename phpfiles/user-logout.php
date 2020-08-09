<?php
session_start();
session_unset();
unset($_SESSION['user-in']);
session_destroy();

header("Location:../login.php");
