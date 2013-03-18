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
    	  <a href="index.php?url=logout"><?php echo LOGOUT; ?></a>
        <progress value=10 max=100></progress>
        </nav>
        <input type="text" id="searchbar" name="searchbar" placeholder="Search Here" onblur="" >
        <button class="juiButton" name="searchbutton" id="searchbutton"></button>
  </div>
  <div id="dvsearch">
  <div id="dvsearchoption"></div>
  <div id="dvsearchresult"></div>
  </div>