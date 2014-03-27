<?php 
include'../login/authentication.php';
include('../login/db_config.php');
$category= mysql_real_escape_string($_POST['major_minor']);
$cause= mysql_real_escape_string($_POST['root_cause']);
$corection=mysql_real_escape_string($_POST['corective_measures']);
$prevention=mysql_real_escape_string($_POST['preventive_action']);
$investigator=mysql_real_escape_string($_POST['investigated_by']);
$close_out1=mysql_real_escape_string($_POST['close_out']);
$proposed_closeout_date=mysql_real_escape_string($_POST['proposed_closeout_date']);
$date =mysql_real_escape_string (date("d-m-y"));

$selected=mysql_real_escape_string($_POST['CM_Search_index']);


mysql_query("UPDATE $table1 
      SET category = '$category',root_cause='$cause',corrective_action='$corection',preventive_action='$prevention',
      investigated_by='$investigator',close_out='$close_out1',proposed_closeout_date='$proposed_closeout_date',
	  scm_incharge='$name',close_out_date='$date'
    WHERE report_no='$selected'")or die("imekataa".mysql_error());
	header('location:manager.report_summerynew.php');
		

?>