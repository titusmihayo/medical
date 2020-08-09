<?php
session_start();
session_unset();
unset($_SESSION['loged']);
session_destroy();

header("Location:login.php");
