<div id="midpanel">
<div id="usshowmsg"></div>

	<table id="buzztablem">
		<thead>
<?php
	//echo "<pre>";
	//print_r($arrData);
if (isset ( $arrData )) {
    echo "<th>" . SNO . "</th><th>" . USER_NAME . "</th><th>" . STATUS . "</th><th>" . ACTION1 . "</th><th>" . ACTION2 . "</th><th>" . ACTION3 . "</th>";
    ?>
</thead>
		<tbody>
<?php

    $i = 1;
    foreach ( $arrData as $val ) {
        if (isset ( $val ) && ! empty ( $val ['user_id'] )) {
            if($val['current_status']==0) {
				$status="Active";
			} else if($val['current_status']==1) {
				$status="InActive";
			} else if($val['current_status']==2) {
				$status="Banned For A Day";
			} else if($val['current_status']==3) {
				$status="Permanently Banned";
			}
			
            echo "<tr id='row".$val ['user_id']."'><td>$i</td>";
            echo "<td>" . $val ['user_name'] . "</td>";
            echo "<td>".$status."</td>";
            echo "<td><button onclick=clearSpam('".$val ['user_id']."')>".CLEAR_SPAM."</button></td>";
            echo "<td><button onclick=buzzDeleteAdmin('".$val ['user_id']."')>".DELETE_USER."</button></td>";
            echo "<td><button onclick=banUserOneDayBuzz('".$val ['user_id']."')>".BAN_4_1_DAY."</button></td>";
            echo "</tr>";
            $i++;
        }
    }
} else {
    echo NO_USERS_TO_DISPLAY;
}
?>
	</tbody>
	</table>

</div>