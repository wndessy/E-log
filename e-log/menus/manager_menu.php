<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../menus/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../menus/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
 <link rel = "stylesheet" href = "../menus/login.css" />

</head>

<body>
<!--<div class="menu" id="menu">-->
<ul id="MenuBar1" class="MenuBarHorizontal">
manager
  <li><a class="MenuBarItemSubmenu" href="#">CCRL</a>
    <ul> 
           <li name='all'><a href="http://localhost/e-log/CCRL/manager.report_summery.php">All</a></li>
           <li><a href="http://localhost/e-log/CCRL/manager.report_summerynew.php">New</a></li>
          <li><a href="http://localhost/e-log/CCRL/manager.report_summeryf.php">Forwarded</a></li>
               <li><a href="http://localhost/e-log/CCRL/manager.report_summery_closed.php">Closed</a></li>
               <li><a href="http://localhost/e-log/CCRL/manager.report_summery_completed.php">Comlpleted</a></li>
               <li><a href="http://localhost/e-log/CCRL/manager.report_summery_unsatisfactory.php">Unsatisfactory</a></li>
          </ul>
	  </li>
	  

	<li><a class="MenuBarItemSubmenu" href="#">NRL</a>
    <ul>
           <li><a href="http://localhost/e-log/NRL/manager.report_summery.php">All</a></li>
		        <li><a href="http://localhost/e-log/NRL/manager.report_summerynew.php">New</a></li>
                <li><a href="http://localhost/e-log/NRL/manager.report_summeryf.php">Forwarded</a></li>
               <li><a href="http://localhost/e-log/NRL/manager.report_summery_closed.php">Closed</a></li>
               <li><a href="http://localhost/e-log/NRL/manager.report_summery_completed.php">Comlpleted</a></li>
               <li><a href="http://localhost/e-log/NRL/manager.report_summery_unsatisfactory.php">Unsatisfactory</a></li>
          </ul>
	  </li>

  <li><a class="" href="#">Add Repport</a>
  <li><a class="" href="#">view Reports</a>
</ul>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>