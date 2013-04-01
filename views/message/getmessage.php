<div id="messagebox">

<?php
//ffunction return time diffrence from current time

echo "<pre>";
//print_r($arrData);
if(!empty($arrData) && !empty($arrData['0'])) {
	$friend_id=@$_SESSION['friend_idm'];
	echo "<input type='hidden' id='friendz' value='$friend_id' >";
	foreach($arrData as $val) {
		if(!empty($val)  ) {
			echo "<div id='message1'>";
			echo "<img class='imgcenter floatl round5 margin' src='" . ROOTPATH . $val ['path'] . "' height=50 width=50 >";
			echo "<aside id=''>";
			echo $val['first_name'].$val['last_name']. time_elapsed($val['message_time']);
			echo "</aside>";
			echo "<aside id=''>";
			echo $val['message'];
			echo "</aside>";
			echo "</div><br/><br/>";
		}
	}
}
else {
	echo "No mEssages!!";
}

?>


</div>