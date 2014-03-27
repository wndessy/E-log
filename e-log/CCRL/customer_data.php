<?php
include('../login/db_config.php');

                 $q=$_GET["q"];
					$result = mysql_query("SELECT * FROM courses WHERE Center LIKE '$q'")or die(mysql_error());
                ?>				
			<label for="cource_code"> Course Code: </label>
			 <select  name="cource_code">
			 		<option  value='-1'> </option>
		              	 <?php
			 			while($row1 =mysql_fetch_array($result))
					      {
					        $cource =$row1['Cource_code'];
                           ?>
					     <option  value='<?php echo $cource ;?>'> <?php echo $cource ;?> </option>
					<?php  }  ?>
						 <option value='other'>	other</option>	   
					</select></br>
