<div id="bigmid">
<div id="usshowmsg"></div>

	<table id="buzztable">
		<thead>
<?php
if (isset ( $arrData )) {
    echo "<th>" . SNO . "</th><th>" . NAME . "</th><th>" . EMAIL . "</th><th>" . DETAILS . "</th><th>" . TIME . "</th><th>" . STATUS . "</th><th>" . ACTION1 . "</th>";
    ?>
</thead>
		<tbody>
<?php
    $i = 1;

    foreach ( $arrData as $val ) {
        if (isset ( $val ) && ! empty ( $val ['name'] )) {            
            echo "<tr id='row".$val ['id']."'><td>$i</td>";
            echo "<td id=btname>" . $val ['name'] . "</td>";
            echo "<td id=btemail>" . $val ['email'] . "</td>";
            echo "<td id=btdetails>". $val ['details'] ."</td>";
            echo "<td >". $val ['contact_time'] ."</td>";
            if($val ['details_read'] ==0) {
                echo "<td>". UNREAD ."</td>";
            } else {
                echo "<td>". READ ."</td>";
            }
            echo "<td><button onclick=markRead('".$val ['id']."')>".MARK_READ."</button></td>";
            echo "</tr>";
            $i++;
        }
    }
} else {
    echo "All Information Read";
}
?>
</tbody>
	</table>
	 
           
                
            

</div>