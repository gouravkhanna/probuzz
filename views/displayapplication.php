<div id="bigmid">
<div id="sjsearchres">
<?php if (! empty ( $arrData )) {
	echo "<div id='sjresulttable' ><div id='sjresultrow'><div id='sjresultcol'>DESIGNATION</div><div id='sjresultcol'>LOCATION</div><div id='sjresultcol'>POSTED BY</div><div id='sjresultcol'>START DATE</div><div id='sjresultcol'>END DATE</div></div>";
	foreach ( $arrData as $key => $val ) {
		if ($val ['id'] != "") {
			$res = " <div id='sjresultrow' class=floatl> ";
			$res .="<button onclick=fnLoadJobUser2('" . $val ['id'] . "') >";
			$res .= "<div id='sjresultcol' >".$val['designation']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['location']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['company_name']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['appliying_date']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['id']."</div> ";
			$res .= "</button>";
			$res .= "</div>";
			echo $res;
		}
	}
	echo "</div>";
}
?>

</div>
<button id='sjbackbutton'>Back</button> 

<div id="sjappstatus"></div>
<div id="sjjob"></div>
</div>