<div id="midpanel">
	<div id="errorDiv">
        <?php
        if (isset ( $_SESSION ['error'] )) {
            echo $_SESSION ['error'];
            unset ( $_SESSION ['error'] );
        }
        ?>
    </div>

	<span id="pagehead1"> <?php echo CREATE_NEW_JOB;?></span> <br /> <a
		class="ralign" href="createjobs"><?php echo BACK;?></a> <span
		class="formhead1">
	<?php
echo FILLFORM;
$row = $arrData->fetch ( PDO::FETCH_ASSOC );

?>
	</span>
	<hr />
	<div id="updateJobDiv">
		<form id="createjobform" action="" method="get" onload="loadDate()">
			<div id="">
				<div id="divjb">
					<fieldset id="fsdesignation">
						<legend>
							<label id="jblbl"> 
							<?php echo JOB_DESCIPTION; ?>
							</label>
						</legend>
						<?php echo DESIGNATION; ?><br /> <input id=designation
							name=designation value='<?php echo $row['designation']; ?>'>

					</fieldset>
				</div>
				<br>
				<div id="divjb">
					<fieldset id="fstype">
						<legend>
							<label id="jblbl"> <?php  echo EDIT; ?> </label>
						</legend>
						<label id="jblbl"> <?php  echo TYPE; ?> </label> <select
							name="type" id="type" selected='<?php echo $row['type']; ?>'>
							<option><?php echo TEMPORARY; ?></option>
							<option><?php echo PERMANENT; ?></option>
							<option><?php echo FREELANCER; ?></option>
							<option><?php echo PAYJOB; ?></option>
						</select> <label id="jblbl"> <?php  echo LOCATION; ?> </label> <input
							type="text" class="tex" name="location" id="location"
							value='<?php echo @$row['location']; ?>'> 
							<label id="jblbl"> <?php  echo ROLE; ?>	</label>
						<input type="text" name="role" id="role"
							value='<?php echo @$row['role']; ?>'> 
							<label id="jblbl"> <?php  echo START_DATE; ?>  </label>
						<input type="text" name="start_date" id="start_date"
							value='<?php echo @$row['start_date']; ?>'>
							 <label id="jblbl"> <?php  echo LAST_DATE; ?>  </label>
						<input type="text" name="last_date" id="last_date"
							value='<?php echo @$row['last_date']; ?>'>
							 <label id="jblbl"> <?php  echo EXPRIANCE; ?>  </label>
						<textarea name="experience" id="experience"><?php echo @$row['experience']; ?>
						</textarea>
						<label id="jblbl"> <?php  echo RESPONSIBLITY; ?>  </label>
    					<textarea name="responsiblity" id="responsiblity"><?php echo @$row['responsiblity']; ?></textarea>
						<label id="jblbl"> <?php  echo AREA_OF_WORK; ?></label>
						<textarea name="area_of_work" id="area_of_work"><?php echo @$row['area_of_work']; ?></textarea>
						<label id="jblbl"> <?php  echo SKILLS_REQUIRED; ?>  </label>
						<textarea name="skills_required" id="skills_required"><?php echo @$row['skills_required']; ?>
                        </textarea>
						<label id="jblbl"> <?php  echo CONTACT_PERSON; ?>  </label> <input
							type="text" name="contact_person" id="contact_person"
							value='<?php echo @$row['contact_person']; ?>'> 
						<label id="jblbl"> <?php  echo PHONE_NUMBER; ?>  </label>
						<input type="text" name="phone_number" id="phone_number"
							onblur="jsCheckNumber(this.id)"
							value='<?php echo @$row['phone_number']; ?>'> <label id="jblbl"> <?php  echo KEYWORDS; ?>  </label>

						<textarea name="keywords" id="keywords"
							title="seprate Keywords by Comma"><?php echo @$row['keywords']; ?>
						</textarea>
						<label id="jblbl"> <?php  echo NUMBER_OF_VACANCY; ?>  </label> <input
							type="text" name="number_of_vacancy" id="number_of_vacancy"
							onblur="jsCheckNumber(this.id)"
							value='<?php echo @$row['number_of_vacancy']; ?>'> <label
							id="jblbl"> <?php  echo PROCESS_DETAILS; ?>  </label>
						<textarea name="process_details" id="process_details"><?php echo @$row['process_details']; ?>
						</textarea>
						<label id="jblbl"> <?php  echo SALARY; ?>  </label> <input
							type="text" name="salary_expected" id="salary_expected"
							onblur="jsCheckNumber(this.id)"
							value='<?php echo @$row['salary_expected']; ?>'>
					</fieldset>



				</div>
				<br>
				<div id="divjb">
					<fieldset id="fsother_info">
						<legend>
							<label id="jblbl"> <?php  echo OTHER_INFO; ?>  </label>
						</legend>
						<label id="jblbl"> <?php  echo TECHNICAL; ?>  </label>
						<textarea name="other_info" id="other_info"><?php echo @$row['other_info']; ?>
						</textarea>
						<label id="jblbl"> <?php  echo CRITERIA; ?>  </label>
						<textarea name="criteria" id="criteria"><?php echo @$row['criteria']; ?>
						</textarea>
						<label id="jblbl"> <?php  echo SALARY_RANGE; ?>  </label> <input
							type="text" name="salary_range" id="salary_range"
							value='<?php echo @$row['salary_range']; ?>'>
					</fieldset>
				</div>
			</div>
			<input id=jbsub " type="hidden" name=jobId
				value='<?php echo @$_REQUEST['jobId']; ?>'> <input id="jbsub"
				type="hidden" name="url" value="updateSlot"> <input id="jbsub"
				type="submit" name="submit" value="Update Slot">
		</form>
	</div>
</div>
<script>
   		$("#start_date").datepicker({
        dateFormat : 'yy-mm-dd'
    });
		$("#last_date").datepicker({
        dateFormat : 'yy-mm-dd'
    });
	 	    
	</script>