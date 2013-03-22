
<?php

echo "<div id=dvresbig >";
echo "<hr/>Based on User Name <hr/>";

foreach ( $arrData ["username"] as $key => $val ) {
	if ($val ['id'] != "") {
		$res = "<a href='" . $val ['id'] . "' >";
		$res .= "<div id=dvres class=round20>";
		$res .= "<img class='imgcenter floatl round5 margin' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
		$res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
		$res .= "</a>";
		echo $res;
	}
}
echo "</div>";
echo "<div id=dvresbig >";

echo "<hr/>Based on Name <hr/>";
foreach ( $arrData ["name"] as $key => $val ) {
	if ($val ['id'] != "") {
		$res = "<a href='" . $val ['id'] . "' >";
		$res .= "<div id=dvres>";
		$res .= "<img class='imgcenter floatl round5' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
		$res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
		$res .= "</a>";
		echo $res;
	}
}
echo "</div>";
echo "<div id=dvresbig >";
echo "<hr/>Based on Company <hr/>";
foreach ( $arrData ["company"] as $key => $val ) {
	if ($val ['id'] != "") {
		$res = "<a href='" . $val ['id'] . "' >";
		$res .= "<div id=dvres>";
		$res .= "<img class='imgcenter floatl round5' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
		$res .= "<aside >" . $val ['company_name']  . "</aside><aside class=calign> " . $val ['company_alias']  . "<aside></div>";
		$res .= "</a>";
		echo $res;
		
	}
}
echo "</div>";
?>

