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
$sql = "SELECT * FROM  $table WHERE close_out='Forwarded'
		                                                  ||close_out='Forwarded' ORDER BY report_no LIMIT $start, $per_page";
$rsd = mysql_query($sql);
?>


	 <table width="100%"  border="0" class="bodytable">
             <tr>
			 <div class="formheader">New Reports Summery</div>
                </tr>
				<tr>
					 <td><p for="report_no"> Report No.</p>
					 <td> <p for="report_date"> Report Date:</p>
					 <td>  <p for="cource_code"> Cource Code:</p>
					 <td><p for="status"> Center </p>
				 <tr>
          <?php
		   // $result = mysql_query("SELECT * FROM  $table WHERE close_out='Forwarded'
		                                               //   ||close_out='Forwarded'")or die(mysql_error());
		     while($row = mysql_fetch_array($rsd))
               {?>
			    <tr>
				  <td><button value="<?php echo $row['report_no'];?>" onclick="showDtails('this.value')"><?php echo  $row['report_no'];?></button></td>
				  <td><p><?php echo $row['submision_date'];?></p></td>
				  <td><p><?php echo $row['cource_code'];?></p></td>
				  <td><p><?php echo $row['center'];?></p></td>
	 		  </tr>
         <?php
}?>
  
		    
	</table>

