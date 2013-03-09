// JavaScript Document


$(document).ready(function() {
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
});

function valid_uname()
{
	
	var user_name1=document.forms["side-2"]["user_name1"].value;
	if(user_name1.length<6) 
	{
	document.getElementById("w6").style.visibility=" visible";
	document.getElementById("e6").style.visibility=" visible";
	document.getElementById("e6").innerHTML="* User Name must contain 6 characters ";
	return false; 
	}
	else if(user_name1.length>30) 
	{
	document.getElementById("w6").style.visibility=" visible";

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

function valid_fname() // to check first name
{

var first_name=document.forms["side-2"]["first_name"].value;
if(first_name.length<2) 
{
document.getElementById("w1").style.visibility=" visible";
document.getElementById("e1").style.visibility=" visible";
document.getElementById("e1").innerHTML="*Name must be 6 characters long";
return false; 
}
else if(first_name.length>30) 
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



function valid_email()
{

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
	   else
	   {
	   document.getElementById("w2").style.visibility=" hidden"; 
	    document.getElementById("r2").style.visibility="visible";
		document.getElementById("e2").style.visibility=" hidden"; 
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