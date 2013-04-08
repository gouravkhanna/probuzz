<?php
require_once 'library/recaptcha/recaptchalib.php';
$publickey = "6LcMKN8SAAAAAOH-xKBEFRDrJw-JN5r4v4iUoxi2"; // you got this from the signup page
?><!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<title>ProBuzZ</title>
	<style>

	body {
		width: 600px;
		margin: auto;
		font-family: sans-serif;
	}

	#contact {
	margin-top:25px; 
	
		background: #e3e3e3; 
		padding: 1em 2em; 
		position: relative;
		height:auto;
	}

	.js #contact {
		position: absolute;
		top: 0;
		width: inherit;
		display: none;
	}	

	#contact h2 { margin-top: 0; }

	#contact ul { padding: 0; }

	#contact li { 
		list-style: none;
		margin-bottom: 1em;
	}
	article p {
	text-align: justify;
	}	
	/* Close button on form */
	.close {
		position: absolute;
		right: 10px;
		top: 10px;
		font-weight: bold;
		font-family: sans-serif;
		cursor: pointer;
	}	

	/* Form inputs */
	input, textarea { width: 100%; line-height: 2em;}
	input[type=submit] { width: auto;  }
	label { display: block; text-align: left; }

	</style>
</head>
<body>
<div id="errmsg" name="errmsg">
<?php

if(isset($arrData))
{
  echo @$arrData['error_msg'];
}
?>
</div>

<article>
	<h1><?php echo ABOUT_US;?></h1>
	<p>
	<?php 	
		if(isset($arrData))	
		{
			echo $arrData["about_us"]; 
		}	
	?>
	</p>
</article>

<div id="contact">
	<h2>Contact Me</h2>
	<form action="#" method="post">
		<ul>
			<li>
				<label for="name">Name: </label>
	 			<input name="name" id="name" value="<?php @$_RESQUEST['name'];?>">
			</li>

			<li>
				<label for="email">Email Address: </label>
		 		<input name="email" id="email" value="<?php @$_REQUEST['email'];?>">
			</li>

			<li>
				<label for="comments">What's Up?</label>
				<textarea name="comments" id="comments" cols="30" rows="10"><?php @$_REQUEST['comments'];?></textarea>
			</li>
			<li>
			<div id="captcha">
                 <?php //echo recaptcha_get_html($publickey);?>
                 </div>
                 </li>
			<li>
				<input type="submit" value="Submit" name="contactus">
			</li>
		</ul>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>

$(function() {
	
$('html').addClass('js');

var contactForm = {

	container: $('#contact'),

	config: {
		effect: 'slideToggle',
		speed: 500
	},

	init: function(config) { // constructor ....
		$.extend(this.config, config); // replace the config with another one

		$('<button></button>', {
			text: 'Contact Me'
		})
			.insertAfter( 'article:first' ) // insert after article
			.on( 'click', this.show ); // show the contact form and call this .show function
	},

	show: function() {
		var cf = contactForm, // container div
			container = cf.container,
			config = cf.config;

		if ( container.is(':hidden') ) {
			contactForm.close.call(container); // this imediately call close function
			container[config.effect](config.speed); // use config properties
		}
	},

	close: function() {
		var $this = $(this), // #contact
			config = contactForm.config;

		if ( $this.find('span.close').length ) return;

		$('<span class=close>X</span>') // close button
			.prependTo(this)  // here this is span
			.on('click', function() {
				// this = span
				$this[config.effect](config.speed);
			})
	}
};

contactForm.init({ // config become equal to this
	
	speed: 500
});

})();

</script>

</body>
</html>










