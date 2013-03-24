<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProBuzZ</title>
<link href="<?php echo ROOTPATH."style/style.css"; ?>" rel="stylesheet" type="text/css">
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="js/jqueryui/css/ui-lightness/jquery-ui-1.10.1.custom.css">
<script src="js/jquery-1.9.1.min.js"> </script>
<script src="js/jqueryui/js/jquery-ui-1.10.1.custom.js"></script>
<script src="js/probuzz.js"></script>
<link rel="stylesheet" type="text/css" href="style/proProfile.css" />
<script type="text/javascript" src="js/proProfile.js"></script>


<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>



<script>

	$(function() {
		$( "#accordion" ).accordion();
		$(".various").fancybox({
				maxWidth	: 420,
				maxHeight	: 900,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'				
			});
		$(".fancybox").fancybox();
	});
	
</script>
</head>

<body>

<div id="container">
	<div id="head1" >
    	<span class="logo">
    	   		<?php echo PROBUZZ; ?>
    	 </span>     
      	
        <nav>
        <a class="juiButton" href="index.php"><?php echo HOME; ?></a>
        <a class="juiButton" href="index.php?url=loadHome1"><?php echo HOME; ?>1</a>
        <a class="juiButton" href="index.php?url=loadHome2"><?php echo HOME; ?>2</a>
        <a class="juiButton" href="index.php?url=loadHome3"><?php echo HOME; ?>3</a>
    	  <a class="juiButton" href="index.php?url=logout"><?php echo LOGOUT; ?></a>
       <!--  <progress value=10 max=100></progress> -->
        </nav>
        <input type="text" id="searchbar" name="searchbar" placeholder="Search Here" onblur="" >
    </div>
  <div id="dvsearch">
  <div id="dvsearchoption"></div>
  <div id="dvsearchresult"></div>
  </div>
