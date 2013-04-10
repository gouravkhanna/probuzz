<div class="fancybox">
	<div class="box">
		<div >
		<textarea id="message_text" name="message_text" class="border" placeholder="Type your message here.." ></textarea>
		<br/>
		<button id="submitmessage" onclick="insertMessage()">Send</button>
		<button onclick="closeFancy()">Close</button>
		</div>
	</div>
	
</div>
<div id="navigation">
	<?php echo "<input type='hidden' id='friendz' value='".$arrData['id']."' >"; ?>
	<div id="photo">
		<img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>"
			height="80" width="80"> <span class="alignwelcome">
        <?php echo $arrData['friend_name']; ?>
        
        	
        </span>
	</div>
	<br/><br/><br/><br/><br/><br/><br/>
	<div id=usermenu>	
	<ul>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=personalProfile&id=".$arrData['id']; ?>">Social Profile</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=professionalProfile&id=".$arrData['id']; ?>">Profesional Profile</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=friends&url=showfriend&id=".$arrData['id']; ?>">Friends</a>
		</li>
		<li id="umenu">
			<a href="<?php echo ROOTPATH."index.php?controller=photos"; ?>">Photos</a>
		</li>
		<li id="umenu">
		</li>
			<a onclick="openBox()">Message</a>
		</ul>
		<!-- APPLICATION STATUS -->
		<!-- NOTIFICATION STATUS -->
		<!-- -->
		<div id="spamuser"></div>
       <span class='floatr marginr10 cursor1' onclick=markUserSpam('<?php echo @$_REQUEST['friendId'];?>')>
                  SpAM
                    </span> 
     </div>	
   </div>