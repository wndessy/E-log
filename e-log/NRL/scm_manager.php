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

<!doctype html>
<?php
include'../login/authentication.php';
include('../login/db_config.php');


$q= mysql_real_escape_string($_POST['search_index']);//search index
 $result = mysql_query("SELECT * FROM  $table1 WHERE report_no=$q");
?>
<html>
<title>e-log</title>
<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel='stylesheet' href='../css/mydefault.css' type='text/css'/> 
</head>
  <body>
     <div class="body"> <?php  include('../headers/headertobe.php');?>
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
			   <div class='body1'>
	  <div id='back'><FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"align='right'></FORM></div>
<div class='body2'>
	<!-- CUSTOMER SECTION BEGINS HERE-->
	     <table width="30%"border="0" class="bodytable" align='center'>
		<tr><div class="formheader">NRL Report View<div></tr>
       <tr>
		<td><b>Customer details</b></td>
		</tr>
		</table>
		  <table width="100%"border="0" class="bodytable">
					<?php
						if($row = mysql_fetch_array($result)) { ?>
					   <tr>
						 <td style="width:30%;">
								  <label for="report_no"> Report No.: </label> </br> 
								  <label for="report_date"> Report Date: </label></br>
								  <label for="Target_Center"> Target Center: </label></br>
								  <label for="reported_by"> Reported By: </label></br>
								  <label for="From_Center"> From Center: </label></br>
								  <label for="phone">  Telephone: </label></br>
								  <label for="customer_email">  Email: </label></br>
								  <label for="customer_complain"> Report: </label></br>
						</td>
					 <td> 
								  <p><?php echo $row['report_no'];?></p></br>
								  <p><?php echo $row['submision_date'];?></p></br>
								  <p><?php echo $row['Target_center'];?></p></br>
										<?php $result1 = mysql_query("SELECT * FROM  $table2 WHERE Id =$user_id")or die(mysql_error());
										   if($row1 = mysql_fetch_array($result1))
										   { 
										   ?>
								  <p><?php echo $row1['Name'];?></p></br>
								  <p><?php echo $row1['Center'];?></p></br>
								  <p><?php echo $row1['Extension_or_phone'];?></p></br>
								  <p><?php echo $row1['Email'];?></br></p>
									   <?php
										   }
										 ?>
						  <p> <?php echo $row['complain'];?></p></br>
					 
					</td>
				</tr> 		   
		   <!-- CODE FOR MANAGER SECTION BEGIN FORMS HERE-->

				 </table>
		   
		   <!-- CODE FOR MANAGER SECTION BEGIN FORMS HERE-->
		   
      <table width="30%"border="0" class="bodytable" align='center'>
       <tr>
		<td><b>Center manager response</b></td>
		</tr>
		</table>
		  <table width="100%" border="0" class="bodytable">
		  	 <tr>
					 <td>
						 <label> problem category </label></br>
						<label> Root cause  </label> </br>
						<label >Corrective action  </label></br>
						<label >Preventive action  </label></br>
						<label >Investigated By </label></br>
						<label> Close out of state </label> </br>
						<label> Close out of date </label></br>
						<label> By </label>
					  </td>
					   <td>
								  <p><?php	echo $row['category'];?></p></br>
								  <p><?php  echo $row['root_cause'];?></p></br>
								  <p><?php  echo $row['corrective_action'];?></p></br>
								  <p><?php  echo $row['preventive_action'];?></p></br>
								  <p><?php  echo $row['investigated_by'];?></p></br>
								  <p><?php  echo $row['close_out'];?></p></br>
								  <p><?php  echo $row['close_out_date'];?></p></br>
								  <p><?php  echo $row['scm_incharge'];?></p></br>
                      </td>	 
						
				   </tr>

			  <!-- CODE FOR SCM BEGINS HERE--/////// is of two types determined by the query result bellow-->
		</table>	
			                <table width="30%"border="0" class="bodytable" align='center'>
           <tr>
		<td><b> Senior Center manager response</b></td>
	     	</tr>
		     </table>
		       <table width="100%" border="0" class="bodytable">
				   
				   <div class="input_area">
                             <form id="customer"  method="POST">
							 <input type="hidden" value="<?php echo $q?>" name="search_index"><!-- for passing the index-->
		                      <label for="root_cause">Corrective action satisfactory?</label>
								   <select name="corective" >
							          <option selected="selected" value='0.1'>-choose-</option>
							          <option value="Yes">Yes </option>
							          <option value="No">No</option>
				                  </select></br>
				             <label for="corective_measure">Preventive action satisfactory? </label>
								<select name="Preventive" >
									 <option selected="preventive" value='0.1'>-choose-</option>
									 <option value="Yes">Yes </option>
									 <option value="No">No</option>
				               </select></br>
                               <input type="submit" name="submit" value="submit"  />
	                        </form>
							</table>
	</div>
</div>
		
		</div>
    </html>

<?php  
    if (isset($_POST['submit']))
    {
		$corective= mysql_real_escape_string($_POST['corective']);
		$preventive= mysql_real_escape_string($_POST['Preventive']);
		//$incharge=mysql_real_escape_string($_POST['incharge']);
		$selected=mysql_real_escape_string($_POST['search_index']);
		$date =mysql_real_escape_string (date("d-m-y"));
        $sql="UPDATE $table1 SET scm_corective_coment = '$corective',scm_preventive_coment='$preventive',scm_inchargeh='$name',scm_submision_date='$date'
             WHERE report_no='$selected'";
		mysql_query($sql) or die("imekataa".mysql_error());
		
		
			   //sending an email to the customer
			
	     $email_adresses = mysql_query("SELECT * FROM $table1 WHERE report_no='$selected'");
            if($row = mysql_fetch_array($email_adresses))
					 $reporterindex=$row['Reporter_Index'];
					 $nrlComplain = $row['complain'];
					 $center_manager = $row['scm_inchargeh'];
					
		
			$stafftablequery=mysql_query("SELECT * FROM $table2 WHERE Id='$reporterindex'");
                
				if ($row2 = mysql_fetch_array($stafftablequery)){  
					 //$to = trim($row['email']);
					 $subject = "CCRL Report solution unsatisfactory";
					 $txt = "Dear"+ $row2['Name']; +"thank you for raising a complain concerning"+ $nrlComplain +"we appologise for the inconvenience 
					 caused by this issue,we are pleased to inform you that a satisfactory corrective action has been taken.
					 we value your feedback,please let us know if there is anything further we can do so as to be of assistance.
					 Thank you for your understanding and support.
					 IAT your success is our responsibility.
					 Best regards.";
					 $headers =/*frommail($center_manager);*/ "From: IAT_E-Log_Site@iatcampus.ac.ke" . "\r\n" ;
					  mail($row2['Email'],$subject,$txt,$headers);
				 }
			$stafftablequery2 = mysql_query("SELECT * FROM $table2 WHERE Name = '$center_manager'");
				if ($row3 = mysql_fetch_array($stafftablequery2)){ 
					   if($corective='No' or $preventive='No')  //for sending an email to the center manager concerned
						{
						  
						  $subject = "CCRL Report solution unsatisfactory";
						  $txt = "Hallo Mr/Mrs"+ $center_manager +"this is to notify you that either the corrective,
								 preventive or both approaches you reccommended for the customer report numbber"
								 +$selected +"is unsatisfactory to the scm .please have a look at it again.thank you";
						 $headers = "From: IAT_E-Log_Site@iatcampus.ac.ke " . "\r\n" ;
						  mail($row3['Email'],$subject,$txt,$headers);
						}
						}
				}
	   		
// function frommail($name)
  // {                 //a function for getting the email given the name of the manager concerned
  // //$result=mysql_query(SELECT  * FROM $table2 WHERE name='name');
   // if ($myrow=mysql_fetchn_array($result1))
                       // return $myrow['email'];
 // }
}header('location:scm_report_sumery.php');
//}
include('../headers/footer.php');

?>
	
</html>





