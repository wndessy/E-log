


<?php
include ('../login/authentication.php');
include('../login/db_config.php');

$per_page = 5; 

//getting number of rows and calculating no of pages
$sql = "SELECT * FROM  $table WHERE close_out='New'";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>IAT e-log system</title>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
     <link rel='stylesheet' href='../css/mydefault.css' type='text/css'/> 
     <script src="/ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("pagination_data.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("pagination_data.php?page=" + pageNum, Hide_Load());
	});
	
	
});
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
     <div class="body"> <?php  include('../headers/headertobe.php');?>
	                <?php  
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
	  <div id='back'><FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"align='right'></FORM></div>
<div class='body2'>
<!-- CUSTOMER SECTION BEGINS HERE-->
 <body>

<table width="100%"  border="0" class="bodytable">
<?php	
?>
			
             <tr>
			 <div class="formheader">New Reports Summery</div>
                </tr>
				<tr>
					 <td><p for="report_no"> Report No.</p>
					 <td> <p for="report_date"> Report Date:</p>
					 <td>  <p for="cource_code"> Cource Code:</p>
					 <td><p for="status"> Center </p>
				 <tr>
          <?php
		  //for pagination
		
	 			
		    $result = mysql_query("SELECT * FROM  $table WHERE close_out='New'")or die(mysql_error());
		     while($row = mysql_fetch_array($result))
                { ?>
			    <tr>
				  <td><button value="<?php echo $row['report_no'];?>" onclick="showDtails('this.value')"><?php echo  $row['report_no'];?></button></td>
				  <td><p><?php echo $row['submision_date'];?></p></td>
				  <td><p><?php echo $row['cource_code'];?></p></td>
				  <td><p><?php echo $row['center'];?></p></td>
	 		   </tr>
			            <?php 
						//$search_index = 3;//$row['report_no'];
						  $r--;
                     }
			       
				$p =($q-$r);
				$s =($q+2);//for moving backwards
				$q = $r;//for moving forward ie down the index
		  
		?>
  
		     </tr>
			 <tr> 
				    <form method="post" action="no_edit_view.php">
				<td><input type="text" name="search_index" onkeyup='allert()'></input>
				<script>
				function allert()
				{
				  allert("please ennter only the index of reports currently displayed on this page");
				}
				</script>
				    <button id="btn1">EXPLORE</button></td></br>
					<p id='me'>this is me</p>
				    </form>
				<button value="<?php $q;?>" onclick="next1('<?php $q;?>')"id="btn1">NEXT</button></td></br>
               <button value="<?php $s;?>" onclick="check(scm_report_summery_new.php,this.value)"id="btn1">BACK</button></td></br>				
             </tr>
             </table>
        </div>
		</div>
		<?php include('../headers/footer.php')?>
		</div>
		</body>
    </html>










