<div id="rightpanel1" >
	<br/>
	
	<?php
		if(isset($arrData['status'])) {
			$status=$arrData['status'];
			if(isset($arrData['friendId'])) { 
				$friendId=$arrData['friendId'];
			}
			if($status==0) { 
	?>
	<div id="friendShipStatus">
		Send Request : <input type="button" id="<?php echo "send_".$friendId;?>" value="Send Request" onclick="sendRequest(this)"/>
	</div>
	<?php
			} else if($status==1) { 
	?>
	<div id="friendShipStatus" >
		Friends
	</div>
	<?php
			} else if($status==2){
	?>
	<div id="friendShipStatus">
		Request Sent 
	</div>	
	<?php
			} else if($status==3){
	?>
	<div id="friendShipStatus">
		Request Recieved : 
		<pre><input type="button" id="<?php echo "accept_".$friendId;?>" value="Accept"/>	<input type="button"  id="decline_<?php echo $status;?>" value="Decline"/></pre>
	</div>			
	<?php
			}
		}
		 
	?>
	<hr/>
	<h1>Notifications</h1>
	<br/>
</div>