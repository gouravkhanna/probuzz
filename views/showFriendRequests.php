.<div id="bigmid">
	<?php
		//echo "<pre>";
			//print_r($arrData);
			
	if (! empty ( $arrData )) {
echo "<div id='showfrnddiv'><h2>".FRIEND_REQUEST."</h2></div>";
		foreach ( $arrData  as $key => $value ) {
			$res = "<div id='friendRequest".$value['id']."'><a href='index.php?controller=friends&url=friendsProfile&friendId=" . $value ['id'] . "' >";
			$res .= "<div id=dvres class=full>";
			
			$res .= "<img class='imgcenter floatl round5' src='" . $value ['path'] . "' height='50' width='50' >";
			$res .= "<aside >" . $value ['first_name'] . "</aside><aside> " . $value ['last_name'] . "<aside>";
			$res .="</a><aside><pre><input id=accept_".$value['id']." type=button value=accept onclick='acceptRequest(this)' />";
			$res .="<input id=decline_".$value['id']." type=button value=decline onclick='declineRequest(this)' /></pre></aside></div></div>";
			echo $res;
	} 
} else {
	echo "<div id='showfrnddiv'><h2>".NO_REQUESTS ."</h2></div>";
}
	?>
</div>