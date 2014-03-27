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
$sql = "SELECT * FROM  $table  WHERE close_out='Closed' && scm_submision_date='Incomplete' ORDER BY report_no LIMIT $start, $per_page";
$rsd = mysql_query($sql);
?>


	
     <table width="100%"  border="0" class="bodytable">
           <tr>
			 <div class="formheader"><link rel="localhost/e-log/manager.php">Closed Report Summery</link></div>
             </tr>
		       <tr>
					 <td><p for="report_no"> Report No.</p>
					 <td><p for="cource_code"> Course Code:</p>
					 <td><p for="center">Center<p>
					 <td><p for="close"> Close-out date </p>
					 <td><p for="close"> By</p>
         <?php //$result = mysql_query("SELECT * FROM  $table  WHERE close_out='Closed' && scm_submision_date='Incomplete'")or die(mysql_error());
		 while($row = mysql_fetch_array($rsd))
             {?>
				 <tr>
					  <td><p><?php echo $row['report_no'];?><p></td>
					  <td><p><?php echo $row['cource_code'];?></p></td>
					  <td><p><?php echo $row['center'];?></p></td>
					  <td><p><?php echo $row['close_out_date'];?></p></td>
					  <td><p><?php echo $row['scm_incharge'];?></p></td>
				 </tr>
				 <?php } ?>
	</table>

