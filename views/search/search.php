<?php

echo "<hr/>Based on User Name <hr/>";
foreach ( $arrData ["username"] as $key => $val ) {
	if ($val ['id'] != "") {
		$res = "<div id='dvres'>";
		$res = "<img id='imgcenter' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
		$res .= "<span><a href='" . $val ['id'] . "' >";
		$res .= $val ['first_name'] . " " . $val ['last_name'] . "</a><span></div>";
		echo $res;
	}
}
echo "<hr/>Based on Name <hr/>";
foreach ( $arrData ["name"] as $key => $val ) {
	if ($val ['id'] != "") {
		$res = "<div id='dvres'>";
		$res = "<img id='imgcenter'src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
		$res .= "<a href='" . $val ['id'] . "' >";
		$res .= $val ['first_name'] . " " . $val ['last_name'] . "</a></div>";
		echo $res;
	}
}
echo "<hr/>Based on Company <hr/>";
foreach ( $arrData ["company"] as $key => $val ) {
	if ($val ['id'] != "") {
		$res = "<div id='dvres'>";
		$res = "<img src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
		$res .= "<a href='" . $val ['id'] . "' >";
		$res .= $val ['company_name'] . "</a></div>";
		echo $res;
	}
}

?>

