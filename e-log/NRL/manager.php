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


<?php
include('../login/authentication.php');
include('../login/db_config.php');

if (isset($_POST['submit']))
	    {
			$category= clean($_POST['major_minor'],$encode_ent = false);
			$cause= clean($_POST['root_cause'],$encode_ent = false);
			$corection=clean($_POST['corective_measures'],$encode_ent = false);
			$prevention=clean($_POST['preventive_action'],$encode_ent = false);
			$investigator=clean($_POST['investigated_by'],$encode_ent = false);
			$close_out1=clean($_POST['close_out'],$encode_ent = false);
			$proposed_closeout_date=clean($_POST['proposed_closeout_date'],$encode_ent = false);
			$date =clean (date("d-m-y"));
			$selected=clean($_POST['search_index']);
     mysql_query("UPDATE $table1 
			 SET category = '$category',root_cause='$cause',corrective_action='$corection',preventive_action='$prevention',
			     investigated_by='$investigator',close_out='$close_out1',proposed_closeout_date='$proposed_closeout_date',
			     scm_incharge='$name',close_out_date='$date'
			WHERE report_no='$selected'")or die("imekataa".mysql_error());
	header('location:manager.report_summerynew.php');
		
   }?>


<!doctype html>
<html>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

<link rel='stylesheet' href='../css/mydefault.css' type='text/css'/>  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>

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

</head>
<div class="body"> 
              <?php  include('../headers/headertobe.php'); 
			   if($rank=='Senior Center Manager')
			          {include('../headers/scm_menu.php');}
			   else if($rank=='Center Manager')
			          {include('../headers/manager_menu.php');}
					  
			   elseif($rank=='System Admin')
			          {include('../headers/adminmenu.php');}
			    else
			          {include('../headers/staff_menu.php');}
			   ?>
  <div class='body1'> 
  <div class='body2'>
  <!-- CUSTOMER SECTION BEGINS HERE-->
      <table width="30%"border="0" class="bodytable" align='cener'>
       <tr>
		<td><b>Customer details</b></td>
		</tr>
		</table>
		  <table width="100%"border="0" class="bodytable">
   
    <tr>
      <td style="width:35%;">
	      <label for="report_no"> Report No.: </label>
          <label for="report_date"> Report Date: </label>
          <label for="Target_Center"> Target Center: </label>
          <label for="reported_by"> Reported By: </label>
          <label for="From_Center"> From Center: </label>
          <label for="phone"> Telephone: </label>
          <label for="customer_email"> Email: </label>
          <label for="customer_complain"> Report: </label>
      </td width='70%'>
	   <?php $q= clean($_POST['search_index'],$encode_ent = false);
            $result = mysql_query("SELECT * FROM  $table1 WHERE report_no='$q'")or die (mysql_error());
            if($row = mysql_fetch_array($result))
         { ?>
      <td><p><?php echo $row['report_no'];?></p>
          <p><?php echo $row['submision_date'];?></p>
          <p><?php echo $row['Target_center'];?></p>
             <?php  $Staffid=$row['Reporter_Index'];
				           $result1 = mysql_query("SELECT * FROM  $table2 WHERE Id = '$Staffid'")or die(mysql_error());//tentative value.to be tracked by session
                           if($row1 = mysql_fetch_array($result1))
						   {?>
          <p><?php echo $row1['Name'];?></p>
	      <p><?php echo $row1['Center'];?></p>
          <p><?php echo $row1['Extension_or_phone'];?></p>
		  <p><?php echo $row1['Email'];?></p>
			<?php  } ?>
          <p> <?php echo $row['complain']; ?></p></td>
 <?php } ?>
    </tr>
  </table>
  <!-- CODE for customer details ends HERE-->
  <!-- CODE FOR MANAGER SECTION BEGIN FORMS HERE-->
  <div class="input_area">
    <form id="customer" name="myform" method="POST">
         <input type="hidden" value='<?php echo $q ;?>' name = 'search_index'/> <!-- for passing the searcch index-->
            <div class="formheader">center manager</div>
                   <label> indicate whether major or minor </label>
				  <select name="major_minor" readonly='readonly' >
					<option selected="selected"> <?php echo trim($row['category']);?></option>
					<option value="Major">Major </option>
					<option value="Minor">Minor</option>
				  </select></br>
				  <label>Root cause analysis </label>
				  <textarea name="root_cause" id="5"  placeholder="Enter the root cause of the problem above"
															  required="required" min="4" max="200">
															 <?php echo trim($row['root_cause']);?>	
										 </textarea></br>
				  <label>Corrective action taken</label>
				  <textarea name="corective_measures" id="corective_measure" 
													   placeholder="Enter the corrective measure taken to solve the problem  above"
													   required="required" >
														<?php echo trim($row['corrective_action']);?>	
										</textarea></br>
				  <label>Preventive action taken </label>
				  <textarea name="preventive_action" id="preventive_action" 
													   placeholder=" The preventive measure taken to prevent the problem  above from reoccuring"
													   required="required">
													<?php echo trim( $row['preventive_action']);?>	
										 </textarea></br>
				  <label readonly='readonly'>Investigated By</label>
				  <input type="text" name="investigated_by">
												  <?php echo trim( $row['investigated_by']);?></input></br>
			        <label> close_out </label>
				   <select name="close_out" onchange="nextbutton(this.value)">
								   <option value="-1"><?php echo'---'; echo trim($row['close_out']); echo'---';?></option>
								   <option value="Forwarded">Forward close date</option>
								   <option value="department">Forward to another Department</option>
								   <option value="Center">Forward to another Center</option>
								   <option value="Closed">Close</option>
							</select></br>
			            <div id="txtHint"><b></b></div>
				  
				  <input name="submit" type="submit" id="submit"  value="SUBMIT"/>
				</form>
			  </div>
  <a href="../managerhome.php" align="center"> <button> EXIT</button></a> </div>
		</div>
<?php include('../headers/footer.php');?>
       </div>
   </html>
 <?php

     