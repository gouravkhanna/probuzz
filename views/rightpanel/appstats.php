<div id="rightpanel">

<?php
echo "<div class=bluebutton ><br><span class='marginl10 fontsize16'>" . JOBS_STATS 
. "</span><br><br></div><br>";
if (! empty ( $arrData )) {
	echo "<span class='fontsize16'>";
    echo  TOTAL_JOBS . $arrData ['total_jobs'] . "<br/>";
    echo TOTAL_ACTIVE_JOBS . $arrData ['total_active_jobs'] . "<br/>";
     echo TOTAL_SUBSCRIBER . $arrData ['total_subscriber'] . "<br/>";
      echo "</span>";
}
?>
</div>