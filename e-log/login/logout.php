<?php
//Start session 
session_start();
 
//Unset the variable SESS_MEMBER_ID stored in session 
// unset($_SESSION['SESS_MEMBER_ID']);
session_destroy();
header('location:../index.php');
?>