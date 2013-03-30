<div id="rightpanel">

<?php
echo "<h1 >".JOBS_STATS."</h1><hr/>";
if(!empty($arrData)) {
	echo TOTAL_JOBS.$arrData['total_jobs']."<hr/>";
	echo TOTAL_ACTIVE_JOBS.$arrData['total_active_jobs']."<hr/>";
	
}
?>
</div>