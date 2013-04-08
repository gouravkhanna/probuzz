<div id="navigation">
	<div id="photo">
		<img id="profilepic" title="<a >dsad</a>" 
		class="photo" src="<?php echo $arrData['profile_pic_path']; ?>"
			height="80" width="80"/> <span class="alignwelcome" > <?php echo WELCOME; ?> <br />
        <?php echo @$_SESSION['user_name']; ?>
        </span>
	</div>
	<br/><br/><br/><br/><br/><br/><br/>
	<div id=usermenu>	
	<ul>
	    <li id="umenu">
			<a href="" id="spammanegementmenu" onclick="return false">Spam Management</a>
		</li>
	    <aside id="spammanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/buzzSpam"; ?>">Buzz Spam</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/userSpam"; ?>">User Spam</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/review"; ?>">Spam Review</a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="adminmanegementmenu" onclick="return false">Admin Management</a>
		</li>
	    <aside id="adminmanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/buzzSpam"; ?>">Add Admin</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/userSpam"; ?>">Delete Admin</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/review"; ?>">Show Admin</a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="pagemanegementmenu" onclick="return false">Page Management</a>
		</li>
		 <aside id="pagemanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/contactUs"; ?>">Contact Us</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/aboutUs"; ?>">About Us</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/review"; ?>">Show Admin</a>
		</li>
		</aside>
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