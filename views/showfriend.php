
<div id="bigmid"> 


<?php
//echo "<pre>";
//print_r($arrData);
echo "<div id=dvresbig  >";

if (! empty ( $arrData )) {
		echo "<h3>Friends With You....</h3>";
		foreach ( $arrData  as $key => $val ) {
		if ($val ['id'] != "") {
			$res = "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
			$res .= "<div id=dvres class=round20>";
			
			$res .= "<img class='imgcenter floatl round5' src='" . $val ['path'] . "' height='50' width='50' >";
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