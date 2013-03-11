<div id="navigation" >

      <div id="photo">
        <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
        <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
        <?php echo @$_SESSION['user_name']; ?>
        </span> 
       </div>      
       <!--  <a href="index.php?controller=profile">Social Profile</a> 
        <a href="index.php?controller=proprofile">Profesional Profile</a> 
       -->  <a href="index.php?url=cprofile" >Corporate Profile</a> 
        <a href="index.php?url=createjobs">Create Job</a>
        <button onclick="fncreatejob()">Create Job Button</button>
        
        <a href="index.php?url=showJobs">Show Job</a>
        <!-- INCLUDE FIle here (using include tag) -->
       
   </div>
