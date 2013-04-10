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
		<a href="" style="color:white;" onclick="return openPhotoFancyBox()">Change Pic</a>
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
			<a href="<?php echo ROOTPATH."user/messages"; ?>">Messaging</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=profile"; ?>">Social Profile</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=proprofile"; ?>">Profesional Profile</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=showfriend"; ?>">Friends</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=showRequests"; ?>">Show Requests</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=photos"; ?>">Photos</a>
		</li>

		<li id="umenu">
			<a href="<?php echo ROOTPATH."user/searchjob"; ?>">Search Job</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."user/displayApplication"; ?>">Display Job</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=user&url=settings"; ?>">Settings</a>
		</li>
	</ul>
		<!-- APPLICATION STATUS -->
		<!-- NOTIFICATION STATUS -->
		<!-- -->
     </div>	
   </div>