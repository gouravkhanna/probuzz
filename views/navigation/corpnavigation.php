<div id="navigation" >

      <div id="photo">
        <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
        <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
        <?php echo @$_SESSION['user_name']; ?>
        </span> 
       </div>      
       <!--  <a href="index.php?controller=profile">Social Profile</a> 
        <a href="index.php?controller=proprofile">Profesional Profile</a> 
       -->  
       	<a href="index.php?url=cprofile" >Corporate Profile</a> 
        <a href="createjobs" class=juiButton" title="Create a new Job or Update Existing">Create Job</a>
        <a href="searchpeople" title="Search People">Search People</a>
        <a href="showJobs">Show Job</a>
        <a href="showApplicant">Show Applicant</a>
        <!-- INCLUDE FIle here (using include tag) -->
       
   </div>
