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
			//$exp=mysql_fetch_assoc($arrData);
			$exp=$arrData->fetch(PDO::FETCH_ASSOC);
			
		}
	}
	
	
?>
	<table>
		<caption>
		<?php
			if($flag) {
				echo strtoupper(UPDATE_EXPERIENCE);
			} else {
				echo strtoupper(ADD_NEW_EXPERIENCE);
			}
		?>
		</caption>
		<tr>
		   <td><?php echo strtoupper(COMPANY_NAME); ?></td>
		   <td><input type="text" name="company_name" value="<?php if($flag) { echo $exp['company_name'];} ?>"/></td>
		</tr></div>
		<tr>
			<td><?php echo strtoupper(POSITION);?></td>
			<td><input type="text" name="position" value="<?php if($flag) { echo $exp['position'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper(FROM);?></td>
			<td><input type="text" id="d4" name="start_date" value="<?php if($flag) { echo $exp['start_date'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper(TO);?></td>
			<td><input type="text" id="d5" name="end_date" value="<?php if($flag) { echo $exp['end_date'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper(CURRENT_JOB);?></td>
			<td><input type="text" id="d5" name="current_job" value="<?php if($flag) { echo $exp['current_job'];} ?>"/></td>
		</tr>
		<tr>
			<td class="proSubmit" >
				<input type="button" value="<?php if($flag) { echo UPDATE_EXPERIENCE;} else {echo ADD_EXPERIENCE;}?>"
				onclick="<?php if($flag) { echo "updateInto('exp',$rowId)"; } else { echo "insertInto('exp')";}
				?>" />
			</td>
			<td class="proSubmit" >
				<input type="button" value="<?php echo CLOSE;?>" onclick="closeFancy()"/>
			</td>
		</tr>
	</table>
</form></b>
