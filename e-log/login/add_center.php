	<html>
	<head>
	<link rel='stylesheet' href='login.css' type='text/css' />  

	</head>
	<body>
		<form  method='post'>
		<div class='header'>
<input type='text' name='Center' placeholder='Center'/>
<input type='text' name='Description' placeholder='Center'/></br>
<button type='submit' name='add'>ADD</button>
<button type='submit' name='delete'>DELETE</button>
<button type='reset' name='reset'>RESET</button>

	</form>
	</div>
<?php
	include ('../login/db_config.php');
          if (isset($_POST['add']))
	        {
				$Center= clean($_POST['Center'],$encode_ent = false);
				$Description= clean($_POST['Description'],$encode_ent = false);
				
				 $result = mysql_query("SELECT * FROM $table3 WHERE Name='$Center'")or die(mysql_error());
		if(mysql_num_rows($result)> 0) 
				{ ?>
				<div>
				  The Center Name is registered already.     
				</div>
		  <?php }
		   else {
				mysql_query("INSERT INTO $table3 (Name,Description)
							              VALUES('$Center','$Description')")or die(Mysql_error());
			    }
			  }
			 
			  if (isset($_POST['delete']))
	          {
				$Center= clean($_POST['Center'],$encode_ent = false);
				$Description= clean($_POST['Description'],$encode_ent = false);
				
				 $result = mysql_query("SELECT * FROM $table3 WHERE Name='$Center'")or die(mysql_error());
		         if(mysql_num_rows($result)> 0) 
				{ 	
                  mysql_query("DELETE FROM $table3 WHERE Name LIKE '$Center'")or die(mysql_error());
		         }
		     else {?>
		   THERE IS NO SUCH CENTER IN THE DATABASE
		   <?php
			    }
			 }
			?>