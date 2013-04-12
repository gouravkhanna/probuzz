<?php
require_once 'library/recaptcha/recaptchalib.php';
$publickey = "6LcMKN8SAAAAAOH-xKBEFRDrJw-JN5r4v4iUoxi2"; // you got this from the signup page
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProBuzZ</title>
<link rel="stylesheet" href='<?php echo ROOTPATH."style/f1.css"; ?>' />
<script src="<?php echo ROOTPATH."js/jquery-1.9.1.min.js"; ?>"> </script>

<script type="text/javascript" src="<?php echo ROOTPATH."js/login.js"; ?> "></script>


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
				</span><span id="e12" name="e12"> </span> <br /> <br> 
				<a id="forgetpassword"  > <?php echo FORGET_PASSWORD; ?></a>
				<input type="submit" id="login" name="url" value="buzzin" /> <br />
				<br />
				<p> <?php echo ACCOUNT_INFO; ?> <a id="signup" href="#"><?php echo SIGNUP;?> </a>
				</p>
			</div>
			<div id="aelo">
				<form id="forgotPasswordForm">
					<hr/>
					<div id="aelo1">
						<?php echo TYPE_REGISTERED_USER_NAME;?>
						<input type="text" name="forget_user_name" id="forget_user_name" />
					    <input type="text" name="forget_email" id="forget_email" />
					
					</div>
					
					<!--<div id="aelo2">
						Email ID
						<input type="text" name="b">
					</div>-->
					<br/>
					<input type="button" name="forgetnext" id="forgetnext" value="Next" />
				</form>
			</div>
		</form>

		<form id="side-2" class="flip" method="post" name="side-2"
			onsubmit=" return valid() " action="index.php">
			<div id="2">
				<h2><?php echo JOIN; ?></h2>

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
					<?php echo ALREADY_ACCOUNT;?> <a href="../index.php" id="login1"> <?php echo BUZZIN;?></a>
				</p>
			</div>
			
				<input type="submit" id="create" name="url" value="register" />
			
		
			<a href="corporates" > Corporate Create Account here </a><br><br></div>
		</form>
		
		<!-- side 3  -->

		
		
	</div>

	<div id="wrongcaptcha">
		<div id="errmsg" name="errmsg">
<?php

if(isset($_SESSION['error_msg']))
{
  echo $_SESSION['error_msg'];
  unset($_SESSION['error_msg']);
}
?>
	
</div>
	</div><br><br><br>
	<DIV id="background">
	<br>	
	<div id="head"><?php echo AT_ONE_PLACE;?> </div>
<div id="slideshow">

<div>
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/d5.jpg"; ?> >
   <div id="text"> <?php echo FIND;?> </div>
</div>
<div>
<img class="logImg" id="rotator"src=<?php echo ROOTPATH."data/rcs/d4.jpg"; ?>  >   

 <div id="t"> 	<?php echo MEET;?> </div>
</div>
<div>
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/d6.jpg"; ?> >   

 <div id="t1" > <?php echo SEARCH;?> </div>
</div>
<div>
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/chat.jpg"; ?> >   
 </div>
 <div>
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/tell.png"; ?> >   
 </div>

 <div>
<img class="logImg" id="rotator" src=<?php echo ROOTPATH."data/rcs/news_feed.jpg"; ?> >   
    <div id="t2" > <?php echo "FEED";?> </div>
 </div>

 </div>	
</DIV>
</body>
</html>
<script >
$("document").ready(function(){
$("#confirm_pass").on("focus",function(){
$("#captcha").show();
});

});

$("#comp_confirm_pass").click(function(){

	   alert('fgfggf');
	    $("#corp_captcha").show();
	});

	

$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  5000);
</script>