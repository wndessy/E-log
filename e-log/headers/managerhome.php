




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
		    <div class='homebody2'>
					<p class='homepage'>Hello <b><?php echo $name ;?></b> Welcome to IAT e-log system</br>
				    This system allows you to read and respond to the Non-compliance Report 
					and Customer Comlpaint Report Logs(CCRL and NRL) . 
				    The operation is almost exactly as the usual manual log books</br><br>
			        Remebmer  to click the top  left LOCK AND KEY image to log out once you are done </br>
				    For any notable comment on the system ,please send an email to
					wndessy@gmail.com.</br> Note that the system is  currently under testing </p>
					</div>
        </div>
  <?php include('footer.php')?>
	</div>

</body>

</html>