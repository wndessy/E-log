<html>
<head>
<link rel='stylesheet' href='i-suggest_form.css' type='text/css' />  
<script src='../js/validate_form.js'></script>



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

    
<script>
function showUser(str)
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
xmlhttp.open("GET","customer_data.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<div class="body">
<?php
include('../login/alogin.php'); 
?>
<div class="logo"> <img src='../images/logo.jpg'></div>


<?php
 include('../headers/headertobe.php');
?>
<body>

<div class="homebody2">

        <form id="customer" name='Customer' action="customer.be.php" method="POST"  onsubmit="return validate_customer_form()" >



			 <label for="customer_name" autofocus> Your  Name: </label>
             <input type="text" name="customer_name" maxlength="30" placeholder="Your two names"
			 required="required" size="20"></br>
	 
			 <label for="customer_name"> Your Telephone: </label>
             <input type="text" name="customer_telephone" maxlength="30" placeholder="Your daitime mobilephone no"
			 required="required">
		    </br>
			 <label for="customer_email"> Your Email: </label>
             <input type="text" name="customer_email" maxlength="30" placeholder="Your email address"
			 required="required" >
			 </br>
			   <label for="Center"> Center: </label>
					<select  name="Center" onchange="showUser(this.value)" >
						<option  value='-1'> --Center--</option>
									<?php
									$result = mysql_query("SELECT * FROM $table3")or die(mysql_error());
									while($row =mysql_fetch_array($result))
									      { 
                                        $center = $row ['Name'];				
									       ?>
					     <option  value='<?php echo $center ;?>'> <?php echo $center ;?> </option>
							       <?php  }  ?>
								   <option value='other'>Other</option>
					</select></br>
					

			  </label><div id="txtHint"><b>choose a Center above for corrce codes.</b></div>
            </br>
	   		 <label for="complain">Complain: </label>
		    <textarea name="Complain" id="Complain" contenteditable="true" spellcheck="true" placeholder="Enter your complain "
			           maxlength="300">
			 </textarea>

</br>

        <input type="submit" name="submit" value="submit" />

</form>
     
		</div>
		<?php include('../headers/footer.php')?>
		</div>
    </html>
