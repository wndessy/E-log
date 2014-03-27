	<?php 	include ('../login/authentication.php');
?>


	
	<html>
	<head>
	<link rel='stylesheet' href='login.css' type='text/css' />  

	</head>
	<body>
		<form  method='post'>
		<div class='header'>
<input type='text' name='Department' placeholder='Department'/>
<input type='text' name='Description' placeholder='Description'/></br>
<button type='submit' name='add'>ADD</button>
<button type='submit' name='delete'>DELETE</button>
<button type='reset' name='reset'>RESET</button>

	</form>
	</div>
<?php
	include ('../login/db_config.php');
          if (isset($_POST['add']))
	        {
				$Department= clean($_POST['Department'],$encode_ent = false);
				$Description= clean($_POST['Description'],$encode_ent = false);
				
				 $result = mysql_query("SELECT * FROM $table6 WHERE Name='$Department'")or die(mysql_error());
		if(mysql_num_rows($result)> 0) 
				{ ?>
				<div>
				  The Department Name is registered already.     
				</div>
		  <?php }
		   else {
				mysql_query("INSERT INTO $table6 (Name,Description)
							              VALUES('$Department','$Description')")or die(Mysql_error());
				{ ?>
				<div>
				  The Department Name is department is succesfully added.     
				</div>
		  <?php }
										  
			    }
			  }
			 
			  if (isset($_POST['delete']))
	          {
				$Department= clean($_POST['Department'],$encode_ent = false);
				$Description= clean($_POST['Description'],$encode_ent = false);
				
				 $result = mysql_query("SELECT * FROM $table6 WHERE Name='$Department'")or die(mysql_error());
		         if(mysql_num_rows($result)> 0) 
				{ 	
                  mysql_query("DELETE  FROM $table6 WHERE Name='$Department'")or die(mysql_error());
		         }
		     else {?>
		  There is no such  Department in the  database
		   <?php
			    }
			 }
			?>