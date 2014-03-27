function next(pagename,index)
  {
	   xmlhttp.onreadystatechange=function()
         {    
         xmlhttp.open("GET","senior_center_manager.php?q="+index,true);
         xmlhttp.send();

         }
     }
//for checking the value to be explored
function check(pagename,index,q,r)
    {
	   if( q > index ||index < r)
	   allert("please ennter only the index of reports currently displayed on this page");
    }
	 
