
<div id="bigmid"> 
<?php

echo "<div id=bige >";

if (! empty ( $arrData )) {
		echo "<div id='showfrnddiv'><h2>" .FRIENDS." </h2></div> ";
		foreach ( $arrData  as $key => $val ) {
		if ($val ['id'] != "") {
			$res = "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
			$res .= "<div id=dvres> ";
			$res .= "<img class='imgcenterm floatl round5' src='" . $val ['path'] . "' height='75' width='75' >";
			$res .= "<aside class='floatr fontsize16'>" . $val ['first_name'] . "</aside><br><br><aside class ='floatr fontsize14'> " . $val ['last_name'] . "<aside></div>";
			$res .= "</a>";
			echo $res;

		}
	
	} 
} else {
		echo "<div id='showfrnddiv'><h2>" . No_FRIENDS. "</h2></div> ";
}
echo "</div>";
?>
</div>