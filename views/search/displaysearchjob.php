<?php
echo "<pre>";
//	print_r($arrData);

echo "<div id='sjresdata'>";
if (! empty ( $arrData[0] )) {
	echo "<div id='sjresulttable' ><div id='sjresultrow'><div id='sjresultcol'>DESIGNATION</div><div id='sjresultcol'>LOCATION</div><div id='sjresultcol'>POSTED BY</div><div id='sjresultcol'>START DATE</div><div id='sjresultcol'>END DATE</div></div>";
	foreach ( $arrData as $key => $val ) {
		if ($val ['jobid'] != "") {
			$res = " <div id='sjresultrow' class=floatl> ";
			$res .="<button onclick=fnLoadJobSearch('" . $val ['jobid'] . "') >";
			$res .= "<div id='sjresultcol' >".$val['designation']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['location']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['company_name']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['startdate']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['lastdate']."</div> ";
			$res .= "</button>";
			$res .= "</div>";
			
			echo $res;
		}
	}
	echo "</div>";
}

echo "</div>"; 
?>
