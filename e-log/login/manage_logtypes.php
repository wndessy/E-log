		<?php 	include ('../login/authentication.php');
?>
	<html>
	<head>
	<link rel='stylesheet' href='login.css' type='text/css' />  
	</head>
	<body>
		<form  method='post'>
		<div class='header'>
				<input type='text' name='Abreviated_Names' placeholder='Log_type'/>
				<input type='text' name='Full_names' placeholder='Full_names'/></br>
				<button type='submit' name='add'>ADD</button>
				<button type='submit' name='delete'>DELETE</button>
				<button type='reset' name='reset'>RESET</button>

					</form>
	     </div>
<?php
	include ('../login/db_config.php');
          if (isset($_POST['add']))
	        {
							$Abreviated_Names= clean($_POST['Abreviated_Names'],$encode_ent = false);
							$Full_names= clean($_POST['Full_names'],$encode_ent = false);
							
							 $result = mysql_query("SELECT * FROM $table4 WHERE Abreviated_Names='$Abreviated_Names'")or die(mysql_error());
					if(mysql_num_rows($result)> 0) 
							{ ?>
							<div>
							  The logtype Name is registered already.     
							</div>
					  <?php }
					   else {
							mysql_query("INSERT INTO $table4 ('Id',Abreviated_Names	,Full_names)
													  VALUES('','$Abreviated_Names','$Full_names')")or die(Mysql_error());
							}
						  }
			 
			if (isset($_POST['delete']))
	          {
							$Abreviated_Names= clean($_POST['Abreviated_Names'],$encode_ent = false);
							$Full_names= clean($_POST['Full_names'],$encode_ent = false);
							
							 $result = mysql_query("SELECT * FROM $table4 WHERE Abreviated_Names='$Abreviated_Names'")or die(mysql_error());
							 if(mysql_num_rows($result)> 0) 
							{ 	
							  mysql_query("DELETE   FROM $table4 WHERE Abreviated_Names='$Abreviated_Names'")or die(mysql_error());
							 }
						 else {
						 ?>
					   THERE IS NO SUCH Abreviated_Names IN THE DATABASE
					   <?php
							}
			 }
			?>