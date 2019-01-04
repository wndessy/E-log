<?php

$mysql_hostCource_code = "dbhost";
$mysql_user = "dbuser";
$mysql_password = "dbpassword";
$mysql_database = "e-log";
 $table='customer_complain';
 $table1='nrl';
 $table2='stagff';
 $table3='centers';
 $table4='logtypes';
 $table5='courses';
 $table6='departments';

 $date = date("d-m-y");

$connect = mysql_connect($mysql_hostCource_code, $mysql_user, $mysql_password) or die("not connected".mysql_error());
        mysql_select_db($mysql_database, $connect) or die("imekataa kata kata, kuunganisha database".mysql_error());
		
		//THE BEGINING OF ESSENTIAL FUNCTIONS
function clean($str, $encode_ent = false)//for sanitizing the input
    {
	   $str = @trim($str);
        if($encode_ent) 
		  { 
		  $str = htmlentities($str);
		  }
      if(version_compare(phpversion(),'4.3.0') >= 0)
        {
        if(get_magic_quotes_gpc())
        { 
      $str = stripslashes($str);
        }
		if(@mysql_ping())
         { 
		 $str = mysql_real_escape_string($str); 
		 }
        else { $str = addslashes($str); 
		     }  
	    } else 
		
	    { 
		if(!get_magic_quotes_gpc()) 
		  { $str = addslashes($str); 
		   } 
		} return $str;
	}
				
?>
