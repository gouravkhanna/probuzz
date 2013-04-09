<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProBuzZ</title>
<link href="<?php echo ROOTPATH."style/style.css"; ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo ROOTPATH."style/buzz.css"; ?>">

<link rel="stylesheet" type="text/css" href="<?php echo ROOTPATH."js/jqueryui/css/ui-lightness/jquery-ui-1.10.1.custom.css"; ?>">
<script src="<?php echo ROOTPATH."js/jquery-1.9.1.min.js"; ?>"> </script>
<script src="<?php echo ROOTPATH."js/jqueryui/js/jquery-ui-1.10.1.custom.js"; ?>"></script>
<script src="<?php echo ROOTPATH."js/probuzz.js"; ?>"></script>
<script src="<?php echo ROOTPATH."js/buzz.js"; ?>"></script>
<script src="<?php echo ROOTPATH."js/display_profile.js"; ?>"></script>
<link type="text/css" href="f2.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo ROOTPATH."style/proProfile.css"; ?> " />
<link rel="stylesheet" type="text/css" href="<?php echo ROOTPATH."style/notifications.css" ; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOTPATH."style/upload.css" ; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOTPATH."style/jquery.dataTables.css" ; ?>" />
<script type="text/javascript" src="<?php echo ROOTPATH."js/proProfile.js"; ?> "></script>
<script type="text/javascript" src="<?php echo ROOTPATH."js/notifications.js" ;?>" ></script>

<script type="text/javascript" src="<?php echo ROOTPATH."js/friends.js"  ; ?>"></script>
<script type="text/javascript" src="<?php echo ROOTPATH."library/jquery.dataTables.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo ROOTPATH."js/admin.js"; ?>"></script>


</head>
<body>

<div id="container">
	<div id="head1" >
    	<span class="floatl logo">
    	   		<?php echo PROBUZZ; ?>
    	 </span>     
      	
        <nav>
        <a class="juiButton" href="<?php echo ROOTPATH; ?>index.php"><?php echo HOME; ?></a>
    	<a class="juiButton" href="<?php echo ROOTPATH; ?>index.php?url=logout"><?php echo LOGOUT; ?></a>
       <!--  <progress value=10 max=100></progress> -->
        </nav>
        <input type="text" id="searchbar" name="searchbar" placeholder="Search Here" onblur="" >
    </div>
  <div id="dvsearch">
  <div id="dvsearchoption"></div>
  <div id="dvsearchresult"></div>
  </div>
