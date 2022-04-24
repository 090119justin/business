<?php  
session_start();

session_unset();
session_destroy();
$_SESSION['logedIn'] = 'no';

header("Location: ../index.php");