// Corporate Validations.....

/* to check company valid name	*/
function valid_company() {
	var company_name=document.forms["side-3"]["company_name"].value;
	if(company_name.length<=2) {
		document.getElementById("w1").style.visibility=" visible";
		document.getElementById("e1").style.visibility=" visible";
		document.getElementById("e1").innerHTML="*Company name is not valid.";
		return false; 
	} else if(company_name.length>20) {
		document.getElementById("w1").style.visibility=" visible";
		return false; 
	} else {
		document.getElementById("r1").style.visibility=" visible";
		document.getElementById("w1").style.visibility=" hidden";
		document.getElementById("e1").style.visibility=" hidden";
		return true; 
	}
}
function isAlphaNumeric(input) {
    var ck_username=/^\d*[a-zA-Z][a-zA-Z0-9]*$/;
    if(!ck_username.test(input)) {
        return false;
    } else {
        return true;
    }   
}

/* to check company alias	*/
function valid_corpuser() {
	var user_name=document.forms["side-3"]["user_name"].value;
	var ck_username = /^[A-Za-z0-9_]{1,20}$/;
	if(user_name.length<6) {
		document.getElementById("w2").style.visibility=" visible";
		document.getElementById("e2").style.visibility=" visible";
		document.getElementById("e2").innerHTML="* User Name must contain 6 characters ";
		return false; 
	} else if(user_name.length>20) {
		document.getElementById("w2").style.visibility=" visible";
		document.getElementById("e2").style.visibility=" visible";
		document.getElementById("e2").innerHTML="* User Name cannot contain more then 20 chracters ";
		return false; 
	} else if(!isAlphaNumeric(user_name)) {
		document.getElementById("w2").style.visibility=" visible";
		document.getElementById("e2").style.visibility=" visible";
		document.getElementById("e2").innerHTML="* User Name is not in valid format ";
     	return false;
	} else {
		document.getElementById("r2").style.visibility=" visible";
		document.getElementById("w2").style.visibility=" hidden";
		document.getElementById("e2").style.visibility=" hidden";
		return true; 
	}

}

/*	to check company alias	*/
function valid_location() {
	var location=document.forms["side-3"]["Location"].value;
	if(location.length<=2) {
		document.getElementById("w3").style.visibility=" visible";
		document.getElementById("e3").style.visibility=" visible";
		document.getElementById("e3").innerHTML="*Location is not valid";
		return false; 
	} else if(location.length>20) {
		document.getElementById("w3").style.visibility=" visible";
		return false; 
	} else {
		document.getElementById("r3").style.visibility=" visible";
		document.getElementById("w3").style.visibility=" hidden";
		document.getElementById("e3").style.visibility=" hidden";
		return true; 
	}
}

	
function valid_corpemail()
{
	var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/ ;
	var x=document.forms["side-3"]["corp_email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		document.getElementById("w4").style.visibility=" visible"; 
		document.getElementById("e4").style.visibility=" visible";
		document.getElementById("e4").innerHTML=" *Email is not valid";
		return false;
    } else if (!ck_email.test(x)) {
		document.getElementById("w4").style.visibility=" visible";
		document.getElementById("e4").style.visibility=" visible";
		document.getElementById("e4").innerHTML=" *Email is not valid";
		return false;
	} else {
		document.getElementById("w4").style.visibility=" hidden"; 
	    document.getElementById("r4").style.visibility="visible";
		document.getElementById("e4").style.visibility=" hidden"; 
		return true;
	}
}

function valid_corppassword() {
	var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
	var pwd=document.forms["side-3"]["company_password"].value;
	var cpwd=document.forms["side-3"]["comp_confirm_pass"].value;
	if(pwd.length<6 ) {
		document.getElementById("w5").style.visibility=" visible";
		document.getElementById("e5").style.visibility=" visible";
		document.getElementById("e5").innerHTML=" * Password must contain atleast 6 characters.";
		return false; 
	} else if (pwd.length>20) {
		document.getElementById("w5").style.visibility=" visible";
		document.getElementById("e5").style.visibility=" visible";
		document.getElementById("e5").innerHTML=" * Password cannot contain more than 20 characters.";
		return false; 
	} else if(!ck_password.test(pwd)) {
		document.getElementById("w5").style.visibility=" visible";
		document.getElementById("e5").style.visibility=" visible";
		document.getElementById("e5").innerHTML=" * Password is not in valid format";
		return false; 
	} else {
    	document.getElementById("r5").style.visibility=" visible"; 
		document.getElementById("w5").style.visibility=" hidden"; 
		document.getElementById("e5").style.visibility=" hidden";
		if(pwd!=cpwd) {
			document.getElementById("w6").style.visibility=" visible";
			document.getElementById("e6").style.visibility=" visible";
			document.getElementById("e6").innerHTML=" * Password not match";
			return false;
		} else {
			document.getElementById("r6").style.visibility=" visible"; 
			document.getElementById("w6").style.visibility=" hidden"; 
			document.getElementById("e6").style.visibility=" hidden"; 
		}
		return true;
	}
	return true;
	
}

function validcorp(){
	var c=valid_company();
	var alias=valid_corpuser();
	var location=valid_location();
	var pwd=valid_corppassword();
	var email= valid_corpemail();
	if(!c) {
		return false;
	} else if(!pwd)	{
		return false;
	} else if(!alias) {
		return false;
	} else if(!location) {
		return false;
	} else if(!email) {
		return false;
	} else {
		return true;
	}
}