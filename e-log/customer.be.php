<?php	
include('login/db_config.php');
$name=clean($_POST['customer_name'], $encode_ent = false);
$phone=clean($_POST['customer_telephone'], $encode_ent = false);
$email=clean($_POST['customer_email'], $encode_ent = false);
$code=clean($_POST['cource_code'], $encode_ent = false);
$Center=clean($_POST['Center'], $encode_ent = false);
$Complain=clean($_POST['Complain'], $encode_ent = false);
mysql_query("insert into $table(report_no,name,email,phone,cource_code,center,complain,submision_date)
			values('','$name','$email','$phone','$code','$Center','$Complain','$date')")or die(mysql_error('db connection failed'));
		    header('location:index.php');

		//THE MAIN LOOP FOR CALCULATING THE INTERVAL FOR REMINDER EMAIL
   $check = mysql_query("SELECT * FROM $table WHERE close_out='Not Yet Analysed' or close_out='Forwarded'");
     if($row=mysql_fetch_array($check))
	 {
       $compute=($raw['submision_date']-$date);
	     if($compute%5==0)
		   {
		
                 // Always set content-type when sending HTML email
                 $headers = "MIME-Version: 1.0" . "\r\n";
                 $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                  //for sending an email to the center manager concerned
                 $email_adresses = mysql_query("SELECT * FROM $table1 WHERE Rank ='Center-manager' and Center=$Center");
                 if($row = mysql_fetch_array($email_adresses))
                  {
				 $to = "$row[email]";
				 $subject = "New CCRL Report";
				 $txt = "Hello Mr/Ms $row[name],there is a  report submited on $date that has not been attended to.Thank you";
				 $headers = "From: e-log@iat.com " . "\r\n" ."CC: cc($email_adresses)";
				  mail($to,$subject,$txt,$headers);
				  }
				}
		}
				
				//a function loop for fetching cc email adresses

				function cc($email_adresses)
					  {
					 while($row=mysql_fetch_array($email_adresses))
						  {
						$email= $raw ['email'] ;
						if ($email==$email_adresses)
						continue;
						  }
					   }

				?>