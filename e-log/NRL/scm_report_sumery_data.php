<?php

include'../login/authentication.php';
include('../login/db_config.php');

$per_page = 5; 

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
$sql = "SELECT * FROM  $table1 WHERE close_out='New' and scm_submision_date='Incomplete' ORDER BY report_no LIMIT $start, $per_page";
$rsd = mysql_query($sql);
?>

 <table width="100%"  border="0" class="bodytable">
             <tr>
			 <div class="formheader"><link rel="localhost/e-log/manager.php"> NRL Report Summery</link></div>
              </tr>

		 <tr>
			 <td><p for="report_no">Report No</p>
			 <td><p for="log_type">Log Type</p>
			  <td><p for="center">Center<p>
			 <td><p for="report_date"> Report Date</p>
		 </tr>
         <?php
		// $result = mysql_query("SELECT * FROM  $table1  WHERE close_out='New'");
		 while($row = mysql_fetch_array($rsd))
         {
		 ?>
		<tr> 
			  <td><p><?php echo $row['report_no'];?><p></td>
			  <td><p><?php echo $row['log_type'];?></p></td>
			  <td><p><?php echo $row['Target_center'];?></p></td>
			  <td><p><?php echo $row['submision_date'];?></p></td>
	    </tr> <?php 
	    } 
	   ?>