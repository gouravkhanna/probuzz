// JavaScript Document

/*	dateDifference() checks if the start date is less than the end date, returns */
/*	true if difference between the dates is atleast 1. */
function dateDifference(start,end) {
	diff=(new Date(end).getTime()-new Date(start).getTime())/(1000 * 3600 * 24);
	if(diff>0) {
		return true;
	} else {
		return false;
	}
}
/*	isAlphaNumeric() checks if the input string is alphanumeric or not, returns true if the string is alphanumeric.	*/
function isAlphaNumeric(input) {
	var ck_username=/^\d*[a-zA-Z][a-zA-Z0-9]*$/;
	if(!ck_username.test(input)) {
		return false;
	} else {
		return true;
	}	
}
/*	onlySpaces() check if the input contains only spaces or not, returns true if string contains only spaces.	*/
function onlySpaces(input) {
	str=input;
	temp=str.replace(/\s/g,"");
	if(temp.length<1) {
		return true;
	} else {
		return false;
	}
}

$(document).ready(function() {
    $("#aelo").hide();
    $("#corp_account").click(function(){
window.location.href("corporates");
     	
    	
    });

    $("#forgetpassword").click(function(){
        $("#aelo").slideToggle();
       
    });
    $("#forgetnext").click(function () {
        if(!$("#forget_user_name").val()) {
			$("#forget_user_name").val("");
			$("#forget_user_name").attr("placeholder","User Name Can't Be Empty");
			$("#forget_user_name").css("background-color","#cff993");
			$("#forget_user_name").focus();
			return false;
		}
		if(onlySpaces($("#forget_user_name").val())) {
			$("#forget_user_name").val("");
			$("#forget_user_name").attr("placeholder","User Name Can't Contain Only Spaces");
			$("#forget_user_name").css("background-color","#cff993");
			$("#forget_user_name").focus();
			return false;
		}
		var temp=$("#forget_user_name").val();
		if(temp.length<6) {
			$("#forget_user_name").val("");
			$("#forget_user_name").attr("placeholder","User Name Too Short");
			$("#forget_user_name").css("background-color","#cff993");
			$("#forget_user_name").focus();
			return false;
		}
		$.ajax({
            type: "GET",
            url: "index.php",
            //data:"userName="+$("#forget_user_name").val()+"&controller=user&url=forgotPasswordEmail",
            data:"controller=user&url=forgotPasswordEmail",
            success: function(msg){
                alert(msg);
                //$("#").html(msg);
            }
        });
		return true;
    });
    
	document.getElementById( 'signup' ).addEventListener( 'click', function( event ) {
		
    event.preventDefault();
    document.getElementById( 'side-2' ).className = 'flip flip-side-1';
    document.getElementById( 'side-1' ).className = 'flip flip-side-2';
    
	}, false );

	document.getElementById( 'login1' ).addEventListener( 'click', function( event ) {
    event.preventDefault();
    document.getElementById( 'side-2' ).className = 'flip';
    document.getElementById( 'side-1' ).className = 'flip';
    
	}, false );
	
	$("#side-1").submit(function(){
		
		var uname=valid_uname1();
		var password=valid_password1();
		if(uname || password) {
			return true;
		} else {
			//return false;			UNCOMMENT THIS
		}
		
	});
});



/*	isAlphaNumeric() checks if the input string is alphanumeric or not, returns true if the string is alphanumeric.	*/
function isAlphaNumeric(input) {
	var ck_username=/^\d*[a-zA-Z][a-zA-Z0-9]*$/;
	if(!ck_username.test(input)) {
		return false;
	} else {
		return true;
	}	
}
/*	onlySpaces() check if the input contains only spaces or not, returns true if string contains only spaces.	*/
function onlySpaces(input) {
	str=input;
	temp=str.replace(/\s/g,"");
	if(temp.length<1) {
		return true;
	} else {
		return false;
	}
}
/*	dateDifference() checks if the start date is less than the end date, returns */
/*	true if difference between the dates is atleast 1. */
function dateDifference(start,end) {
	diff=(new Date(end).getTime()-new Date(start).getTime())/(1000 * 3600 * 24);
	if(diff>0) {
		return true;
	} else {
		return false;
	}
}
function lengthBetween() {
	
}

