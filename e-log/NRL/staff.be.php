<?php

include'../login/authentication.php';
include('../login/db_config.php');

$Log_Type = clean($_POST['Log_Type'], $encode_ent = false);
$Target_center = clean($_POST['Target_center'], $encode_ent = false);
$Complain = clean($_POST['Complain'], $encode_ent = false);
$Reporter_id = clean($_POST['Reporter_id'], $encode_ent = false);
$date = date("d-m-y");
mysql_query("insert into $table1(report_no,log_type,Target_center,complain,submision_date,Reporter_Index)
			values('','$Log_Type','$Target_center','$Complain','$date','$Reporter_id')") or die(mysql_error() . "db connection failed");
header('location:staff.php');

//THE MAIN LOOP FOR CALCULATING THE INTERVAL FOR REMINDER EMAIL
$check = mysql_query("SELECT * FROM $table WHERE close_out='New' or close_out='Forwarded'");
While ($row = mysql_fetch_array($check)) {
    $then = strtotime($raw['submision_date']);
    $now = strtotime(date(y - m - d));
    while ($then >= $now) {
        if ($then == $now) {
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            //for sending an email to the center manager concerned
            $email_adresses = mysql_query("SELECT * FROM $table1 WHERE Rank ='Center-manager' and Center=$Center");
            if ($row === mysql_fetch_array($email_adresses)) {
                $to = "$row[email]";
                $subject = "New CCRL Report";
                $txt = "Hello Mr/Ms $row[name],there is a  report submited on $date that has not been attended to.Thank you";
                $headers = "From: e-log@iat.com " . "\r\n" . "CC: cc($email_adresses)";
                mail($to, $subject, $txt, $headers);
            }
            $then = strtotime($then . "+ 3days");
        }
    }

    //a function loop for fetching cc email adresses

    function cc($email_adresses) {
        while ($row = mysql_fetch_array($email_adresses)) {
            /* @var $row type */
            $email = $row ['email'];
            if ($email === $email_adresses) {
                continue;
            }
        }
    }
}
