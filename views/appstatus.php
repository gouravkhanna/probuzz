<?php 
if($arrData['status']==true) {
	echo "Already Applied for JOb";
} else {
	echo "Apply For the Job";
echo "<button id='sjapplyjob' onclick=fncapplyJob('".$arrData['jobid']."') >Apply</button>";	
}

?>