function valid_uname()
{
	var ck_username = /^[A-Za-z0-9_]{1,20}$/;
	var user_name1=document.forms["side-2"]["user_name1"].value;
	if(user_name1.length<6) 
	{
	document.getElementById("w6").style.visibility=" visible";
	document.getElementById("e6").style.visibility=" visible";
	document.getElementById("e6").innerHTML="* User Name must contain 6 characters ";
	return false; 
	}
	else if(user_name1.length>20) 
	{
	document.getElementById("w6").style.visibility=" visible";
	document.getElementById("e6").style.visibility=" visible";
	document.getElementById("e6").innerHTML="* User Name cannot contain more then 20 chracters ";

	return false; 
	}
	
	
//	else if(!ck_username.test(user_name1))
	else if(!isAlphaNumeric(user_name1))
		{
		
		document.getElementById("w6").style.visibility=" visible";
		document.getElementById("e6").style.visibility=" visible";
		document.getElementById("e6").innerHTML="* User Name is not in valid format ";

		return false;
		
		
		}
	 else
	 {
		 document.getElementById("r6").style.visibility=" visible";
		 document.getElementById("w6").style.visibility=" hidden";
		 document.getElementById("e6").style.visibility=" hidden";
		 return true; 

	 }


}

function valid_uname1()
{
	var ck_username=/^\d*[a-zA-Z][a-zA-Z0-9]*$/;
	var user_name1=document.forms["side-1"]["user_name"].value;

	if(user_name1.length<6) 
	{
	document.getElementById("w11").style.visibility=" visible";
	document.getElementById("e11").style.visibility=" visible";
	document.getElementById("e11").innerHTML="* User Name must contain 6 characters ";
	return false; 
	}
	else if(user_name1.length>20) 
	{
	document.getElementById("w11").style.visibility=" visible";
	document.getElementById("e11").style.visibility=" visible";
	document.getElementById("e11").innerHTML="* User Name cannot contain more then 20 chracters ";

	return false; 
	}
	
	
	else if(!isAlphaNumeric(user_name1))
		{
		
		document.getElementById("w11").style.visibility=" visible";
		document.getElementById("e11").style.visibility=" visible";
		document.getElementById("e11").innerHTML="* User Name is not in valid format ";

		return false;
		
		
		}
	 else
	 {
	 document.getElementById("r11").style.visibility=" visible";
	 document.getElementById("w11").style.visibility=" hidden";
	 document.getElementById("e11").style.visibility=" hidden";
	 return true; 

	 }


}


function valid_fname() // to check first name
{
var ck_name = /^[A-Za-z0-9 ]{2,20}$/;
var first_name=document.forms["side-2"]["first_name"].value;
if(first_name.length<2) 
{
document.getElementById("w1").style.visibility=" visible";
document.getElementById("e1").style.visibility=" visible";
document.getElementById("e1").innerHTML="*Name is too short";
return false; 
}

else if(!ck_name.test(first_name))
	{
	
	document.getElementById("w1").style.visibility=" visible";
	document.getElementById("e1").style.visibility=" visible";
	document.getElementById("e1").innerHTML="*Name is not in valid format";
	return false; 
	
	
	}
else if(first_name.length>20) 
{
document.getElementById("w1").style.visibility=" visible";

return false; 
}
  else
{
document.getElementById("r1").style.visibility=" visible";
document.getElementById("w1").style.visibility=" hidden";
document.getElementById("e1").style.visibility=" hidden";
return true; 

}
}

function valid_lname() // to check last name
{

var last_name=document.forms["side-2"]["last_name"].value;
if(last_name.length==0)
{
document.getElementById("w5").style.visibility=" visible";
document.getElementById("e5").style.visibility=" visible";
document.getElementById("e5").innerHTML="*Last Name cannot by empty";
return false; 
}
   else
{
document.getElementById("r5").style.visibility=" visible";
document.getElementById("w5").style.visibility=" hidden";
document.getElementById("e5").style.visibility=" hidden";
return true; 

}
}

