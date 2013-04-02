<br/><br/><br/>
<?php

//	print_r($arrData);

echo "<div id='sjresdata'>";
if (! empty ( $arrData[0] )) {
	/* echo "<div id='sjresulttable' ><div id='sjresultrow'><div id='sjresultcol'>DESIGNATION</div>
		<div id='sjresultcol'>LOCATION</div><div id='sjresultcol'>POSTED BY</div>
		<div id='sjresultcol'>START DATE</div>
		<div id='sjresultcol'>END DATE</div>
		</div>"; */
	foreach ( $arrData as $key => $val ) {
		if ($val ['jobid'] != "") {
			$res = " <div id='sjresultrow' class=floatl > ";
			$res .="<button id='sjbtn' onclick=fnLoadJobSearch('" . $val ['jobid'] . "') >";
			$res .= "<div id='sjresulthead' >".$val['company_name']."</div><hr/> ";
			$res .= "<div id='sjresultcol' >".$val['designation']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['location']."</div> ";
			if(!empty($val['startdate'])) {
				$res .= "<div id='sjresultcol' > Start Date ".$val['startdate']." ";
			}
			if(!empty($val['lastdate'])) {
				$res .= "  End Date ".$val['lastdate']."</div> ";
			}
			$res .= "</button>";
			$res .= "</div>";
			
			echo $res;
		}
	}
	//echo "</div>";
}

echo "</div>"; 
?>
