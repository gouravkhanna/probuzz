<?php
//temporary variables
$id=3;
$profile_pic_path="data/photo/g.jpg";

?>
<?php
  include_once 'class/lang/lang.en.php';
  include_once 'class/constant.php';
  
?>
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
        <a href="index.php"><?php echo HOME; ?></a>
        <a href="corp.php"><?php echo CHOME; ?></a>
        <a href="index.php?url=logout"><?php echo LOGOUT; ?></a>
        <progress value=10 max=100></progress>
  </div>
  <div id="mid1" >

      <div id="photo">
        <img class="photo" src="<?php echo $profile_pic_path;?>" height="80" width="80">
        <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
        <?php echo @$_SESSION['user_name'];


        ?>oooooooo </span> 
       </div>      

        <a href="index.php?req=profile">Social Profile</a> 
        <a href="index.php?req=pprofile">Professional Profile</a>
        <a href="corp.php?req=cprofile" >Cprofile</a> 
        <a href="corp.php?req=jobs">Jobs</a>
      
          <!-- INCLUDE FIle here (using include tag) -->
       
   </div>
   
    <div id="head2" >
    
    </div>
   
    <div id="mid" >
    <div id="mid2" >
          <h1>Mid 2</h1>
        <!-- INCLUDE FIle here (using include tag) -->
     
     <?php
    if(@$_REQUEST['req']=="") include_once 'views/buzz.php';
    if(@$_REQUEST['req']=="cprofile") include_once 'gdata/cprofile.php';
    if(@$_REQUEST['req']=="jobs") include_once 'gdata/prejob.php';
    ?>
    
        </div>


      <div id="midm" >
  
          <div id="mid3" >
      <h1>Notifications</h1>
          </div>
    <div id="mid35"  >
              <h1>Top Jobs</h1>
            <!-- INCLUDE FIle here (using include tag) -->
     </div>
         </div>
    </div>

    
    
<div id="footer" >
<footer> Copyright ProBuzZ || All Right Reserved || 2013  </footer>

</div>
    

</div>

</body>
</html>
