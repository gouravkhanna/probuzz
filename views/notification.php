<span class="alignCenter">Notifications...</span>
<?php
	//echo "<pre>";
	//print_r($arrData);
	if($arrData) {
		foreach($arrData as $key =>$value) {
	?>
		<div class="notificationDisplay">
			<?php
				if($value['notification_type']=="0") {
					
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['user_id']."' >";
					echo "<img src='".$value['user_pic']."' width=30 height=30 class='imgcenter floatl round5' />";
					echo  "<aside>".$value['user_name'] ."</a>";
					echo " updated status to &quot;";
					echo "<a href='".ROOTPATH."status/buzz/".base64_encode($value['friend_id'])."' >".$value['content']."</a>&quot;";
					//echo " ".$value['content']." &quot;";
					echo "</aside>";
					echo "<span class='alignright'>".time_elapsed($value['notification_time'])."</span>";
				}
				if($value['notification_type']=="1") {
					
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['user_id']."' >";
					echo "<img src='".$value['user_pic']."' width=30 height=30 class='imgcenter floatl round5' />";
					echo  "<aside>".$value['user_name'] ."</a>";
					echo " is now friends with ";
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['friend_id']."' >";
					if($value['friend_id']==$_SESSION['id']) {
						echo  "you</a></aside>" ;
					} else {
						echo "<img src='".$value['friend_pic']."' width=30 height=30 class='imgcenter floatl round5' />";
						echo  "".$value['friend_name']."</aside> </a>" ;
					}
					echo "<span class='alignright'>".time_elapsed($value['notification_time'])."</span>";
				}
				if($value['notification_type']=="2" || $value['notification_type']=="3") {
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['user_id']."' >";
					echo  $value['user_name'] ."</a>";
					echo " ".$value['content']. " ";
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['friend_id']."' >";
					if($value['friend_id']==$_SESSION['id']) {
						echo  "you</a>" ;
					} else {
						echo  $value['friend_name']." </a>" ;	
					}
					echo "<span class='alignright'>".$value['notification_time']."</span>";
				}
				if($value['notification_type']=="5") {
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['friend_id']."' >";
					echo "<img src='".$value['friend_pic']."' width=30 height=30 class='imgcenter floatl round5' />";
					echo  "".$value['friend_name']."</aside> </a>" ;
					echo "sent ";
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['user_id']."' >";
					echo "you </a>".$value['count']." message(s).";
					echo "<span class='alignright'>".time_elapsed($value['notification_time'])."</span>";
				}
				
				
			?>
		</div>
	<?php
		}
	} else {
		echo "<pre>".NO_NOTIFICATIONS_TO_DISPLAY."</pre>";
	?>
	
	<?php
	
	}
?>