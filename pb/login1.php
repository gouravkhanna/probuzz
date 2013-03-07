<?php
include 'class/users.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProBuzZ</title>
<link rel="stylesheet" href="style/f1.css" />
<script src="js/jquery-1.9.1.min.js"> </script>

<script src="js/login.js"></script>
<script type="text/javascript">
function valid()
{

	var user_name=document.forms["side-2"]["user_name1"].value;
	var pwd=document.forms["side-2"]["password1"].value;
	var cpwd=document.forms["side-2"]["confirm_pass"].value;
	var x=document.forms["side-2"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	
	if(user_name.length<6)
	{
		document.getElementById("user_name1").style.borderColor="red";
		document.getElementById("w1").style.visibility=" visible"; 
	
	}
	else
	{
		document.getElementById("r1").style.visibility=" visible"; 
		document.getElementById("w1").style.visibility=" hidden"; 
		document.getElementById("user_name1").style.borderColor="#FF66FF";

	}
		
	if(pwd.length<6)
	{
		document.getElementById("password1").style.borderColor="red";
		document.getElementById("w3").style.visibility=" visible"; 

	}
	else
	{

		document.getElementById("r3").style.visibility=" visible"; 
		document.getElementById("w3").style.visibility=" hidden"; 
		document.getElementById("password1").style.borderColor="#FF66FF";

		}
	
	/* if(pwd.length>16)
	{
		document.getElementById("password1").style.borderColor="red";
		document.getElementById("w3").style.visibility=" visible"; 

	}
	 else
		{

			document.getElementById("r3").style.visibility=" visible"; 
			document.getElementById("w3").style.visibility=" hidden"; 
			document.getElementById("password1").style.borderColor="#FF66FF";

			}
	 
	
	 if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	  {
		  
		document.getElementById("email").style.borderColor="red";
		document.getElementById("w2").style.visibility=" visible"; 
		return false;

	   }
*/
	

}



</script>
</head>

<body>
<div id="wrapper">
<form id="side-1" class="flip" method="GET" action="index.php">
   
   <div id="1">
    <h2> Login into your Account! </h2> 
<input type="text" name="user_name" id="user_name" autocomplete="off" placeholder="User Name" />
<br />
<br />

<input type="password" name="password" id="password"  placeholder="Password"  />

<br />
<br>
    <a href="#"> Forget Password ?</a>
<input type="submit" id="submit" name="submit" value="BuZZIN" />
<br />
<br /> <p> Dont you have an account ? <a id="signup" href="#">SignUp Now </a>
</p>
   </div> 
</form>

<form id="side-2" class="flip"  method="post" name="side-2">
    <div id="2"><h2> Signup with your email.... </h2>
    
   <input type="text" name="user_name1" id="user_name1"  autocomplete="off" placeholder="User Name" />
   <span id="r1" name="r1"> <img src="right.jpg" height="30px" width="30px" /> </span> <span id="w1"> <img src="wrong.jpeg" height="30px" width="30px" /> </span> <br/>
      <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" /> 
      <span id="r2" name="r2"> <img src="right.jpg" height="30px" width="30px" /> </span> <span id="w2" name="w2"> <img src="wrong.jpeg" height="30px" width="30px" /> </span> 
      <br />
   <input type="password" name="password1" id="password1" autocomplete="off" placeholder="Password" />
   <span id="r3" name="r3"> <img src="right.jpg" height="30px" width="30px" /> </span> <span id="w3" name="w4"> <img src="wrong.jpeg" height="30px" width="30px" /> </span> 
    <br />
   <input type="password" name="confirm_pass" id="confirm_pass" autocomplete="off" placeholder="Confirm Password" /> 
   <span id="r4" name="r4"> <img src="right.jpg" height="30px" width="30px" /> </span> <span id="w4" name="w4"> <img src="wrong.jpeg" height="30px" width="30px" /> </span><br />
    <p> Already have an account? <a href="" id="login1"> Login </a> </p>
      <input type="button" id="create" name="create" value="SIGN UP" onclick ="valid()" />   </div>
</form>
</div>
</body>


</html>