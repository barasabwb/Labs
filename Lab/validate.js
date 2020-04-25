function validateForm(){

var fname = document.forms["user_details"]["first_name"].value;
var lname = document.forms["user_details"]["last_name"].value;
var cname = document.forms["user_details"]["city_name"].value;
if (fname==null||lname==""||cname=="") {
	alert("MISSING DETAILS!");
	return false;
}
return true;
}