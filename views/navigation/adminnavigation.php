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
	    <aside id="spammanegementdiv" class="marginl20 visiblen">
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
			<a href="<?php echo ROOTPATH."admin/addAdmin"; ?>">Add Admin</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/deleteAdmin"; ?>">Delete Admin</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/showAllAdmin"; ?>">Show Admin</a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="usermanegementmenu" onclick="return false">User Management</a>
		</li>
	    <aside id="usermanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/addAdmin"; ?>">Manage users</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/deleteAdmin"; ?>">manage Corporate</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/showAllAdmin"; ?>">Show All Users</a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="pagemanegementmenu" onclick="return false">Page Management</a>
		</li>
		<aside id="pagemanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/loadAboutUs"; ?>">About Us</a>
		</li>
	    </aside>
	    <li id="umenu">
			<a href="" id="contactusmanegementmenu" onclick="return false">Feedback Management</a>
		</li>
		<aside id="contactusmanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/contactUs"; ?>">Unread</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/contactUsAll"; ?>">All</a>
		</li>
		
	    </aside>
	
	</ul>
		<!-- APPLICATION STATUS -->
		<!-- NOTIFICATION STATUS -->
		<!-- -->
     </div>	
   </div>