<div id="bigmid"> 
<?php

echo "<div id=dvresbig >";
if (! empty ( $arrData )) {

		foreach ( $arrData  as $key => $val ) {
		if ($val ['id'] != "") {
			$res = "<a href='" . $val ['id'] . "' >";
			$res .= "<div id=dvres>";
			$res .= "<img class='imgcenter floatl round5' src=" . $val ['path'] . " height=50 width=50 >";
			$res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
			$res .= "</a>";
			echo $res;
		}
	} 
}
echo "</div>";
?>
</div>