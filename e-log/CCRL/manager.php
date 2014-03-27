
<?php
include'../login/authentication.php';
include('../login/db_config.php');
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
function nextbutton(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","manager_data.php?q="+str,true);
xmlhttp.send();
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
  <table width="30%"border="0" class="bodytable" align='right'>
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
				  <label for="customer_phone"> Telephone: </label></br>
				  <label for="customer_email"> Email: </label></br>
				  <label for="cource_code"> Cource Code: </label></br>
				  <label for="customer_complain">Complain: </label></br>
		      </td>
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
		</tr>
 </table>  
   	   <!-- CODE for customer details ends HERE-->

	   <!-- CODE FOR MANAGER SECTION BEGIN FORMS HERE-->
	   <!-- begining of a display loop-->
       
	       
			  <div class="input_area">
					<form name="manager"  action='manager.bc.php' method="POST" onsubmit="return validate_manager_form()">
					<input type="hidden" value='<?php echo $q;?>' name = 'CM_Search_index'/><!-- for passing the searcch index-->
					  <div class="formheader">Department manager</div>
							<label> indicate whether major or minor </label>
							<select name="major_minor" >
								<option  value="-1"><?php echo'---';echo $row['category'];echo'---';?></option>
								<option value="Major">Major </option>
								<option value="Minor">Minor</option>
								<option value='Observation'>Observation</option>
							</select></br>
							<label for="root_cause">Root cause analysis  </label>
							<textarea name="root_cause" id="root_cause"  placeholder="Enter the root cause of the problem above"
												 maxlength="300">
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
							 <label for="investigated_by">Investigated By</label>
							 <input type="text" name="investigated_by" placeholder="<?php echo trim($row['investigated_by']);?>" />
							 </br>
							 <label> close_out </label>
							 
							 <select name="close_out" onchange="nextbutton(this.value)">
								   <option value="-1"><?php echo'---'; echo trim($row['close_out']); echo'---';?></option>
								   <option value="Forwarded">Forward close date</option>
								   <option value="department">Forward to another Department</option>
								   <option value="Center">Forward to another Center</option>
								   <option value="Closed">Close</option>
							</select></br>
			            <div id="txtHint"><b></b></div>
						<input type="submit" id="submit" name='Submit' onClick="history.go(-1);return true; value="SUBMIT"/>
				   </form>
        </div>
		</div>
		<?php include('../headers/footer.php')?>
		</div>
</html>





