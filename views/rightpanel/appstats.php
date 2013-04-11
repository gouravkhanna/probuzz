<div id="rightpanel">

<?php
echo "<div class=bluebutton >" . JOBS_STATS . "</div><hr/>";
if (! empty ( $arrData )) {
    echo TOTAL_JOBS . $arrData ['total_jobs'] . "<hr/>";
    echo TOTAL_ACTIVE_JOBS . $arrData ['total_active_jobs'] . "<hr/>";
    echo TOTAL_SUBSCRIBER . $arrData ['total_subscriber'] . "<hr/>";
}
?>
</div>