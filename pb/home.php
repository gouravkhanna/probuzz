<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ProBuzZ</title>
<link href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".APPNAME."/style/style.css"; ?>" rel="stylesheet" type="text/css">
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="js/jqueryui/css/ui-lightness/jquery-ui-1.10.1.custom.css">
<script src="js/jquery-1.9.1.min.js"> </script>
<script src="js/jqueryui/js/jquery-ui-1.10.1.custom.js"></script>
<script src="js/probuzz.js"></script>
</head>

<body>

<div id="container">
	<div id="head1" class="bg">
    	<h1> ProBuzZ</h1>
        <a href="index.php">HOME</a>
    	<a href="index.php?url=logout">LogOUT</a>

  	</div>
    <div id="head2" class="bg">
    	<h2>Head 2    	
    	 
    	</h2>
   		<!-- INCLUDE FIle here (using include tag) -->
    </div>
    <div id="mid" >
    
    	<div id="mid1" class="bg">
    		<h1> Welcome <?php echo @$_SESSION['user_name'];?></h1><br>
		<div id="photo">
		          <img src="<?php echo $profile_pic_path?>" height="150" width="240">
        	</div>
			<a href="index.php?req=profile" >Social Profile</a> 
			<a href="index.php?req=pprofile" >Professional Profile</a>
    	
        	<!-- INCLUDE FIle here (using include tag) -->
        
        </div>
    	
        <div id="mid2" class="bg">
        	<h1>Mid 2</h1>
     		<!-- INCLUDE FIle here (using include tag) -->
		<?php
		if(@$_REQUEST['req']=="profile") {
			include('views/profile.php');
		}
		if(@$_REQUEST['req']=="pprofile") {
			include('views/proprofile.php');
		}
		if(@$_REQUEST['req']=="") {
			include('views/buzz.php');
		}
		?>
		
        </div>


    	<div id="midm" class="bg">
	
	        <div id="mid3" class="bg">
			<h1>Notifications</h1>
       		</div>
		<div id="mid35"  class="bg">
            	<h1>Top Jobs</h1>
       			<!-- INCLUDE FIle here (using include tag) -->
		 </div>
         </div>
    </div>

    
    
<div id="footer" class="bg">
<footer> Copyright ProBuzZ || All Right Reserved || 2013  </footer>

</div>
    

</div>

</body>
</html>
