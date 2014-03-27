function validateForm()
{
   if( document.myForm.name.value == "" )
       {
      alert("Name must be filled out");
	  	document.myForm.phone.focus();
     return false;
       }
  if (document.myForm.email.value == "")
      {
      alert("Email must be filled out");
	  	 	document.myForm.email.focus();
     return false;
	  }	 	
 if (document.myForm.myForm.value == "")
      {
      alert("Phone must be filled out");
	  	 	document.myForm.phone.focus();
     return false;
      }
if (document.myForm.Department.value == -1)
      {
      alert("Department must be filled out");
	  	 	document.myForm.Department.focus();
     return false;
      }
 if (document.myForm.Rank.value == -1)
      {
      alert("Rank must be filled out");
	  	 	document.myForm.Rank.focus();

     return false;
      }
 if (document.myForm.password.value == "")
      {
      alert("Password1 must be filled out");
	  	 	document.myForm.password.focus();
     return false;
      }
  if (document.myForm.password2.value == "")
      {
      alert("Password2 must be filled out");
	  	 	document.myForm.password2.focus();
     return false;
      }
if (document.myForm.password2.value != document.myForm.password.value )
      {
      alert("Tha two passwords must be the same");
	  	 	document.myForm.password.focus();
		 document.myForm.password2.focus();

     return false;
      }
}
// for validating manager input
function validate_manager_form()
{
 if( document.manager.major_minor.value == -1 )
       {
      alert("Name indicate whether major or minor");
	  	document.manager.major_minor.focus();
     return false;
     }
	 if( document.manager.root_cause.value == "" )
       {
      alert("root cause field must not be emptyt");
	  	document.manager.phone.focus();

     return false;}
 if( document.manager.corective_measure.value == "" )
       {
      alert("corective_measure must be filled out");
	  	document.manager.corective_measure.focus();
     return false;}
 if( document.manager.preventive_action.value == "" )
       {
      alert("preventive_action must be filled out");
	  	document.manager.preventive_action.focus();
     return false;
	 }
 if( document.manager.investigated_by.value == "" )
       {
      alert("investigated_by must be filled out");
	  	document.manager.investigated_by.focus();

     return false;}
	 
	 if( document.manager.close_out.value == -1 )
       {
      alert("investigated_by must be filled out");
	  	document.manager.close_out.focus();
     return false;
	 }
}
// for validating customer inputs
function validate_customer_form()
  {
if( document.Customer.customer_name.value == "" )
       {
      alert("Name must be filled out");
	  	document.Customer.customer_name.focus();
     return false;
	  }
if( document.Customer.customer_telephone.value == "" )
       {
      alert("Telephone number must be filled out");
	  	document.Customer.customer_telephone.focus();
     return false;
	  }
var x=document.Customer.email.value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length ||x=="")
         {
      alert("Not a valid Email adress");
	  	document.Customer.customer_email.focus();
      return false;
	     }
if( document.Customer.Center.value == -1 )
        {
      alert("Center must be filled out");
	  	document.Customer.Center.focus();
     return false;
	   }
if( document.Customer.cource_code.value == -1 )
      {
      alert("Cource code must be filled out");
	  	document.Customer.cource_code.focus();
     return false;
	  }
if( document.Customer.Complain.value == "" )
     {
      alert("please type your coplain");
		document.Customer.Complain.focus();
     return false;
	 }
  alert ("Thanks for submitting your complaint. we will commmunicate to you as soon as we  shall attend to your complain");
}


// for validating staff form
function validate_staff_form()
{
if( document.staff.Log_Type.value == -1 )
       {
      alert("Logtype must be filled out");
	  	document.staff.Log_Type.focus();
     return false;
	 }
	 if( document.staff.Target_Department.value == -1 )
       {
      alert("Target center must be filled out");
	  	document.staff.Target_Department.focus();
     return false;
	 }
	 if( document.staff.Complain.value =="")
       {
      alert("Please type your report before submitting");
	  	document.staff.Complain.focus();
     return false;
	 }
	 alert('Your report has been submitted successfully');
}

function setCaretPosition(elemId, caretPos) {
    var elem = document.getElementById(elemId);

    if(elem != null) {
        if(elem.createTextRange) {
            var range = elem.createTextRange();
            range.move('character', caretPos);
            range.select();
        }
        else {
            if(elem.selectionStart) {
                elem.focus();
                elem.setSelectionRange(caretPos, caretPos);
            }
            else
                elem.focus();
        }
    }
}



// var pattern = /^\(\d{3}\)\s*\d{3}(?:-|\s*)\d{4}$/
// if (pattern.test(string)) {
    // // string looks like a good (US) phone number with optional area code, space or dash in the middle
	// document.form.phone.focus();

// }
