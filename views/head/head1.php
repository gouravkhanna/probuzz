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
    	<h1> 
       		<?php echo PROBUZZ; ?>     
      	</h1>
        <nav>
        <a href="index.php"><?php echo HOME; ?></a>
        <a href="index.php?url=loadHome1"><?php echo HOME; ?>1</a>
        <a href="index.php?url=loadHome2"><?php echo HOME; ?>2</a>
    	  <a href="index.php?url=logout"><?php echo LOGOUT; ?></a>
        <progress value=10 max=100></progress>
        </nav>
  </div>