<div id="rightpanel1" class="padding5" >
	<?php
		if(isset($arrData['status'])) {
			$status=$arrData['status'];
			if(isset($arrData['friendId'])) { 
				$friendId=$arrData['friendId'];
			}
			if($status==0 || $status==4) { 
	?>
	<div id="friendShipStatus">
		Send Request : <input type="button" id="<?php echo "send_".$friendId;?>" value="Send Request" onclick="sendRequest(this)"/>
	</div>
	<?php
			} else if($status==1) { 
	?>
	<div id="friendShipStatus" >
		<pre>Friends..	<input type="button" id="<?php echo "remove_".$friendId;?>" value="Remove Friend" onclick="removeFriend(this)" /></pre>
	</div>
	<?php
			} else if($status==2){
	?>
	<div id="friendShipStatus">
		Awaiting Confirmation.. 
	</div>	
	<?php
			} else if($status==3){
	?>
	<div id="friendShipStatus">
		Request Recieved : 
		<input type="button" id="<?php echo "accept_".$friendId;?>" onclick="acceptRequest(this)" value="Accept"/>
		<input type="button"  id="decline_<?php echo $friendId;?>" value="Decline" onclick="declineRequest(this)"/>
	</div>			
	<?php
			}
		}
		 
	?>
	<hr/>
	<?php
		   if(!isset($arrData['friendId'])) {
		   ?>
		   <div id="notifications">
		   
		   </div>
	<?php
		   }
	?>
	
	
</div>