<?php

echo "<hr/>Based on User Name <hr/>";
foreach ( $arrData ["username"] as $key => $val ) {
	$res= "<div id='dvres'>";
	$res= "<img src=".ROOTPATH.$val['path']." height=50 width=50 >";
	$res.="<a href='".$val ['id'] ."' >";
	$res.=$val ['first_name']." " . $val ['last_name'] . "</a></div>";
	echo $res;
}
echo "<hr/>Based on Name <hr/>";
foreach ( $arrData ["name"] as $key => $val ) {
	$res= "<div id='dvres'>";
	$res= "<img src=".ROOTPATH.$val['path']." height=50 width=50 >";
	$res.="<a href='".$val ['id'] ."' >";
	$res.=$val ['first_name']." " . $val ['last_name'] . "</a></div>";
	echo $res;
	
}
echo "<hr/>Based on Company <hr/>";
foreach ( $arrData ["company"] as $key => $val ) {
	$res= "<div id='dvres'>";
	$res= "<img src=".ROOTPATH.$val['path']." height=50 width=50 >";
	$res.="<a href='".$val ['id'] ."' >";
	$res.=$val ['company_name'] . "</a></div>";
	echo $res;
	
}

?>

