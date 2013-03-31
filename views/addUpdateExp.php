<script>
$(function() {
    $( "#d4" ).datepicker({
        dateFormat : 'yy-mm-dd'
    });
    $( "#d5" ).datepicker({
        dateFormat : 'yy-mm-dd'
    });
});
</script>
<b><form id="form6" class="exp">
<?php
	//echo "<pre>";
	$flag=0;
	if(isset($_REQUEST['rowId'])) {
		if($_REQUEST['rowId']) {
			$flag=1;
			$rowId=$_REQUEST['rowId'];
			$exp=mysql_fetch_assoc($arrData);
			
		}
		//echo $rowId."<br/>";
		//print_r($exp);
	}
	
	
?>
	<table>
		<caption>
		<?php
			if($flag) {
				echo strtoupper("Update Experience");
			} else {
				echo strtoupper("Add New Experience");
			}
		?>
		</caption>
		<tr>
		   <td><?php echo strtoupper("Company Name :"); ?></td>
		   <td><input type="text" name="company_name" value="<?php if($flag) { echo $exp['company_name'];} ?>"/></td>
		</tr></div>
		<tr>
			<td><?php echo strtoupper("Position :");?></td>
			<td><input type="text" name="position" value="<?php if($flag) { echo $exp['position'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("From :");?></td>
			<td><input type="text" id="d4" name="start_date" value="<?php if($flag) { echo $exp['start_date'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("To :");?></td>
			<td><input type="text" id="d5" name="end_date" value="<?php if($flag) { echo $exp['end_date'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Current Job :");?></td>
			<td><input type="text" id="d5" name="current_job" value="<?php if($flag) { echo $exp['current_job'];} ?>"/></td>
		</tr>
		<tr>
			<td class="proSubmit" >
				<input type="button" value="<?php if($flag) { echo 'Update Experience';} else {echo 'Add Experience';}?>"
				onclick="<?php if($flag) { echo "updateExp('exp',$rowId)"; } else { echo "insertExp('exp')";}
				?>" />
			</td>
			<td class="proSubmit" >
				<input type="button" value="<?php echo "CLOSE";?>" onclick="closeFancy()"/>
			</td>
		</tr>
	</table>
</form></b>
