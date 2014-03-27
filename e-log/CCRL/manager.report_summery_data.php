<?php

include'../login/authentication.php';
include('../login/db_config.php');

$per_page = 5; 

if($_GET)
{
$page=$_GET['page'];
}



//get table contents where the report is New or forwarded to the center from another center
$start = ($page-1)*$per_page;
$sql = "SELECT * FROM  $table WHERE close_out=('New') AND center='$Center' || close_out= CONCAT('Forwarded to Center',' ','$Center')
		                         ORDER BY report_no LIMIT $start, $per_page";
$rsd = mysql_query($sql);
?>


				 <table width="100%"  border="0" class="bodytable">
             <tr>
			 <div class="formheader">Reports Summery</div>
                </tr>
				<tr>
					 <td><p for="report_no"> Report No.</p>
					 <td> <p for="report_date"> Report Date:</p>
					 <td>  <p for="cource_code"> Course Code:</p>
					 <td><p for="status"> Status </p>
				 <tr>
          <?php
		     while($row = mysql_fetch_array($rsd))
               {?>
			    <tr> 
				  <td><button value="<?php echo $row['report_no'];?>" onclick="showDtails('this.value')"><?php echo  $row['report_no'];?></button></td>
				  <td><p><?php echo $row['submision_date'];?></p></td>
				  <td><p><?php echo $row['cource_code'];?></p></td>
				  <?php
				  if($row['close_out']=='New')
				   {?>
			        <td><p><?php echo $row['close_out']; } ?> </p></td>
				 <?php if($row['close_out']!='New') {?>
				  <td><p><?php echo $row['close_out'] ;echo' from ' ;echo $row['center'] ; 
				    ?></p></td>
					<?php }?>
	 		  </tr>
         <?php
}?>
	</table>

