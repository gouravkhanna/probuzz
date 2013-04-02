<div id="navigation" >
	
      <div id="photo">
        <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
        <span class="alignwelcome">
            <?php if(!isset($arrData['id'])) {echo WELCOME;} ?>
        <br/>
        <?php echo @$arrData['company_name']; ?>
        <br/>
        <?php echo @$arrData['company_alias']; ?>
        </span> 
       </div>      
       <!--  <a href="index.php?controller=profile">Social Profile</a> 
        <a href="index.php?controller=proprofile">Profesional Profile</a> 
       -->  
       	<a href="index.php?url=cprofile" >Corporate Profile</a> 
    
        <!-- INCLUDE FIle here (using include tag) -->
       
   </div>
