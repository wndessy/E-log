<?php
include'../login/authentication.php';
include('../login/db_config.php');
?>

<html>
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
	<?php  include('../headers/headertobe.php');
?>
        <div class='homebody1'>
		<?php
        include('../headers/scm_menu.php');?>

        <div class='homebody2'>
                <p class='homepage'>Hello <b><?php echo $name ;?></b> Welcome to IAT e-log portal</br>
				    This system allows you to read and responde to the NRL and CCRL logs </br>
				    The operetion is almost exactly as the ususal manual log books</br>
			        Remebmer  to click the top right KEY image to log out once you are done </br>
				   for any notable comment on the system ,please send a mail to</br>
					the adress on the footer  with the title e-Log </p>
					</tr>
			</div>
        </div>

    
  <?php include('footer.php')?>
  </div>

</body>

</html>