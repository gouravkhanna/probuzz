<div id="navigation" >
      <div id="photo">
        <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
        <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
        <?php echo @$_SESSION['user_name']; ?>
        </span> 
       </div>      
        <a href="index.php?controller=profile">Social Profile</a> 
        <a href="index.php?controller=friends">Friends</a>
        <a href="index.php?controller=photos">Photos</a>
        <a href="index.php?controller=friends&url=request">Friends Request</a>
      
          <!-- INCLUDE FIle here (using include tag) -->
       
   </div>