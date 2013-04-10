<div id="bigmid">
<div id="sjsearchres"><div id='sjresdata'>
<?php
if (! empty ( $arrData[0] )) {
	
	foreach ( $arrData as $key => $val ) {
		if ($val ['jobid'] != "") {
			$res = " <div id='sjresultrow' class=floatl > ";
			$res .="<button id='sjbtn' onclick=fnLoadJobSearch('" . $val ['jobid'] . "') >";
			$res .= "<div id='sjresulthead' >".$val['company_name']."</div><hr/> ";
			$res .= "<div id='sjresultcol' >".$val['designation']."</div> ";
			$res .= "<div id='sjresultcol' >".$val['location']."</div> ";
			if(!empty($val['startdate'])) {
				$res .= "<div id='sjresultcol' > Start Date ".$val['startdate']."</div> ";
			}
			if(!empty($val['lastdate'])) {
				$res .= "<div id='sjresultcol' >  End Date ".$val['lastdate']."</div> ";
			}
			$res .= "</button>";
			$res .= "</div>";
			
			echo $res;
		}
	}

}else {
    echo NRF;
}

?>
			        </div>

</div>
<button id='sjbackbutton'><?php echo BACK;?></button>

	<div id="sjappstatus"></div>
	<div id="sjjob"></div>
</div>