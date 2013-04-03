<?php
if ($arrData ['status'] == true) {
    echo ALREADY_APPLIED_FOR_JOB;
} else {
    echo APPLY_FOR_THE_JOB;
    echo "<button id='sjapplyjob' onclick=fncapplyJob('" . $arrData ['jobid'] . "') >";
    echo APPLY."</button>";
}

?>