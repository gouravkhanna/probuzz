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
			<a href="" id="spammanegementmenu" onclick="return false"><?php echo SPAM_MANAGEMENT;?></a>
		</li>
	    <aside id="spammanegementdiv" class="marginl20 visiblen">
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/buzzSpam"; ?>"><?php echo BUZZ_SPAM;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/userSpam"; ?>"><?php echo USER_SPAM;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/review"; ?>"><?php echo SPAM_REVIEW;?></a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="adminmanegementmenu" onclick="return false"><?php echo ADMIN_MANAGEMENT;?></a>
		</li>
	    <aside id="adminmanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/addAdmin"; ?>"><?php echo ADD_ADMIN;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/deleteAdmin"; ?>"><?php echo DELETE_ADMIN;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/showAllAdmin"; ?>"><?php echo SHOW_ADMIN;?></a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="usermanegementmenu" onclick="return false"><?php echo USER_MANAGEMENT;?></a>
		</li>
	    <aside id="usermanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/addAdmin"; ?>"><?php echo MANAGE_USERS;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/deleteAdmin"; ?>"><?php echo MANAGE_CORPORATE;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/showAllAdmin"; ?>"><?php echo SHOW_ALL_USERS;?></a>
		</li>
		</aside>
		<li id="umenu">
			<a href="" id="pagemanegementmenu" onclick="return false"><?php echo PAGE_MANAGEMENT;?></a>
		</li>
		<aside id="pagemanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/loadAboutUs"; ?>"><?php echo ABOUT_US;?></a>
		</li>
	    </aside>
	    <li id="umenu">
			<a href="" id="contactusmanegementmenu" onclick="return false"><?php echo FEEDBACK_MANAGEMENT;?></a>
		</li>
		<aside id="contactusmanegementdiv" class='marginl20 visiblen'>
	    <li id="umenu">
			<a href="<?php echo ROOTPATH."admin/contactUs"; ?>"><?php echo UNREAD;?></a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."admin/contactUsAll"; ?>"><?php echo ALL;?></a>
		</li>
		
	    </aside>
	
	</ul>
		<!-- APPLICATION STATUS -->
		<!-- NOTIFICATION STATUS -->
		<!-- -->
     </div>	
   </div>