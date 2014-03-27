<?php
	include ('db_config.php');
	$q=$_GET['q'];
	//for users
          if($q=='a') 
		 { ?>
	        <div id="" class='input_area'>
	   				
				 <h1>NEW USER</h1>  
			        <form id = "log_in_form" method = "POST" name="myForm" onsubmit="return validateForm()" >
                    <span id = "log_in_as_span"></span><br /><br />
					<label>Name</label>
					<input type="text" name="name"  placeholder = "Name" /><br/> </br>
					<label>Email</label>
					<input type="text" name="email"  placeholder = "Email" /><br/> </br>
					<label>Phone</label>
					<input type="text" name="phone"  placeholder = "Phone or office extension" /><br/> </br>
					<label>Ceneter</label>
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
					<label>Rank</label>
					<select  name="Rank"  placeholder = "Rank" >
					      <option  value='-1'>--Rank--</option>
					      <option  value='Normal Staff'>Normal Staff</option>
					      <option  value='Center Manager'>Center Manager</option>
					      <option  value='Senior Center Manager'>SCM/CMK/GMEA</option>
					      <option  value='System Admin'>System Admin</option>
						  <option value='Department Manager'>Department Manager</option>
					</select><br/> </br>
					<label>Pasword</label>
					<input type="password" name="password" placeholder = "Password" /><br/>
					<label>Retype Password</label>
					<input type="password" name="password2" placeholder = "Retype Password" /><br/>
                    <span class = "alert-error" id = "error_span"></span><br />
                    <button align='left' name='add'class = "btn btn-primary" id = "log_in_submit"><i class = "icon-check"></i>&nbsp;&nbsp;ADD</button>
                    <button align='left' name='add'class = "btn btn-primary" id = "log_in_submit"><i align='right' class = "icon-remove"></i>&nbsp;&nbsp;RESET</button>
                </form>
	</div>
				
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

<?php
}
//for center
else if($q=='b')
{?>
	<div class='input_area'>
		<form  method='post'>
		<label>Centetr Name</label>
			<input type='text' name='Center' placeholder='Center'/></br>
			<label>Bief Description</label>
			<input type='text' name='Description' placeholder='Center'/></br>
			<button type='submit' name='add'>ADD</button>
			<button type='submit' name='delete'>DELETE</button>
			<button type='reset' name='reset'>RESET</button>

	</form>
	</div>
<?php
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
		}	
		//for courses
	else if($q=='c')
	{	
	?>
	<div class='input_area'>
		  <form  method='post'>
                <label>Course_code</label>
			   <input type='text' name='Course_code' placeholder='Course code'/></br>
			   <label>Center</label>
				<select  name="Center">
						<option  value='-1'> --Center--</option>
												<?php
									
												$result = mysql_query("SELECT * FROM $table3")or die(mysql_error());
												while($row =mysql_fetch_array($result))
													  { 
													$center = $row ['Name'];				
													   ?>
						 <option  value='<?php echo $center ;?>'> <?php echo $center ;?> </option>
											   <?php  }  ?>
			   </select>
			   	<label>Brief description</label>
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
		}
		//for department
			else if ($q=='d') {?>
		<div class='header'>
		  <form  method='post'>
		            <label> Department Name</label>
					<input type='text' name='Department' placeholder='Department'/></br>
					<label> Brief  Description</label>
					<input type='text' name='Description' placeholder='Description'/></br>
					<button type='submit' name='add'>ADD</button>
					<button type='submit' name='delete'>DELETE</button>
		 			<button type='reset' name='reset'>RESET</button>
	      </form>
	    </div>
<?php
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
			}?>
			
			
			
			
			
			
			
			