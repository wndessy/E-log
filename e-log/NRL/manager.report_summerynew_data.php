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
$sql = "SELECT * FROM  $table1 WHERE close_out='New' AND Target_center='$Center' ORDER BY report_no LIMIT $start, $per_page";
$rsd = mysql_query($sql);
?>


			 <table width="100%"  border="0" class="bodytable">
                <tr>
			 <div class="formheader">Reports Summery</div>
                </tr>
				<tr>
					 <td><p for="report_no"> Report No.</p>
					 <td> <p for="report_date"> Report Date:</p>
					 <td>  <p for="cource_code"> Report:</p>
				 <tr>
         <?php
		    //$result = mysql_query("SELECT * FROM  $table1 WHERE close_out='New' AND Target_center='$Center'
		    //                                              ||close_out='Forwarded' AND Target_center='$Center'");
		     while($row = mysql_fetch_array($rsd))
               {?>
			    <tr>
				  <td><button value="<?php echo $row['report_no'];?>" onclick="showDtails('this.value')"><?php echo  $row['report_no'];?></button></td>
				  <td><p><?php echo $row['submision_date'];?></p></td>
				  <td><p><?php echo $row['complain'];?></p></td>
				  <?php } ?>
	 		  </tr>
	</table>

