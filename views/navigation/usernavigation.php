<div id="navigation">
	<div id="photo">
		<img id="profilepic" title="" 
		class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80"/>
		<span class="alignwelcome" > <?php echo WELCOME; ?> <br />
        <?php //echo @$_SESSION['user_name'];
				echo $arrData['user_name'];
		?>
        </span>
	</div>
	<br/><br/><br/><br/><br/><br/><br/>
	<div id=usermenu>	
		<br><br>
	<ul>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."user/messages"; ?>"><?php echo MESSAGING;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=profile"; ?>"><?php echo SOCIAL_PROFILE;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=proprofile"; ?>"><?php echo PROFESSIONAL_PROFILE;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=showfriend"; ?>"><?php echo FRIENDS;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=showRequests"; ?>"><?php echo SHOW_REQUESTS;?></a>
		</li>
		
        <li id="umenu">
			<a href="" id="gallerymenu" onclick="return false"><?php echo GALLERY;?></a><sup><?php echo BETA; ?></sup>
		</li>
	    <aside id="gallerymenudiv" class='marginl20 visiblen'>
	   <li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=photo"; ?>"><?php echo PHOTOS;?></a>
		</li>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=photo&url=profilePic"; ?>"><?php echo CHANGE_PROFILE_PIC;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=photo&url=uploadheader"; ?>"><?php echo CHANGE_HEADER;?></a>
		</li>
		</aside>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."user/searchjob"; ?>"><?php echo SEARCH_JOB;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."user/displayApplication"; ?>"><?php echo DISPLAY_JOB;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=user&url=settings"; ?>"><?php echo SETTINGS;?></a>
		</li>
		
	</ul>
		<!-- APPLICATION STATUS -->
		<!-- NOTIFICATION STATUS -->
		<!-- -->
     </div>	
   </div>