
<link rel="stylesheet" type="text/css" href="f2.css" />

<div id="navigation" >
        <div id="photo">
            <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
            <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
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

</div> 
</div>