function valid_password()
{
	var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
var pwd=document.forms["side-2"]["password1"].value;
var cpwd=document.forms["side-2"]["confirm_pass"].value;
if(pwd.length<6 )
	{
		document.getElementById("w3").style.visibility=" visible";
		document.getElementById("e3").style.visibility=" visible";
		document.getElementById("e3").innerHTML=" * Password must contain 6 characters";
		return false; 

	}
	
	else if (pwd.length>20)
	{
	
		document.getElementById("w3").style.visibility=" visible";
		document.getElementById("e3").style.visibility=" visible";
		document.getElementById("e3").innerHTML=" * Password cannot contain more then 20 characters";
		return false; 
	
	}
	else if(!ck_password.test(pwd))
		{
		
		document.getElementById("w3").style.visibility=" visible";
		document.getElementById("e3").style.visibility=" visible";
		document.getElementById("e3").innerHTML=" * Password is not in valid format";
		return false; 
		
		
		}
	else if(pwd.length>6)
	{
    	document.getElementById("r3").style.visibility=" visible"; 
		document.getElementById("w3").style.visibility=" hidden"; 
		document.getElementById("e3").style.visibility=" hidden";
		if(pwd!=cpwd)
		{
		 document.getElementById("w4").style.visibility=" visible";
		 document.getElementById("e4").style.visibility=" visible";
		document.getElementById("e4").innerHTML=" * Password not match";
	    return false;
		}
		else
		{
		
		document.getElementById("r4").style.visibility=" visible"; 
		document.getElementById("w4").style.visibility=" hidden"; 
		document.getElementById("e4").style.visibility=" hidden"; 
		}
		return true;
	}
	
}


function valid_password1()
{
	var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
var pwd=document.forms["side-1"]["password"].value;

if(pwd.length<6 )
	{
		document.getElementById("w12").style.visibility=" visible";
		document.getElementById("e12").style.visibility=" visible";
		document.getElementById("e12").innerHTML=" * Password must contain 6 characters";
		return false; 

	}
	
	else if (pwd.length>20)
	{
	
		document.getElementById("w12").style.visibility=" visible";
		document.getElementById("e12").style.visibility=" visible";
		document.getElementById("e12").innerHTML=" * Password cannot contain more then 20 characters";
		return false; 
	
	}
	else if(!ck_password.test(pwd))
		{
		
		document.getElementById("w12").style.visibility=" visible";
		document.getElementById("e12").style.visibility=" visible";
		document.getElementById("e12").innerHTML=" * Password is not in valid format";
		return false; 
		
		
		}
	else 	{
    	document.getElementById("r12").style.visibility=" visible"; 
		document.getElementById("w12").style.visibility=" hidden"; 
		document.getElementById("e12").style.visibility=" hidden";
		
		return true;
	}
	
}



function valid_email()
{
	var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/ ;
	var x=document.forms["side-2"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	
	 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	  {
		  
		document.getElementById("w2").style.visibility=" visible"; 
		document.getElementById("e2").style.visibility=" visible";
		document.getElementById("e2").innerHTML=" *Email is not valid";
		return false;

	   }
	 else if (!ck_email.test(x))
		 {
		 document.getElementById("w2").style.visibility=" visible"; 
			document.getElementById("e2").style.visibility=" visible";
			document.getElementById("e2").innerHTML=" *Email is not valid";
			return false;
		 
		 
		 }
	   else
	   {
	   document.getElementById("w2").style.visibility=" hidden"; 
	    document.getElementById("r2").style.visibility="visible";
		document.getElementById("e2").style.visibility=" hidden"; 
		return true;
	   }

	

}
function validLogin()
{

var u=valid_uname1();
var p=valid_password1();
if(!u && !p){
	return false;}
else {
	return true;
}

}


function valid()
{
var f=valid_fname();
var p=valid_password();
var e=valid_email();
var l=valid_lname();
var u=valid_uname();
if(!f)
{
 return false;
}

else if(!p)
{
 return false;
}
else if(!e)
{
 return false;
}
else if(!l)
{ 
return false;
	}

else if(!u){
	return false;
}
else
{
true;

}

}


	
	