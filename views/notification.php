Notifications...
<?php
	//echo "<pre>";
	//print_r($arrData);
	if($arrData) {
		foreach($arrData as $key =>$value) {
	?>
		<div class="notificationDisplay">
			<?php
				if($value['notification_type']=="1") {
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['user_id']."' >";
					echo  $value['user_name'] ."</a>";
					echo " is now friends with ";
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['friend_id']."' >";
					echo  $value['friend_name']." </a>" ;
					echo "<span class='alignright'>".$value['notification_time']."</span>";
				}
				if($value['notification_type']=="2" || $value['notification_type']=="3") {
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['user_id']."' >";
					echo  $value['user_name'] ."</a>";
					echo " ".$value['content']. " ";
					echo "<a href='".ROOTPATH."index.php?controller=friends&url=friendsProfile&friendId=".$value['friend_id']."' >";
					echo  $value['friend_name']." </a>" ;
					echo "<span class='alignright'>".$value['notification_time']."</span>";
				}
				
			?>
		</div>
	<?php
		}
	} else {
	?>
	<pre>No notifications to display..</pre>
	<?php
	
	}
?>