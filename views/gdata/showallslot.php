
<?php
echo "<table id='showslot' class='buzztablem'><thead><tr >";
echo "<th>SNO</th><th>CREATED_ON</th><th>LAST_DATE</th>";
echo "<th>STATUS</th><th>DESIGNATION</th></tr></thead><tbody>";
$i = 1;
while ( $row = $arrData->fetch ( PDO::FETCH_ASSOC ) ) {
    if ($i % 2 == 0) {
        $cClass = "even";
    } else {
        $cClass = "odd";
    }
    echo "<tr  id='table" . $row ['id'] . "' onclick=rowColorChange(this.id) ><td>$i</td><td>" . $row ['createddate'];
    $status = $row ['status'] == '0' ? "INACTIVE" : "ACTIVE";
    echo "</td><td>" . $row ['lastdate'] . "</td><td>";
    echo "<button id='buttonstatus" . $row ['id'] . "' title='Click to Change Status' onclick=updateStatusJob(" . $row ['status'] . "," . $row ['id'] . ")> " . $status . "</button></td>";
    echo "<td class='btmdesignation'><a href=index.php?jobId=" . $row ['id'] . "&url=showUpdateSlot >" . $row ['designation'] . "</button></td></tr>";
    $i ++;
}
echo "</tbody></table> ";
?>
<script>
	$(document).tooltip();
	$(".buzztablem").dataTable();
</script>