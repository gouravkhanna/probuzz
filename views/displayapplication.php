<div id="bigmid">
	<div id="sjsearchres">
<?php

if (! empty ( $arrData ) && $arrData[0]['id']!="") {
    echo "<div id='showfrnddiv'><h2>". APPLICATIONS ."</h2> </div>";
    foreach ( $arrData as $key => $val ) {
        if ($val ['id'] != "") {
            $res = " <div id='sjresultrow' class=floatl> ";
            $res .= "<button id='sjbtn' class='jptr' onclick=fnLoadJobUser2('" . $val ['id'] . "') >";
            $res .= "<div id='sjresultcol' >" . $val ['company_name'] . "</div> ";
            $res .= "<div id='sjresultcol' >" . $val ['designation'] . "</div> <hr>";
            $res .= "<div id='sjresultcol' >" . $val ['location'] . "</div> ";
            $res .= "<div id='sjresultcol' >" . $val ['appliying_date'] . "</div> ";
            $res .= "</button>";
            $res .= "</div>";
            echo $res;
        }
       
    }
} else {

  echo "<div id='showfrnddiv'><h2>". NRF ."</h2></div>";
}
?>

</div>
	<button id='sjbackbutton'>Back</button>
	<div id="sjappstatus"></div>
	<div id="sjjob"></div>
</div>