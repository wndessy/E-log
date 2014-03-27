<?php
	include ('db_config.php');
?>

<!Doctype html>
<html>
        <title>Add new user</title>
    <head>
    <script src = "../JS/jquery-1.9.1.min.js"></script>
    <link rel = "stylesheet" href = "login.css" />
	<script src='../js/validate_form.js'></script>
	</head>
	
        <meta content = text/html charset="utf-8">
		<body>
	   <div id="stafflogin" class='header'>
	   				<button id='login_as_close_btn' type='close' class="close" title="close">&times;</button>
				 <h1>NEW USER</h1>  
			   <form id = "log_in_form" method = "POST" name="myForm" onsubmit="return validateForm()" >
                    <span id = "log_in_as_span"></span><br /><br />
					<input type="text" name="name"  placeholder = "Name" /><br/> </br>
					<input type="text" name="email"  placeholder = "Email" /><br/> </br>
					<input type="text" name="phone"  placeholder = "Phone or office extension" /><br/> </br>
					<select  name="Center">
						<option  value='-1'> --Center--</option>
									<?php
									$result = mysql_query("SELECT * FROM $table3")or die(mysql_error());
									while($row =mysql_fetch_array($result))
									      { 
                                      $center = $row ['Name'];				
									  ?>
					     <option  value=' <?php echo $center; ?> '> <?php echo $center ;?> </option>
							       <?php  }  ?>
					</select></br></br>
					
					<select  name="Rank"  placeholder = "Rank" >
					      <option  value='-1'>--Rank--</option>
					      <option  value='Normal Staff'>Normal Staff</option>
					      <option  value='Center Manager'>Center Manager</option>
					      <option  value='Senior Center Manager'>SCM/CMK/GMEA</option>
					      <option  value='System Admin'>System Admin</option>
					      <option  value='Department Manager'>Department Manager</option>

					</select><br/> </br>
					<input type="password" name="password" placeholder = "Password" /><br/>
					<input type="password" name="password2" placeholder = "Retype Password" /><br/>
                    <span class = "alert-error" id = "error_span"></span><br />
                    <button align='left' name='add'class = "btn btn-primary" id = "log_in_submit"><i class = "icon-check"></i>&nbsp;&nbsp;ADD</button>
                    <button align='left' name='add'class = "btn btn-primary" id = "log_in_submit"><i align='right' class = "icon-remove"></i>&nbsp;&nbsp;RESET</button>
                </form>
	
				
<?php

          if (isset($_POST['add']))
	        {
				$Name= clean($_POST['name'],$encode_ent = false);
				$Email= clean($_POST['email'],$encode_ent = false);
				$phone= clean($_POST['phone'],$encode_ent = false);
				$Center= clean($_POST['Center'],$encode_ent = false);
				$Rank= clean($_POST['Rank'],$encode_ent = false);
				$password=clean($_POST['password'],$encode_ent = false);
				$password2=clean($_POST['password2'],$encode_ent = false);
				
        if($password!= $password2)
			 {?>
		     <div>The two passwords do not match.please try again</div>
	        <?php 
			 } 
	    else{
				 $result = mysql_query("SELECT DISTINCT Id  FROM $table2 WHERE Email='$Email' AND Name='$Name'")or die(mysql_error());
		if(mysql_num_rows($result)> 0) 
				{ ?>
				<div>
				  The name or Email is registered already.     
				</div>
		  <?php }
		   else {
				mysql_query("INSERT INTO $table2 (Id,Name,Email,Extension_or_phone,Center,Rank,Password)
							                VALUES('','$Name','$Email','$phone','$Center','$Rank','$password')")or die(Mysql_error());
			    }
			 }
			}
				?></div>
		</body>	
</html>
