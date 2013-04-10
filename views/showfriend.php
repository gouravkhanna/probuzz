
<div id="bigmid"> 


<?php

echo "<div id=dvresbig  >";

if (! empty ( $arrData )) {
		echo "<div id='showfrnddiv'><h2>Friends </h2></div> ";
		foreach ( $arrData  as $key => $val ) {
		if ($val ['id'] != "") {
			$res = "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
			$res .= "<div id=dvres> ";
			$res .= "<img class='imgcenter floatl round5' src='" . $val ['path'] . "' height='75' width='75' >";
			$res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
			$res .= "</a>";
			echo $res;

		}
	
	} 
} else {
	echo "No results to display";
}
echo "</div>";
?>
</div>