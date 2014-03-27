




<?php
include'../login/authentication.php';
include('../login/db_config.php');
?>

<html>
<title>Manager home</title>
<head>
<link rel='stylesheet' href='../css/mydefault.css' type='text/css'/>  
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
  
  <div class='homebody'>
    <?php include('../headers/headertobe.php');?>
        <div class='homebody1'>
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
               <div class="body2">
		  <div class='input_area'>
                <table width="100%"  border="0" class="bodytable">
                      <tr><td>
                          <label> start_date</label>
                          <input type="date" name="start_date"/>
                      </td><td>
                          <label>end date</label>
                          <input type="date" name="end_date"/>
                           </td>
					  </tr><tr><td>
                          <label>new</label>
                          <input type="checkbox" name="new"/>
                       </td><td>
                         <label>forwarded</label>
                          <input type="checkbox" name="forwarded"/>
                       </td><td>
                        <label>closed</label>
                        <input type="checkbox" name="closed"/>
                     </td><td>
                        <label>analysis</label>
                       <input type="checkbox" name="analysis"/>
                    </td>
                   </tr>
                  <?php  
				  $result = mysql_query("SELECT * FROM  $table3")or die(mysql_error());
					while($raw1=mysql_fetch_array($result))	
						{ ?>
				   <tr><td>
				 	<p> <?php echo $raw1['Name']?></p>
                  <?php	
						$eachcenter=$raw1['Name'];
				  		$all=mysql_query("SELECT * FROM  $table WHERE center='$eachcenter' ")or die(mysql_error());
						
						$closed=mysql_query("SELECT * FROM  $table WHERE close_out='Closed' AND center='$eachcenter'")or die(mysql_error());
						$pclosed=($closed *100/$all);
						$completed=mysql_query("SELECT * FROM  $table WHERE scm_submision_date!='Incomplete'  AND center='$eachcenter'")or die(mysql_error());
						$pcompleted=($closed/$all)*100;
						$unsatisfatory=mysql_query("SELECT * FROM  $table WHERE close_out='New'  AND center='$eachcenter'")or die(mysql_error());
						$punsatisfatory=($closed/$all)*100;
						$complete=mysql_query("SELECT * FROM  $table WHERE close_out='Closed'  AND center='$eachcenter'")or die(mysql_error());
						$pcomplete=($closed/$all)*100;
				?>
				    </td>
					<td>		
		              <p><?php echo mysql_num_rows($all);?><p><br>
					</td>
                     <td>
		              <p><?php
					   echo number_format("$pclosed",2);
					  ?><p>
                    </td>
      				 <td>		
		             <p><?php echo number_format("$punsatisfatory",2);?><p>
                    </td>
					</tr>
                   <?php  } ?>
                    </table>  					 
					</div>
        </div>
  <?php include('footer.php')?>
	</div>

</body>

</html>