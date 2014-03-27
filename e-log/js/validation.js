var x = document.forms["myForm"]["fname"].value;
        if (x == null || x == "")
{
alert("First name must be filled out");
}
function validateForm()
        {
        var x = document.forms["myForm"]["email"].value;
                var atpos = x.indexOf("@");
                var dotpos = x.lastIndexOf(".");
                if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)
        {
        alert("Not a valid e-mail address");
                return false;
        }
        }