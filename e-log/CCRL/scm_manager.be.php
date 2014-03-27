<?php
include'../login/authentication.php';
include('../login/db_config.php');


$corective= mysql_real_escape_string($_POST['corective']);
$preventive= mysql_real_escape_string($_POST['preventive']);
$selected=mysql_real_escape_string($_POST['search_index']);
$date =mysql_real_escape_string (date("d-m-y"));

		mysql_query("UPDATE $table
                    SET scm_corective_coment = '$corective',scm_preventive_coment='$preventive',scm_inchargeh='$name',scm_submision_date='$date'
                    WHERE report_no='$selected'") or die("imekataa".mysql_error());
		
			   //sending an email to the customer AND center='$Center'
	   $email_adresses = mysql_query("SELECT * FROM $table1 WHERE report_no='$selected' AND center='$Center'");
            if($row = mysql_fetch_array($email_adresses))
                {
					 $to = "$row[email]";
					 $subject = "CCRL Report solution unsatisfactory";
					 $txt = "Dear"+$row ['name']+"thank you for raising a complain concerning"+$row ['Complain ']+"we appologise for the inconvenience 
					 caused by this issue,we are pleased to inform you that a satisfactory corrective action has been taken.
					 we value your feedback,please let us know if there is anything further we can do so as to be of assistance.
					 Thank you for your understanding and support.
					 IAT your success is our responsibility.
					 Best regards.";
					 $headers =frommail($row['scm_inchargeh']);  // "From: e-log@iat.com " . "\r\n" ."CC: cc($email_adresses)";
					  mail($to,$subject,$txt,$headers);
				 

					   if($corective='No' or $preventive='No')  //for sending an email to the center manager concerned
						{
						  $to = "$row[email]";
						  $subject = "CCRL Report solution unsatisfactory";
						  $txt = "Hallo Mr/Mrs"+$row ['scm_inchargeh']+"this is to notify you that either the corrective,
								 preventive or both approaches you reccommended for the customer report numbber"
								 +$selected +"is unsatisfactory to the scm.please have a look at it again.thank you";
						 $headers = "From: e-log@iat.com " . "\r\n" ."CC: cc($email_adresses)";
						  mail($to,$subject,$txt,$headers);
						}
				}
	   		header('location:../CCRL/scm_report_summery_closed.php');
			
			   function frommail($name)
			   {//a function for getting the email given the name of the manager concerned
			   $sql="SELECT * FROM $table2 WHERE Id='$Staffid'";
                 mysql_query($sql) or die("imekataa".mysql_error());
                    if ($myrow=mysql_fetch_array($result))
                      return $myrow['email'];
			  }

?>