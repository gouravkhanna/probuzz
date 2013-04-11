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
<b><form id="form6" class="exp profileForm">
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
			<td>
				<input type="text" id="experience_name" name="company_name" value="<?php if($flag) { echo $exp['company_name'];} ?>"/>
				<span id="experience_name_asterisk" class="asterisk">*</span>
	      	</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(POSITION);?></td>
			<td>
				<input type="text" id="experience_position" name="position" value="<?php if($flag) { echo $exp['position'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(FROM);?></td>
			<td>
				<input type="text" id="d4" name="start_date" value="<?php if($flag) { echo $exp['start_date'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(TO);?></td>
			<td>
				<input type="text" id="d5" name="end_date" value="<?php if($flag) { echo $exp['end_date'];} ?>"/>
				<span id="experience_date_asterisk" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(CURRENT_JOB);?></td>
			<td>
				<select id="" name="current_job" >
					<option value="0" <?php if($flag && $exp['current_job']=="0") { echo "selected='selected' ";} ?> >
						<?php echo strtoupper("No");?>
					</option>
					<option value="1" <?php if($flag && $exp['current_job']=="1") { echo "selected='selected' ";} ?> >
						<?php echo strtoupper("Yes");?>
					</option>
				</select>
				<span id="" class="asterisk">*</span>
			</td>
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
</form>
<div class="errorDiv">
	<span id="experienceNameError" class="error"></span><br/>
	<span id="experienceDateDifferenceError" class="error"></span><br/>
	<span id="" class="error"></span><br/>
	<span id="" class="error"></span><br/>
		
</div>
</b>
