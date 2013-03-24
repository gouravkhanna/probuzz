<script type="text/javascript" src="js/proProfile.js"></script>
<b><form name="form4">
<?php
	if(isset($_REQUEST['id'])) {
		if($_REQUEST['id']) {
?>
			
			//echo $_REQUEST['id'];
<?php } else {
			echo "Internal Error Occured..";
		}	
	} else {
?>
		<table>
			<caption><?php echo strtoupper("Add New Qualification");?></caption>
			<tr>
			   <td><?php echo strtoupper("Class/Degree/Diploma :"); ?></td>
			   <td><input type="text" name="class"/></td>
			</tr></div>
			<tr>
				<td><?php echo strtoupper("Qualification Type :");?></td>
				<td>
					<select name="qualification_type">
						<option ><?php echo strtoupper("Select");?></option>
						<option><?php echo strtoupper("Under Graduation");?></option>
						<option><?php echo strtoupper("Graduation");?></option>
						<option><?php echo strtoupper("Post Graduation");?></option>
						<option><?php echo strtoupper("Diploma");?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo strtoupper("School/Institute :");?></td>
				<td><input type="text" name="institute"/></td>
			</tr>
			<tr>
				<td><?php echo strtoupper("Board/University :");?></td>
				<td><input type="text" name ="university"/></td>
			</tr>
			<tr>
				<td><?php echo strtoupper("Start Year :");?></td>
				<td><input type="text" name="start_year"/></td>
			</tr>
			<tr>
				<td><?php echo strtoupper("End Year :");?></td>
				<td><input type="text" name="end_year"/></td>
			</tr>
			<tr>
				<td><?php echo strtoupper("Percentage :");?></td>
				<td><input type="text" name="percentage"/></td>
			</tr>
			<tr>
				<td><?php echo strtoupper("Major Subjects :");?></td>
				<td><textarea name="subject_studied" rows="3" cols="30"></textarea></td>
			</tr>
			<tr>
				<td><?php echo strtoupper("Field :");?></td>
				<td><input type="text" name="field"/></td>
			</tr>
			<tr>
				<td class="proSubmit" colspan="2" >
					<input type="button" value="<?php echo "SUBMIT";?>" onclick="insertQual('form4')" />
				</td>
			</tr>
		</table>
<?php
		//echo "none";
	}
	
?>
</form></b>