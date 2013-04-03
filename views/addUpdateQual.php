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
<b><form id="form4" class="qual">
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
				echo strtoupper("Update Qualification");
			} else {
				echo strtoupper("Add New Qualification");
			}
		?>
		</caption>
		<tr>
		   <td><?php echo strtoupper("Class/Degree/Diploma :"); ?></td>
		   <td><input type="text" name="class" value="<?php if($flag) { echo $qual['class'];} ?>"/></td>
		</tr></div>
		<tr>
			<td><?php echo strtoupper("Qualification Type :");?></td>
			<td>
				<select name="qualification_type">
					<option value="0" <?php if($flag && !$qual['qualification_type']) { echo "selected='selected' ";} ?> >
					<?php echo strtoupper("Select");?></option>
					<option value="Under Graduation" <?php if($flag && $qual['qualification_type']=="Under Graduation") { echo "selected='selected' ";} ?> >
						<?php echo strtoupper("Under Graduation");?></option>
					<option value="Graduation"  <?php if($flag && $qual['qualification_type']=="Graduation") { echo "selected='selected' ";} ?>>
						<?php echo strtoupper("Graduation");?></option>
					<option value="Post Graduation"  <?php if($flag && $qual['qualification_type']=="Post Graduation") { echo "selected='selected' ";} ?>>
						<?php echo strtoupper("Post Graduation");?></option>
					<option value="Diploma" <?php if($flag && $qual['qualification_type']=="Diploma") { echo "selected='selected' ";} ?>>
						<?php echo strtoupper("Diploma");?></option>
				</select>	
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper("School/Institute :");?></td>
			<td><input type="text" name="institute" value="<?php if($flag) { echo $qual['institute'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Board/University :");?></td>
			<td><input type="text" name ="university" value="<?php if($flag) { echo $qual['university'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Start Year :");?></td>
			<td><input type="text" id="d" name="start_year" value="<?php if($flag) { echo $qual['start_year'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("End Year :");?></td>
			<td><input type="text" id="d1" name="end_year" value="<?php if($flag) { echo $qual['end_year'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Percentage :");?></td>
			<td><input type="text" name="percentage" value="<?php if($flag) { echo $qual['percentage'];} ?>"/></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Major Subjects :");?></td>
			<td><textarea name="subject_studied" rows="3" cols="30"><?php if($flag) { echo $qual['subject_studied'];} ?></textarea></td>
		</tr>
		<tr>
			<td><?php echo strtoupper("Field :");?></td>
			<td><input type="text" name="field" value="<?php if($flag) { echo $qual['field'];} ?>"/></td>
		</tr>
		<tr>
			<td class="proSubmit" >
				<input type="button" value="<?php if($flag) { echo 'Update Qualification';} else {echo 'Add Qualification';}?>"
				onclick="<?php if($flag) { echo "updateInto('qual',$rowId)"; } else { echo "insertInto('qual')";}
				?>" />
			</td>
			<td class="proSubmit" >
				<input type="button" value="<?php echo "CLOSE";?>" onclick="closeFancy()"/>
			</td>
		</tr>
	</table>
</form></b>
