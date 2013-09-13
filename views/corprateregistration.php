<?php
require_once 'library/recaptcha/recaptchalib.php';
$publickey = "6LerbOcSAAAAAF07TPnDV4QCVji62vtUqrdrEv73"; // you got this from the signup page
?>
<head>
	<title><?php echo CORPORATE_REGISTRATION;?></title>
</head>
<script src="js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="style/f1.css" />
<script type="text/javascript" src="<?php echo ROOTPATH."js/corplogin.js"; ?> "></script>

</head>
<body>
	
	<div id="wrapper">
		
		<form id="side-3"  method="post" name="side-3" class="flip"
			onsubmit="return validcorp()" action="#">
			<div id="2">
				<h2><?php echo JOIN_CORP; ?></h2>

				<input type="text" name="company_name" id="company_name"
					autocomplete="off" placeholder="Company Name"
					onblur="return  valid_company()" /> <span id="r1" name="r1"> <img
					src="data/rcs/r.png" height="30px" width="30px" class="i" />
				</span> <span id="w1"> <img src="data/rcs/w.png" height="30px"
					width="30px"class="i" />
				</span><span id="e1" name="e1"> </span> <br />
				 <input type="text"
					name="user_name" id="user_name" autocomplete="off"
					placeholder="User Name" onblur="return  valid_corpuser()" /> <span
					id="r2" name="r2"> <img src="data/rcs/r.png" height="30px"
					width="30px" class="i" />
				</span> <span id="w2"> <img src="data/rcs/w.png" height="30px"
					width="30px" class="i" />
				</span><span id="e2" name="e2"> </span> <br /> 
				<input type="text"
					name="Location" id="Location" autocomplete="off"
					placeholder="Location" onblur="return  valid_location()" /> <span
					id="r3" name="r3"> <img src="data/rcs/r.png" height="30px"
					width="30px" class="i" />
				</span> <span id="w3" name="w3"> <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span><span id="e3" name="e3"> </span> <br /> 
				<input type="text"
					name="corp_email" id="corp_email" autocomplete="off" placeholder="Email"
					onblur="return valid_corpemail()" /> <span id="r4" name="r4" > <img
					src="data/rcs/r.png" height="30px" width="30px" class="i" />
				</span> <span id="w4"  name="w4"> <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span> <span id="e4" name="e4"> </span> <br />  
				  <input
					type="password" name="company_password" id="company_password" autocomplete="off"
					placeholder="Password" onblur="return valid_corppassword()" /> <span
					id="r5" name="r5"> <img src="data/rcs/r.png" height="30px"
					width="30px" class="i" />
				</span> <span id="w5" name="w5"> <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span> <span id="e5" name="e5"> </span> <br /> <input
					type="password" name="comp_confirm_pass" id="comp_confirm_pass"
					autocomplete="off" placeholder="Confirm Password" role="button"
					onblur="return  valid_corppassword()" /> <span id="r6" name="r6"> <img
					src="data/rcs/r.png" height="30px" width="30px" class="i" />
				</span> <span id="w6" name="w6" > <img src="data/rcs/w.png"
					height="30px" width="30px" class="i" />
				</span><span id="e6" name="e6"> </span> 
				<br /><br />
				 <div id="corp_captcha">
                   <?php echo recaptcha_get_html($publickey);?>
                 </div>
             
                 <div id="" >
                   <p>
					<?php echo ALREADY_ACCOUNT;?> <a href="index.php" id="login1"> <?php echo BUZZIN;?></a>
				</p>
			</div>
			 <input type="hidden" name=url value=corporates>
				<input type="submit" id="create" name="corporateregister" value="register" />
			</div>
		</form>
		
		<!-- side 3 end  -->
		<br/><br/><br/><br/><br/><br/>
	</div>
	<div id="wrongcaptcha"><br><br>
		<div id="errmsg1" name="errmsg1">
<?php

if(isset($_SESSION['error_msg'])) {
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

 </div>	
</DIV>
</body>
</html>
<script >
$("document").ready(function(){
	$("#comp_confirm_pass").on("focus",function(){
		$("#corp_captcha").show();
	});
	
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