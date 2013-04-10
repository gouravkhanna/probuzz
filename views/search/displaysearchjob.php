<br/><br/><br/>
<?php

echo "<div id='sjresdata'>";

if (! empty ( $arrData[0] )) {
	
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
				$res .= END_DATE." ".$val['lastdate']."</div> ";
			}
			$res .= "</button>";
			$res .= "</div>";
			
			echo $res;
		}
	}

}else {
    echo NRF;
}

echo "</div>"; 
?>
