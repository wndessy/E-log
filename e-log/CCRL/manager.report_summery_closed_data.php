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
$sql = "SELECT * FROM  $table WHERE close_out='Closed' AND scm_submision_date='Incomplete' ORDER BY report_no LIMIT $start, $per_page";
$rsd = mysql_query($sql);
?>


	<div class="formheader">Closed Reports Summery</div>
			 <table width="100%" border="0" class="bodytable">
				<tr>
					 <td><p for="report_no"> Report No.</p>
					 <td> <p for="report_date"> Report :</p>
					 <td>  <p for="cource_code"> Submission Date:</p>
				 <tr>
         <?php
		   // $result = mysql_query("SELECT * FROM  $table WHERE close_out='Closed' AND scm_submision_date='Incomplete'");
		     while($row = mysql_fetch_array($rsd))
               {?>
			    <tr>
				  <td><button value="<?php echo $row['report_no'];?>" onclick="showDtails('this.value')"><?php echo  $row['report_no'];?></button></td>
				  <td><p><?php echo $row['complain'];?></p></td>
				  <td><p><?php echo $row['submision_date'];?></p></td>
	 		  </tr>
         <?php
}?>
              
	</table>

