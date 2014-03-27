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
 $result = mysql_query("SELECT * FROM  $table WHERE report_no=$q");
?>
<html>
<title></title>
<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<link rel='stylesheet' href='../css/mydefault.css' type='text/css'/>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
		  <table width="100%"border="0" class="bodytable">			<?php
				if($row = mysql_fetch_array($result))
		      {?>
            <tr>
					<td  style="width:30%;">

						<label for="report_no"> Report No.: </label> </br> 
						<label for="report_date"> Report Date: </label></br>
						<label for="reported_by"> Reported By: </label></br>
						 <label for="customer_phone">  Telephone: </label></br>
						 <label for="customer_email">  Email: </label></br>
						  <label for="cource_code"> Cource Code: </label></br>
						  <label for="customer_complain">  Complain: </label></br>
					</td>
					<td style="width:30%;">
						<p><?php echo $row['report_no'];?></p></br>
						<p><?php echo $row['submision_date'];?></p></br>
						<p><?php echo $row['name'];?></p></br>
						<p><?php echo $row['phone'];?></p></br>
						<p><?php echo $row['email'];?></br></p>
						<p><?php echo $row['cource_code'];?></p></br>
						<p><?php echo $row['complain'];?></p></br>
				   </td>
				</tr>
					
		   </table>
		   
		   <!-- CODE FOR MANAGER SECTION BEGIN FORMS HERE-->
		   
      <table width="30%"border="0" class="bodytable" align='center'>
       <tr>
		<td><b>Center manager response</b></td>
		</tr>
		</table>
		  <table width="100%" border="0" class="bodytable">
		       <tr>
					 <td style="width:50%;">
						 <label> Problem category </label></br>
						<label> Root cause  </label> </br>
						<label >Corrective action  </label></br>
						<label >Preventive action  </label></br>
						<label >Investigated By </label></br>
						<label> Close Out Date </label></br>
						<label> By </label>
					  </td>
					   <td>
								  <p><?php	echo $row['category'];?></p></br>
								  <p><?php  echo $row['root_cause'];?></p></br>
								  <p><?php echo $row['corrective_action'];?></p></br>
								  <p><?php echo $row['preventive_action'];?></p></br>
								  <p><?php echo $row['investigated_by'];?></p></br>
								  <p><?php  echo $row['close_out_date'];?></p></br>
								  <p><?php  echo $row['scm_incharge'];?></p></br>
                      </td>	 
				   </tr>
            </table>
			  <!-- CODE FOR SCM BEGINS HERE--/////// is of two types determined by the query result bellow-->
	              <table width="30%"border="0" class="bodytable" align='center'>
       <tr>
		<td><b>Senior Center Manager response</b></td>
		</tr>
		     </table>
		  <table width="100%" border="0" class="bodytable">
              	<tr>
						<td style="width:60%;">
							<label> scm_corective_coment </label></br>
							<label> scm_preventive_coment  </label> </br>
							<label >scm_inchargeh  </label></br>
							<label> scm_submision_date </label> </br>
						</td>
						<td>
							  <p><?php	echo $row['scm_corective_coment'];?></p></br>
							  <p><?php  echo $row['scm_preventive_coment'];?></p></br>
							  <p><?php echo $row['scm_inchargeh'];?></p></br>
							  <p><?php  echo $row['scm_submision_date'];}?></p></br>
	                    </td>
                         </tr>
						 </table>
              </div>
          </div>
	 	  <div id='back'><FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"align='right'></FORM></div>
<FORM><INPUT Type="button" VALUE="EXIT" onClick="history.go(-2);return true;" align='right'></FORM>
         
		<?php include('../headers/footer.php')?>
		</div>
    </html>






	
	
	
