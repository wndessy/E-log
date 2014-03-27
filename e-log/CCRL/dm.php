
<?php
include'../login/authentication.php';
include('../login/db_config.php');

if (isset($_POST['Submit']))
{
$cause= clean($_POST['root_cause'], $encode_ent = false);
$corection=clean($_POST['corective_measure'], $encode_ent = false);
$prevention=clean($_POST['preventive_action'], $encode_ent = false);
$investigator=clean($_POST['investigated_by'], $encode_ent = false);
$selected=clean($_POST['CM_Search_index'], $encode_ent = false);
$sql="UPDATE $table
       SET root_cause='$cause',   corrective_action='$corection',
	       preventive_action='$prevention',     investigated_by='$investigator'
        WHERE report_no='$selected' AND center='$Center'";
	  mysql_query($sql)or die(mysql_error());
	  header('location:../CCRL/dm.report_summery.php');
}
?>

<!doctype html>
<html>
<title> CCRL forwarded reports</title>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<link rel='stylesheet' href='../css/mydefault.css' type='text/css'/> 
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script src='../js/validate_form.js'></script>
<script>
function resetCursor(txtElement) { //for reseting the cursor position
    if (txtElement.setSelectionRange) { 
        txtElement.focus(); 
        txtElement.setSelectionRange(0, 0); 
    } else if (txtElement.createTextRange) { 
        var range = txtElement.createTextRange();  
        range.moveStart('character', 0); 
        range.select(); 
    } 
}
</script>


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
text-align:Department;
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
       <tr>
		<td><b>Customer details</b></td>
		</tr>
		</table>
  <table width="100%"border="0" class="bodytable">
         <?php $q= clean($_POST['search_index'],$encode_ent = false);?>
		</tr>
            <tr>
			<th style="width:1%;">
			<td style="width:30%;">
    			<label for="report_no"> Report No.: </label> </br> 
				  <label for="report_date"> Report Date: </label></br>
				  <label for="reported_by"> Reported By: </label></br>
				  <label for="customer_name">  Name: </label></br>
				  <label for="customer_phone">  Telephone: </label></br>
				  <label for="customer_email">  Email: </label></br>
				  <label for="cource_code"> Cource Code: </label></br>
				  <label for="customer_complain"> Complain: </label></br>
		      </td>
			   </th>
			   <th>
		      <td> 
			  <?php
					$result = mysql_query("SELECT * FROM  $table WHERE report_no=$q");
             if($row = mysql_fetch_array($result))
			 {
			  ?>
				  <p><?php echo $row['report_no'];?></p></br>
				  <p><?php echo $row['submision_date'];?></p></br>
				  <p><?php echo $row['name'];?></p></br>
				  <p><?php echo $row['phone'];?></p></br>
				  <p><?php echo $row['email'];?></br></p>
				  <p><?php echo $row['cource_code'];?></p></br>
				  <p class='complain'><?php echo $row['complain'];?></p></br>
             <?php
			 }
			 ?>
			</td>
			</th>
		</tr>
 </table>  
   	   <!-- CODE for customer details ends HERE-->

	   <!-- CODE FOR MANAGER SECTION BEGIN FORMS HERE-->
	   <!-- begining of a display loop-->
       
	       
			  <div class="input_area">
					<form name="manager"  method="POST" onSubmit="return validate_manager_form()">
					<input type="hidden" value='<?php echo $q;?>' name = 'CM_Search_index'/><!-- for passing the searcch index-->
					  <div class="formheader">Department manager</div>
							<label for="root_cause">Root cause analysis  </label>
							<textarea name="root_cause" id="root_cause"  placeholder="Enter the root cause of the problem above"
												 maxlength="300"/>
										         <?php echo trim($row['root_cause']);?>	
							 </textarea></br>
							<label for="corective_measure">Corrective action taken </label>
							 <textarea name="corective_measure" id="corective_measure" 
										   placeholder="Enter the corrective measure taken to solve the problem  above"
										    maxlength="300">
										 	<?php echo trim($row['corrective_action']);?>	
							</textarea></br>
							 <label for="preventive_action">Preventive action taken </label>
							 <textarea name="preventive_action" id="preventive_action"
										   placeholder=" The preventive measure taken to prevent the problem  above from reoccuring"
										     maxlength="300">
										<?php echo trim($row['preventive_action']);?>	
							 </textarea></br>
							 <label for="investigated_by" >Investigated By</label>
							 <input type="text" name="investigated_by" placeholder="  <?php echo trim($row['investigated_by']);?>" >
							         </input>
							 </br>
							 
								

						<input type="submit" id="submit" name='Submit' onClick="history.go(-1);return true; value="SUBMIT"/>
				   </form>
        </div>
		</div>
		<?php include('../headers/footer.php')?>
		</div>
</html>






