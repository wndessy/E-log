<?php
include('../login/db_config.php');

                $q=$_GET["q"];
					$result = mysql_query("SELECT * FROM $table6")or die(mysql_error());
					while($row1 =mysql_fetch_array($result))
                ?>				
			<label for=""> Department: </label>
			 <select  name="another_Department">
						<option  value='-1'> -Choose- </option>
									<?php
									      { 
                                      $Department = $row1 ['Name'];				
									  ?>
					     <option  value='<?php echo $Department ;?>'> <?php echo $Department ;?> </option>
							       <?php  }  ?>
					</select></br>
