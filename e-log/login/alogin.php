<!DOCTYPE  html>


<html>
<head>
<?php 
include('login/db_config.php');
?>
		
		<title>IAT E-Log</title>
		<!-- CSS -->

    <div class="header">
<form method="post" class="form-horizontal">
    <div class="control-group">
    <input type="text" name="email"  placeholder="Email" class='login'>
    <input type="password" name="password" placeholder="Password" class='login'> 
    <button type="submit" name="login" class="btn btn-success">&nbsp;Sign in</button>
    <button style="alignment-adjust:'right'" type = "reset" id = "log_in_reset_button"> <i class = "icon-remove"></i>&nbsp;&nbsp;Reset</button>
    </div>
    </form>
		

     <?php

     if (isset($_POST['login']))
	    {
				$email= $_POST['email'];
				$password=$_POST['password'];

				$teph_query= mysql_query("select *from $table2 where Email = '$email'  and Password = '$password' ") or die(mysql_error());
				$count= mysql_num_rows($teph_query);
				$row=mysql_fetch_array($teph_query);

				//pass logged in user name to a $user_id variable
		    $user_id=$row['Id'];
			$name=$row['Name'];
			$email=$row['Email'];
			$Center=$row['Center'];
			$Rank=$row['Rank'];
			$department=$row['department'];
			if ($count > 0) 
			{
        session_start();
						//initialize session variable that you can add on any page
						$_SESSION['id'] = $user_id;
						$_SESSION['name']=$name;
						$_SESSION['email']=$email;
						$_SESSION['center']=$Center;
						$_SESSION['rank']=$Rank;
						$_SESSION['department']=$department;
						//The main page where the user is ridirected to after a successful login.... u can use .phpfilename.php if it is outside the folder
						//eg have used home.php
						            if($row['Rank']=='System Admin')
                                          header('location:headers/adminhome.php');
									else
									     header('location:headers/managerhome.php');
								
					    }else
					    { ?>
          <div class="alert alert-error">
       Please check your Username and Password
       </div>
            <?php
                     }
	       }
    session_write_close();
   ?>
</div>   
</html>