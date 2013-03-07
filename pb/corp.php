
<link href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".APPNAME."/style/style.css"; ?>" rel="stylesheet" type="text/css">
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="js/jqueryui/css/ui-lightness/jquery-ui-1.10.1.custom.css">
<script src="js/jquery-1.9.1.min.js"> </script>
<script src="js/jqueryui/js/jquery-ui-1.10.1.custom.js"></script>
<script src="js/probuzz.js"></script>
<?php
$id=3;


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="style/corpstyle.css" rel="stylesheet" type="text/css">
</head>

<div id="container">
	<div id="head1">
       <a href="index.php">HOME</a>
    	<a href="index.php?url=logout">LogOUT</a>
    </div>
    <div id="head2">
    	<h2>Head 2</h2>
   		<!-- INCLUDE FIle here (using include tag) -->
		
	 </div>	
    <div id="mid">
    
    	<div id="mid1">
    		<h1> MId 1</h1>
    		<!-- INCLUDE FIle here (using include tag) -->
		<br/>
		<a href="corp.php?req=cprofile" >Cprofile</a> 
		<a href="corp.php?req=jobs">Jobs</a>
	
        </div>
        <div id="mid2">
	        <h1>Mid 2</h1>
		<?php
		if($_REQUEST['req']=="") include_once 'views/buzz.php';
		if($_REQUEST['req']=="cprofile") include_once 'gdata/cprofile.php';
		if($_REQUEST['req']=="jobs") include_once 'gdata/jobs.php';
		?>
     		<!-- INCLUDE FIle here (using include tag) -->   
        </div>
    	<div id="mid3">
	        <h1>mid 3</h1>
       		<!-- INCLUDE FIle here (using include tag) -->
        </div>
    </div>


<footer>
    <address>
      Address Content
    </address>
  </footer>
 </div>
</body>
</html>