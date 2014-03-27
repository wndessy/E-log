<?php
include('../login/authentication.php');
include('../login/db_config.php');
?>
<html>
<title>Staff Home</title>
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
        <div class='homebody1'><?php
	            include('../headers/headertobe.php');
  
			   if($rank=='Senior Center Manager')
			          {include('../headers/scm_menu.php');}
			   else if($rank=='Center Manager')
			          {include('../headers/manager_menu.php');}
					  
			   elseif($rank=='System Admin')
			          {include('../headers/adminmenu.php');}
			    else
			          {include('../headers/staff_menu.php');}
			   ?>
			    
		    <div class='homebody2'>
					<p class='homepage'>Hello <?php echo $name ;?> Welcome to IAT e-log portal</p>
				    <p class='homepage'>This system allows you to read and responde to the NRL and CCRL logs </p>
				    <p class='homepage'>The operetion is almost exactly as the ususal manual log books</p>
					<p class='homepage'>the permisions and roles as per individuals rank as usual</p>
					<p class='homepage'>You can use the Menu above to navigate converniently as you wish </p>
					<p class='homepage'> Remebmer  to click the top right KEY image to log out once you are done </p>
					<p class='homepage'> for any notable comment on the system ,please send a mail to the adress on the footer  with the title e-Log </p>
					</div>
        </div>
  <?php include('footer.php')?>
	</div>
 </body>
</html>


