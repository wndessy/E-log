<?php
include('../login/authentication.php');
include('../login/db_config.php');
                 $q=$_GET["q"];
				 if($q=='department')
				   {
					   $result = mysql_query("SELECT * FROM $table6")or die(mysql_error());

				 ?>				
			<label for="dept_code"> Department: </label>
			 <select  name="Department">
			 		<option  value='-1'> </option>
		              	 <?php
			 			while($row1 =mysql_fetch_array($result))
					      {
					        $dept =$row1['Name'];
                           ?>
					     <option  value='<?php echo $dept ;?>'> <?php echo $dept ;?> </option>
					<?php  }  ?>
					</select></br>
				 <?php }
				 else if($q=='Center')
				 {
					$result = mysql_query("SELECT * FROM $table3")or die(mysql_error());
                	 ?>				
			  <label for="dept_code"> Centers: </label>
			  <select  name="Department">
			 		<option  value='-1'> </option>
		              	 <?php
			 			while($row1 =mysql_fetch_array($result))
					      {
					        $dept =$row1['Name'];
                           ?>
					     <option  value='<?php echo $dept ;?>'> <?php echo $dept ;?> </option>
					<?php  }  ?>
					</select></br>
			<?php }
					 else if($q=='Forwarded')
					 { ?>
					 <label>Proposed close date</label>
						     <input type="date" name="proposed_closeout_date"  id="rangeA"></input></br>
					 
					 <?php } ?>
			
					