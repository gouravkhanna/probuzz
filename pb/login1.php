<?php
include 'class/dbAcess.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProBuzZ</title>
<link rel="stylesheet" href="style/f1.css" />
<script src="js/jquery-1.9.1.min.js"> </script>

<script src="js/login.js"></script>
<script src="js/validation.js"></script>
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
<form id="side-2" class="flip">
    <div id="2"><h2> Signup with your email.... </h2>
    
   <input type="text" name="first_name" id="first_name"  autocomplete="off" placeholder="First Name" /><br />
   <input type="text" name="last_name" id="last_name" autocomplete="off" placeholder="Last Name" /> <br />
   <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" /> <br />
   <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" /> <br />
   <input type="password" name="confirm_pass" id="confirm_pass" autocomplete="off" placeholder="Confirm Password" /> <br />
    <p> Already have an account? <a href="" id="login1"> Login </a> </p>
      <input type="submit" id="create" value="SIGN UP" />
   </div>
</form>
</div>
</body>


</html>
