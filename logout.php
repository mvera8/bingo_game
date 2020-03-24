<?php 
session_start(); /* Starts the session */
session_destroy(); /* Destroy started session */
header("location:admin.php");  /* Redirect to login page */
exit;
?>