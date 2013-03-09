<?php
include 'class/users.php';
include_once 'class/lang/lang.en.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProBuzZ</title>
<link rel="stylesheet" href="style/f1.css" />
<script src="js/jquery-1.9.1.min.js"> </script>

<script src="js/login.js"></script>

</head>

<body>
<div id="wrapper">
<form id="side-1" class="flip" method="GET" action="index.php">
   
   <div id="1">
    <h2> <?php echo LOGIN; ?> </h2> 
<input type="text" name="user_name" id="user_name" autocomplete="off" placeholder="User Name" />
<br />
<br />

<input type="password" name="password" id="password"  placeholder="Password"  />

<br />
<br>
    <a href="#"> <?php echo FORGET_PASSWORD; ?></a>
<input type="submit" id="submit" name="submit" value="BuZZIN" />
<br />
<br /> <p> <?php echo ACCOUNT_INFO; ?> <a id="signup" href="#"><?php echo SIGNUP;?> </a>
</p>
   </div> 
</form>

<form id="side-2" class="flip"  method="post" name="side-2" onsubmit=" return valid()" action="registerindex.php">
    <div id="2"><h2> Signup with your email.... </h2>
    
     <input type="text" name="user_name1" id="user_name1"  autocomplete="off" placeholder="User Name" onblur="return  valid_uname()" />
   <span id="r6" name="r6"> <img src="data/rcs/r.png" height="30px" width="30px" /> </span> <span id="w6"> <img src="data/rcs/w.png" height="30px" width="30px" /> </span><span id="e6" name="e6"> </span> <br/>
   <input type="text" name="first_name" id="first_name"  autocomplete="off" placeholder="First Name" onblur="return  valid_fname()" />
   <span id="r1" name="r1"> <img src="data/rcs/r.png" height="30px" width="30px" /> </span> <span id="w1"> <img src="data/rcs/w.png" height="30px" width="30px" /> </span><span id="e1" name="e1"> </span> <br/>
    <input type="text" name="last_name" id="last_name"  autocomplete="off" placeholder="Last Name" onblur="return  valid_lname()"/>
   <span id="r5" name="r5"> <img src="data/rcs/r.png" height="30px" width="30px" /> </span> <span id="w5" name="w5"> <img src="data/rcs/w.png" height="30px" width="30px" /> </span><span id="e5" name="e5"> </span>  <br/>
      <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" onblur="return valid_email()" /> 
      <span id="r2" name="r2" id="r2"> <img src="data/rcs/r.png" height="30px" width="30px" /> </span> <span id="w2" name="w2" name="w2"> <img src="data/rcs/w.png" height="30px" width="30px" /> </span> <span id="e2" name="e2"> </span>
      <br />
   <input type="password" name="password1" id="password1" autocomplete="off" placeholder="Password" onblur="return  valid_password()" />
   <span id="r3" name="r3"> <img src="data/rcs/r.png" height="30px" width="30px" /> </span> <span id="w3" name="w4"> <img src="data/rcs/w.png" height="30px" width="30px" /> </span> <span id="e3" name="e3"> </span>
    <br />
   <input type="password" name="confirm_pass" id="confirm_pass" autocomplete="off" placeholder="Confirm Password" onblur="return  valid_password()" /> 
   <span id="r4" name="r4"> <img src="data/rcs/r.png" height="30px" width="30px" /> </span> <span id="w4" name="w4"> <img src="data/rcs/w.png" height="30px" width="30px" /> </span><span id="e4" name="e4"> </span>
   <br />
    <p> Already have an account? <a href="" id="login1"> Login </a> </p>
      <input type="submit" id="create" name="create" value="SIGN UP"   />   </div>
</form>
</div>
</body>
</html>
