<div id="navigation">
		<div class="fancybox1">
				<div class="box">
					<form id="imageUploadForm">
					<input type="file" name="profile_pic"  />
					<input type="button" onclick="" id="profile_pic_change" value="Set Profile Pic" /> <br/>
				    <input type="button" class="floatr" value="Close" onclick="closeFancy()" />
					</form>
				</div>
		</div>
	<div id="photo">
		<img id="profilepic" title="" 
		class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80"/>
		<a  style="color:blue;" onclick="return openPhotoFancyBox()">Change Pic</a>
		<span class="alignwelcome" > <?php echo WELCOME; ?> <br />
        <?php //echo @$_SESSION['user_name'];
				echo $arrData['user_name'];
		?>
        </span>
	</div>
	<br/><br/><br/><br/><br/><br/><br/>
	<div id=usermenu>	
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
			<a href="<?php echo ROOTPATH."index.php?controller=photos"; ?>"><?php echo PHOTOS;?></a>
		</li>

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