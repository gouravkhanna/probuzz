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
<b><form id="form5" class="cert profileForm">
<?php
	//echo "<pre>";
	$flag=0;
	if(isset($_REQUEST['rowId'])) {
		if($_REQUEST['rowId']) {
			$flag=1;
			$rowId=$_REQUEST['rowId'];
			//$cert=mysql_fetch_assoc($arrData);
			$cert=$arrData->fetch(PDO::FETCH_ASSOC);
			
		}
	}
	
	
?>
	<table>
		<caption>
		<?php
			if($flag) {
				echo strtoupper(UPDATE_CERTIFICATION);
			} else {
				echo strtoupper(ADD_NEW_CERTIFICATION);
			}
		?>
		
		</caption>
		<tr>
			<td><?php echo strtoupper(CERTIFICATION_NAME); ?></td>
			<td>
				<input type="text" id="certification_name" name="certification_name" value="<?php if($flag) { echo $cert['certification_name'];} ?>"/>
				<span id="cert_name_asterisk" class="asterisk">*</span>
			</td>
		</tr></div>
		<tr>
			<td><?php echo strtoupper(INSTITUTION_NAME);?></td>
			<td>
				<input type="text" id="certification_institute" name="institution" value="<?php if($flag) { echo $cert['institution'];} ?>"/>
				<span id="certification_institute_asterisk" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(CERTIFICATION_YEAR." :");?></td>
			<td>
				<input type="text" id="d2" name="certification_year" value="<?php if($flag) { echo $cert['certification_year'];} ?>"/>
				<span id="certification_year_asterisk" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td><?php echo strtoupper(VALID_TILL." :");?></td>
			<td>
				<input type="text" id="d3" name="validity" value="<?php if($flag) { echo $cert['validity'];} ?>"/>
				<span id="certification_validity_asterisk" class="asterisk">*</span>
			</td>
		</tr>
		<tr>
			<td class="proSubmit" >
				<input type="button" value="<?php if($flag) { echo UPDATE_CERTIFICATION;} else {echo ADD_CERTIFICATION;}?>"
				onclick="<?php if($flag) { echo "updateInto('cert',$rowId)"; } else { echo "insertInto('cert')";}
				?>" />
			</td>
			<td class="proSubmit" >
				<input type="button" value="<?php echo CLOSE;?>" onclick="closeFancy()"/>
			</td>
		</tr>
	</table>
</form>

</b>
