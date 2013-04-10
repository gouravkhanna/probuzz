<div id="midpanel">
<div id="usshowmsg"></div>

	<table id="buzztablem">
		<thead>
<?php
if (isset ( $arrData )) {
    echo "<th>" . SNO . "</th><th>" . SPAM_COUNT . "</th><th>" . SPAM_ID . "</th><th>" . ACTION1 . "</th><th>" . ACTION2 . "</th><th>" . ACTION3 . "</th>";
    ?>
</thead>
		<tbody>
<?php
    $i = 1;
    foreach ( $arrData as $val ) {
        if (isset ( $val ) && ! empty ( $val ['spam_id'] )) {
            
            echo "<tr id='row".$val ['spam_id']."'><td>$i</td>";
            echo "<td>" . $val ['spam_count'] . "</td>";
            echo "<td><a href=".ROOTPATH."?controller=friends&url=friendsProfile&friendId=".$val ['spam_id'].">";             
            echo $val ['spam_id'] ."</a></td>";
            echo "<td><button onclick=clearUserSpam('".$val ['spam_id']."')>".CLEAR_SPAM."</button></td>";
            echo "<td><button onclick=banUserOneDay('".$val ['spam_id']."')>".BUFOD."</button></td>";
            echo "<td><button onclick=banUserOnePermanent('".$val ['spam_id']."')>".BUP."</button></td>";
            echo "</tr>";
            $i++;
        }
    }
} else {
    echo NO_SPAM;
}
?>
</tbody>
	</table>
	 
           
                       
                
            

</div>