<?php
require_once 'library/recaptcha/recaptchalib.php';
$publickey = "6LcMKN8SAAAAAOH-xKBEFRDrJw-JN5r4v4iUoxi2"; // you got this from the signup page
?>
<script src="js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="style/f1.css" />
<script src="js/login.js"></script>

</head>
<body>
	
	<div id="wrapper">
		<form id="side-1" onsubmit="return valid1()" class="flip" method="get" action="index.php">

			<div id="1">
				<h2> <?php echo LOGIN; ?> </h2>
			<input type="text" name="user_name" id="user_name" autocomplete="off"
				placeholder="User Name" onblur="return  valid_uname1()" /> <span
				id="r11" name="r11"> <img src="data/rcs/r.png" height="30px"
				width="30px" /></span><span id="w11"> <img src="data/rcs/w.png"
				height="30px" width="30px" />
			</span><span id="e11" name="e11"> </span> <br /> <br /> 
			  <input
			type="password" name="password" id="password"
			placeholder="Password" onblur="return  valid_password1()" /> <span
					id="r12" name="r12"> <img src="data/rcs/r.png" height="30px"
					width="30px" /></span><span id="w12"> <img src="data/rcs/w.png"
					height="30px" width="30px" />
				</span><span id="e12" name="e12"> </span> <br /> <br> <a href="#"> <?php echo FORGET_PASSWORD; ?></a>
				<input type="submit" id="login" name="url" value="buzzin" /> <br />
				<br />
				<p> <?php echo ACCOUNT_INFO; ?> <a id="signup" href="#"><?php echo SIGNUP;?> </a>
				</p>
			</div>
		</form>

		<form id="side-2" class="flip" method="post" name="side-2"
			onsubmit=" return valid() " action="index.php">
			<div id="2">
				<h2>Join To meet with new people!</h2>

				<input type="text" name="user_name1" id="user_name1"
					autocomplete="off" placeholder="User Name"
					onblur="return  valid_uname()" /> <span id="r6" name="r6"> <img
					src="data/rcs/r.png" height="30px" width="30px" class="i" />
				</span> <span id="w6"> <img src="data/rcs/w.png" height="30px"
					width="30px"class="i" />
				</span><span id="e6" name="e6"> </span> <br /> <input type="text"
					name="first_name" id="first_name" autocomplete="off"
					placeholder="First Name" onblur="return  valid_fname()" /> <span
					id="r1" name="r1"> <img src="data/rcs/r.png" height="30px"
					width="30px" class="i" />
				</span> <span id="w1"> <img src="data/rcs/w.png" height="30px"
					width="30px" class="i" />
				</span><span id="e1" name="e1"> </span> <br /> <input type="text"
					name="last_name" id="last_name" autocomplete="off"
					placeholder="Last Name" onblur="return  valid_lname()" /> <span
					id="r5" name="r5"> <img src="data/rcs/r.png" height="30px"
					width="30px" class="i" />
				</span> <span id="w5" name="w5"> <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span><span id="e5" name="e5"> </span> <br /> <input type="text"
					name="email" id="email" autocomplete="off" placeholder="Email"
					onblur="return valid_email()" /> <span id="r2" name="r2" id="r2"> <img
					src="data/rcs/r.png" height="30px" width="30px" class="i" />
				</span> <span id="w2" name="w2" name="w2"> <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span> <span id="e2" name="e2"> </span> <br /> <input
					type="password" name="password1" id="password1" autocomplete="off"
					placeholder="Password" onblur="return  valid_password()" /> <span
					id="r3" name="r3"> <img src="data/rcs/r.png" height="30px"
					width="30px" class="i" />
				</span> <span id="w3" name="w4"> <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span> <span id="e3" name="e3"> </span> <br /> <input
					type="password" name="confirm_pass" id="confirm_pass"
					autocomplete="off" placeholder="Confirm Password" role="button"
					onblur="return  valid_password()" /> <span id="r4" name="r4"> <img
					src="data/rcs/r.png" height="30px" width="30px" class="i" />
				</span> <span id="w4" name="w4" > <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span><span id="e4" name="e4"> </span> <br /><br />
				 <div id="captcha">
                 <?php echo recaptcha_get_html($publickey);?>
                 </div>
             
                 <div id="" >
                   <p>
					Already have an account? <a href="" id="login1"> Login </a>
				</p>
			</div>
				<input type="submit" id="create" name="url" value="register" />
			</div>
		</form>
	</div>
	<div id="wrongcaptcha">
		<div id="errmsg" name="errmsg">
<?php

if(isset($arrData))
{
  echo @$arrData['error_msg'];
}
?>

</div>
	</div>
	<br><br> <br>
<div id="slideImage">
	<div>
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/d5.jpg"; ?> > 
</div> 
<DIV class="innerimage"> 
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/d4.jpg"; ?> >  
</DIV>
<DIV class="innerimage1"> 
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/d6.jpg"; ?> >  
</DIV>


 </div>	

</body>
</html>
<script >


$("#confirm_pass").click(function(){
$("#captcha").show();
});

/**/

</script>