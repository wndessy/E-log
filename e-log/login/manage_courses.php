	<?php 	include ('../login/authentication.php');
?>

	<html>
	<head>
	<link rel='stylesheet' href='login.css' type='text/css' />  

	</head>
	<body>
		  <form  method='post'>
						  <div class='header'>
			   <input type='text' name='Course_code' placeholder='Course code'/>
				<select  name="Center">
						<option  value='-1'> --Center--</option>
												<?php
													include ('../login/db_config.php');
												$result = mysql_query("SELECT * FROM $table3")or die(mysql_error());
												while($row =mysql_fetch_array($result))
													  { 
													$center = $row ['Name'];				
													   ?>
						 <option  value='<?php echo $center ;?>'> <?php echo $center ;?> </option>
											   <?php  }  ?>
			   </select>
			   <input type='text' name='Description' placeholder='Description'/></br>
			   <button type='submit' name='add'>ADD</button>
			   <button type='submit' name='delete'>DELETE</button>
			   <button type='reset' name='reset'>RESET</button>
   </form>
   </div>
 
 <?php
          if (isset($_POST['add']))
	         { 
						$Course_code= clean($_POST['Course_code'],$encode_ent = false);
						$Center= clean($_POST['Center'],$encode_ent = false);
						$Description= clean($_POST['Description'],$encode_ent = false);
						$result = mysql_query("SELECT * FROM $table5 WHERE Cource_code='$Course_code'")or die(mysql_error());
				 if(mysql_num_rows($result)> 0) 
						{ ?>
						<div>
						   The Course name is registered already.     
						</div>
				  <?php }
				   else {
						mysql_query("INSERT INTO $table5 (Id,Course_code,Center,details)
												  VALUES('','$Course_code','$Center','$Description')")or die(Mysql_error());
						}
			 }	 
		 if (isset($_POST['delete']))
	          {
						$Course_code= clean($_POST['Course_code'],$encode_ent = false);
						$Description= clean($_POST['Description'],$encode_ent = false);
						 $result = mysql_query("SELECT * FROM $table5 WHERE Course_code='$Course_code'")or die(mysql_error());
						 if(mysql_num_rows($result)> 0) 
						{ 	
						  mysql_query("DELETE  FROM $table5 WHERE Course_code='$Course_code'")or die(mysql_error());
						 }
					 else {?>
				      THERE IS NO SUCH COURCE CODE IN THE DATABASE
				         <?php
						}
			 }
			?>