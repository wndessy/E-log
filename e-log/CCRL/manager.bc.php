<?php
include('../login/authentication.php');
include('../login/db_config.php');

$category= mysql_real_escape_string($_POST['major_minor']);
$cause= mysql_real_escape_string($_POST['root_cause']);
$corection=mysql_real_escape_string($_POST['corective_measure']);
$prevention=mysql_real_escape_string($_POST['preventive_action']);
$investigator=mysql_real_escape_string($_POST['investigated_by']);
$close_out=mysql_real_escape_string($_POST['close_out']);
$proposed_closeout_date=mysql_real_escape_string($_POST['proposed_closeout_date']);
$department= clean($_POST['Department'], $encode_ent = false);
$date =mysql_real_escape_string (date("d-m-y"));

$selected=mysql_real_escape_string($_POST['CM_Search_index']);

$sql="UPDATE $table
       SET root_cause='$cause',   corrective_action='$corection',
	       preventive_action='$prevention',     investigated_by='$investigator',
      WHERE report_no='$selected' AND center='$Center'";
			
		mysql_query($sql) or die("imekataa".mysql_error());
header('location:../headers/managerhome.php');
		

?>