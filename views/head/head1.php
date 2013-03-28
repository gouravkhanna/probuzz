<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProBuzZ</title>
<link href="<?php echo ROOTPATH."style/style.css"; ?>" rel="stylesheet" type="text/css">
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" 
href="<?php echo ROOTPATH."js/jqueryui/css/ui-lightness/jquery-ui-1.10.1.custom.css"; ?>">
<script src="<?php echo ROOTPATH."js/jquery-1.9.1.min.js"; ?>"> </script>
<script src="<?php echo ROOTPATH."js/jqueryui/js/jquery-ui-1.10.1.custom.js"; ?>"></script>
<script src="<?php echo ROOTPATH."js/probuzz.js"; ?>"></script>

<link rel="stylesheet" type="text/css" href="style/proProfile.css" />
<script type="text/javascript" src="js/proProfile.js"></script>

<script>
	$(function() {
		$( "#accordion" ).accordion();
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
        <a class="juiButton" href="<?php echo ROOTPATH; ?>index.php"><?php echo HOME; ?></a>
        <a class="juiButton" href="<?php echo ROOTPATH; ?>index.php?url=loadHome1"><?php echo HOME; ?>1</a>
        <a class="juiButton" href="<?php echo ROOTPATH; ?>index.php?url=loadHome2"><?php echo HOME; ?>2</a>
        <a class="juiButton" href="<?php echo ROOTPATH; ?>index.php?url=loadHome3"><?php echo HOME; ?>3</a>
    	  <a class="juiButton" href="<?php echo ROOTPATH; ?>index.php?url=logout"><?php echo LOGOUT; ?></a>
       <!--  <progress value=10 max=100></progress> -->
        </nav>
        <input type="text" id="searchbar" name="searchbar" placeholder="Search Here" onblur="" >
    </div>
  <div id="dvsearch">
  <div id="dvsearchoption"></div>
  <div id="dvsearchresult"></div>
  </div>
