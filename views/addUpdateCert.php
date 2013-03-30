<script>
$(function() {
    $( "#d2" ).datepicker({
        dateFormat : 'yy-mm-dd'
    });
    $( "#d3" ).datepicker({
        dateFormat : 'yy-mm-dd'
    });
});
</script>
<b><form id="form5" class="cert">
<?php
	//echo "<pre>";
	$flag=0;
	if(isset($_REQUEST['rowId'])) {
		if($_REQUEST['rowId']) {
			$flag=1;
			$rowId=$_REQUEST['rowId'];
			$cert=mysql_fetch_assoc($arrData);
			
		}
		//echo $rowId."<br/>";
		//print_r($cert);
	}
	
	
?>
	<table>
		<caption>
		<?php
			if($flag) {
				echo strtoupper("Update Certification");
			} else {
				echo strtoupper("Add New Certification");
			}
		?>
		</caption>
		<tr>
		   <td><?php echo strtoupper("Certification Name :"); ?></td>
		   <td><input type="text" name="certification_name" value="<?php if($flag) { echo $cert['certification_name'];} ?>"/></td>
		</tr></div>
		<tr>
			<td><?php echo strtoupper("Institution Name :");?></td>
			<td><input type="text" name="institution" value="<?php if($flag) { echo $cert['institution'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Certification Year :");?></td>
			<td><input type="text" id="d2" name="certification_year" value="<?php if($flag) { echo $cert['certification_year'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Valid Till :");?></td>
			<td><input type="text" id="d3" name="validity" value="<?php if($flag) { echo $cert['validity'];} ?>"/></td>
		</tr>
		<tr>
			<td class="proSubmit" >
				<input type="button" value="<?php if($flag) { echo 'Update Certification';} else {echo 'Add Certification';}?>"
				onclick="<?php if($flag) { echo "updateCert('cert',$rowId)"; } else { echo "insertCert('cert')";}
				?>" />
			</td>
			<td class="proSubmit" >
				<input type="button" value="<?php echo "CLOSE";?>" onclick="closeFancy()"/>
			</td>
		</tr>
	</table>
</form></b>
