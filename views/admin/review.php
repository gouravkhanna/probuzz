<div id="midpanel">
	<div id="usshowmsg"></div>

	<table id="buzztable">
		<thead>
<?php
if (isset ( $arrData )) {
    echo "<th>" . SNO . "</th><th>" . SPAM_COUNT . "</th><th>" . SPAM_ID . "</th><th>" . SPAM_TYPE . "</th><th>" . REVIEW_ACTION . "</th><th>" . REVIEW_TIME . "</th>";
    ?>
</thead>
		<tbody>
<?php
    $i = 1;
    foreach ( $arrData as $val ) {
        if (isset ( $val ) && ! empty ( $val ['spam_id'] )) {
            
            echo "<tr id='row" . $val ['spam_id'] . "'><td>$i</td>";
            echo "<td>" . $val ['spam_count'] . "</td>";
            if ($val ['spam_type'] == 0) {
                echo "<td><a href=" . ROOTPATH . "status/buzz/" . base64_encode ( $val ['spam_id'] ) . ">";
                echo $val ['spam_id'] . "</a></td>";
                echo "<td>" . BUZZ_SPAM . "</td>";
            } else {
                echo "<td><a href=" . ROOTPATH . "?controller=friends&url=friendsProfile&friendId=" . $val ['spam_id'] . ">";
                echo $val ['spam_id'] . "</a></td>";
                echo "<td>" . USER_SPAM . "</td>";
            }
            if ($val ['spam_action'] == 0) {
                echo "<td>" . CLEAR_SPAM . "    </td>";
            } else if ($val ['spam_action'] == 1 && $val ['spam_type'] == 0) {
                echo "<td>" . DELETE_BUZZ . "    </td>";
            } else if ($val ['spam_action'] == 1 && $val ['spam_type'] == 1) {
                echo "<td>" . DELETE_USER . "    </td>";
            } else if ($val ['spam_action'] == 2) {
                echo "<td>" . BUFOD . "    </td>";
            } else {
                echo "<td>" . BUP . "    </td>";
            }
            echo "<td>" . $val ['spam_review_time'] . "</td>";
            
            echo "</tr>";
            $i ++;
        }
    }
} else {
    echo "Hurray NO SPAM";
}
?>
</tbody>
	</table>





</div>