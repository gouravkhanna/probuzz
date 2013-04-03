<div id="navigation">
	<div id="photo">
		<img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>"
			height="80" width="80"/> <span class="alignwelcome"> <?php echo WELCOME; ?> <br />
        <?php echo @$_SESSION['user_name']; ?>
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
	</ul>
		<!-- APPLICATION STATUS -->
		<!-- NOTIFICATION STATUS -->
		<!-- -->
     </div>	
   </div>