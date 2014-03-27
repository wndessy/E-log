
<?php
include'../login/authentication.php';
include('../login/db_config.php');
?>

<html>
<head>
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
xmlhttp.open("GET","../login/adminpanel.php?q="+str,true);
xmlhttp.send();
}
</script>


</head>
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


<link rel='stylesheet' href='../css/mydefault.css' type='text/css'/>  
</head>
<body>
  <div class='homebody'>
        <div class='homebody1'>
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
		<div class='homebody1'>
		<div class='homebody2'>
					<p>Hello <?php echo $name ;?> Welcome to IAT e-log System</p>
					<select name="close_out" onchange="nextbutton(this.value)">
								   <option value="-1">choose what to do</option>
								   <option value="a">Manage Users</option>
								   <option value="b">Courses </option>
								   <option value="c">Centers</option>
								   <option value="d">Department</option>
							</select></br>
			            <div id="txtHint"><b></b></div>

			   </div>
               </div>
		<?php include('../headers/footer.php')?>
		</div>
    </html>
