<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['name']) || (trim($_SESSION['name']) == '' and $_SESSION['email']) || (trim($_SESSION['email']) == '' ))
 {
	header('location:../index.php');
	exit();	
  }
						$user_id=$_SESSION['id'];
						$name=$_SESSION['name'];
						$email=$_SESSION['email'];
						$Center=$_SESSION['center'];
                        $rank=$_SESSION['rank'];
						$department=$_SESSION['department'];
?>