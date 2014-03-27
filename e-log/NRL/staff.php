<?php
include('../login/authentication.php');
include('../login/db_config.php');
?>
<html>
<head>
<link rel='stylesheet' href='../css/mydefault.css' type='text/css'/>  
<script src='../js/validate_form.js'></script>

<style>
body { margin: 0; padding: 0; font-family:Verdana; font-size:15px }
a
{
text-decoration:none;
color:#B2b2b2;

}

a:hover
{

color:#DF3D82;
text-decoration:underline;

}
#loading { 
width: 100%; 
position: absolute;
}

#pagination
{
text-align:center;
margin-left:120px;

}
li{	
list-style: none; 
float: left; 
margin-right: 16px; 
padding:5px; 
border:solid 1px #dddddd;
color:#0063DC; 
}
li:hover
{ 
color:#FF0084; 
cursor: pointer; 
}

</style>
</head>
<body>
  <div class='body'>
 <?php  include('../headers/headertobe.php');?>
        <div class='body1'>
	                <?php  
			    if($rank=='Senior Center Manager')
			          {include('../headers/scm_menu.php');}
			   else if($rank=='Center Manager')
			          {include('../headers/manager_menu.php');}
			   elseif($rank=='System Admin')
			          {include('../headers/adminmenu.php');}
			     elseif($rank=='Department Manager')
			  	   {include('../headers/dm_menu.php');}
			    else
				     {include('../headers/staff_menu.php');}
			   ?>        
			   <div class='body2'>
       <div class="input_area">
	  <FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"align='right'></FORM>
         <form id="staff" name='staff' class='inputarea' method="POST" onsubmit="return validate_staff_form()">
			      <div class="formheader">STAFF</div>
			 	<label for="Log_Type"> Log Type: </label>
									<select  name="Log_Type">
						<option  value='-1'> --Log type--</option>
									<?php
									$result = mysql_query("SELECT * FROM $table4")or die(mysql_error());
									while($row =mysql_fetch_array($result))
									      { 
                                      $Log_Type = $row ['Abreviated_Names'];				
									  ?>
					     <option  value='<?php echo $Log_Type ;?>'> <?php echo $Log_Type ;?> </option>
							       <?php  }  ?>
					</select></br></br>
			   <label for="Department"> Target Department: </label>
					<select  name="Target_Department">
						<option  value='-1'> --Department--</option>
									<?php
									$result = mysql_query("SELECT * FROM $table3")or die(mysql_error());
									while($row =mysql_fetch_array($result))
									      { 
                                      $Department = $row ['Name'];				
									  ?>
					     <option  value='<?php echo $Department ;?>'> <?php echo $Department ;}?> </option>
					</select></br></br>
	   		 <label for="complain">Report: </label>
		             <textarea name="Complain" id="Complain" cols="30" rows="5" placeholder="Enter your complain "
			            required="required" min="4" max="300">
			          </textarea></br>
        <input type="submit" name="submit" value="submit" /></br>

</form>
<p>click the back button once you are done</p><br>
</div>
</div>
		<?php include('../headers/footer.php')?>
		</div>
    </html>


<?php if (isset($_POST['submit']))
{

$Log_Type= $_POST['Log_Type'];
$Target_Department=$_POST['Target_Department'];
$Complain=$_POST['Complain'];
//$Reporter_id=$_POST['Reporter_id'];
$date = date("d-m-y");
mysql_query("insert into $table1(report_no,log_type,Target_Department,complain,submision_date,Reporter_Index)
			values('','$Log_Type','$Target_Department','$Complain','$date','$user_id')")or die(mysql_error()."db connection failed");
		//THE MAIN LOOP FOR CALCULATING THE INTERVAL FOR REMINDER EMAIL
   $check = mysql_query("SELECT * FROM $table WHERE close_out='New' or close_out='Forwarded'");
 While($row=mysql_fetch_array($check))
		 {
     $then=strtotime($raw['submision_date']);
	 $now=strtotime(date(y-m-d));
         while($then >= $now){
	         if($then==$now)
		           {
		
                 // Always set content-type when sending HTML email
                 $headers = "MIME-Version: 1.0" . "\r\n";
                 $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                  //for sending an email to the Department manager concerned
                 $email_adresses = mysql_query("SELECT * FROM $table2 WHERE Rank ='Department-manager' AND Department='$Department'")or die (mysql_error());
                 if($row = mysql_fetch_array($email_adresses))
                  {
				 $to = "$row[email]";
				 $subject = "New CCRL Report";
				 $txt = "Hello Mr/Ms"+$row[name]+", there is a  report for your Department submited on "+$date+" that has not been attended to.Thank you";
				 $headers = "From: e-log@iat.com " . "\r\n" ."CC: cc($email_adresses)";
				  mail($to,$subject,$txt,$headers);
				  }
				  $then= strtotime($then."+ 3days");
				}

		}
		}		
				//a function loop for fetching cc email adresses

				function cc($email_adresses)
					  {
					 while($row=mysql_fetch_array($email_adresses))
						  {
						$email= $raw ['email'] ;
						if ($email==$email_adresses)
						continue;
						  }
					   }
            }
							?>
							
				


