<script>
	
$(function() {
    $( "#d" ).datepicker({
        dateFormat : 'yy-mm-dd'
    });
    $( "#d1" ).datepicker({
        dateFormat : 'yy-mm-dd'
    });
});
</script>
<b><form id="form4" class="qual profileForm">
<?php
	$flag=0;
	if(isset($_REQUEST['rowId'])) {
		if($_REQUEST['rowId']) {
			$flag=1;
			$rowId=$_REQUEST['rowId'];
			//$qual=mysql_fetch_assoc($arrData);
			$qual=$arrData->fetch(PDO::FETCH_ASSOC);
			
		}
	}
	
	
?>
<table>
		<caption>
		<?php
			if($flag) {
				echo strtoupper(UPDATE_QUALIFICATION);
			} else {
				echo strtoupper(ADD_NEW_QUALIFICATION);
			}
		?>
		</caption>
		<tr>
		   <td><?php echo strtoupper(CLASS_DEGREE_DIPLOMA); ?></td>
		   <td><input type="text" id="q_class" name="class" value="<?php if($flag) { echo $qual['class'];} ?>" />
		   <span id="class_asterisk" class="asterisk">*</span>
		   </td>
		</tr>
		</div>
		<tr>
			<td><?php echo strtoupper(QUALIFICATION_TYPE);?></td>
			<td>
				<select id="q_type" name="qualification_type" ">
					<option value="0" <?php if($flag && !$qual['qualification_type']) { echo "selected='selected' ";} ?> >
					<?php echo strtoupper(SELECT);?></option>
					<option value="Under Graduation" <?php if($flag && $qual['qualification_type']=="Under Graduation") { echo "selected='selected' ";} ?> >
						<?php echo strtoupper(UNDER_GRADUATION);?></option>
					<option value="Graduation"  <?php if($flag && $qual['qualification_type']=="Graduation") { echo "selected='selected' ";} ?>>
						<?php echo strtoupper(GRADUATION);?></option>
					<option value="Post Graduation"  <?php if($flag && $qual['qualification_type']=="Post Graduation") { echo "selected='selected' ";} ?>>
						<?php echo strtoupper(POST_GRADUATION);?></option>
					<option value="Diploma" <?php if($flag && $qual['qualification_type']=="Diploma") { echo "selected='selected' ";} ?>>
						<?php echo strtoupper(DIPLOMA);?></option>
				</select>
				<span id="type_asterisk" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(SCHOOL_INSTITUTE);?></td>
			<td>
				<input type="text" name="institute" value="<?php if($flag) { echo $qual['institute'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(BOARD_UNIVERSITY);?></td>
			<td>
				<input type="text" name ="university" value="<?php if($flag) { echo $qual['university'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(START_YEAR);?></td>
			<td>
				<input type="text" id="d"  name="start_year" value="<?php if($flag) { echo $qual['start_year'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(END_YEAR);?></td>
			<td>
				<input type="text" id="d1" name="end_year" value="<?php if($flag) { echo $qual['end_year'];} ?>"/>
				<span id="date_asterisk" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(PERCENTAGE);?></td>
			<td>
				<input type="text" name="percentage" value="<?php if($flag) { echo $qual['percentage'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(MAJOR_SUBJECTS);?></td>
			<td>
				<textarea name="subject_studied" rows="3" cols="30"><?php if($flag) { echo $qual['subject_studied'];} ?></textarea>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(FIELD);?></td>
			<td>
				<input type="text" name="field" value="<?php if($flag) { echo $qual['field'];} ?>"/>
				<span id="" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td class="proSubmit" >
				<input type="button" value="<?php if($flag) { echo UPDATE_QUALIFICATION;} else {echo ADD_QUALIFICATION;}?>"
				onclick="<?php if($flag) { echo "updateInto('qual',$rowId);"; } else { echo "insertInto('qual');";}
				?>" />
			</td>
			<td class="proSubmit" >
				<input type="button" value="<?php echo CLOSE;?>" onclick="closeFancy()"/>
			</td>
		</tr>
	</table>
	
	
</form>
<div class="errorDiv">
		<span id="typeError" class="error"></span><br/>
</div>
</b>