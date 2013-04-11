<br/><br/>
<?php
$row = $arrData->fetch ( PDO::FETCH_ASSOC );
?>
<br/><br/>

<div id="dvSjob">
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php echo DESIGNATION; ?> </label>
			</legend>
			<span name="designation" id="designation">
			    <?php echo $row['designation']; ?>
			</span>
           <br>
		<span class="tex" name="location" id="location">
			    <?php echo @$row['location']; ?>
			</span>
		</fieldset>
	</div>
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo TYPE; ?> </label>
			</legend>
			<span name="type" id="type">
			    <?php echo $row['type']; ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo LOCATION; ?> </label>
			</legend>
			<span class="tex" name="location" id="location">
			    <?php echo @$row['location']; ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo ROLE; ?>	</label>
			</legend>
			<span name="role" id="role"><?php echo @$row['role']; ?></span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo START_DATE; ?>  </label>
			</legend>
			<span name="start_date" id="start_date">
			    <?php echo @$row['start_date']; ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo LAST_DATE; ?>  </label>
			</legend>
			<span name="last_date" id="last_date">
			    <?php echo @$row['last_date']; ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo EXPRIANCE; ?>  </label>
			</legend>
			<span name="experience" id="experience">
			    <?php echo @$row['experience']; ?>
			</span>
		</fieldset>
	</div> --><br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo REQUIRED; ?>  </label>
			</legend>
			<span name="responsiblity" id="responsiblity">
			    <?php echo listText($row['responsiblity']); ?> 	
			</span>
			<label > <?php  echo MUST; ?>  </label>
			<span name="other_info" id="other_info">
					<?php echo listText($row['other_info']); ?>
			</span>
		</fieldset>
	</div>
	<br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo ADDITIONAL; ?>  </label>
			</legend><br>
		 <label><?php  echo CRITERIA; ?>  </label>	<span name="criteria" id="criteria">
			    <?php echo @$row['criteria']; ?>
			</span><br>
		<label id="jblbl"> <?php  echo ROLE; ?>	</label>
 <span name="role" id="role"><?php echo @$row['role']; ?></span>
 <br> <label id="jblbl"> <?php  echo TYPE; ?> </label>
 <span name="type" id="type">
			    <?php echo $row['type']; ?>
			</span>
	<br>	<label id="jblbl"> <?php  echo START_DATE; ?>  </label>
        <span name="start_date" id="start_date">
			    <?php echo @$row['start_date']; ?>
			</span>
		<br>	<label id="jblbl"> <?php  echo LAST_DATE; ?>  </label>
		    <span name="last_date" id="last_date">
			    <?php echo @$row['last_date']; ?>
			</span>
<br><label id="jblbl"> <?php  echo EXPRIANCE; ?>  </label>
<span name="experience" id="experience">
			    <?php echo @$row['experience']; ?>
			</span>
<br><label id="jblbl"> <?php  echo KEYWORDS; ?>  </label>
<span name="keywords" id="keywords">
			    <?php echo @$row['keywords']; ?>
			</span>
			<br><label id="jblbl"> <?php  echo NUMBER_OF_VACANCY; ?>  </label>
<span name="number_of_vacancy" id="number_of_vacancy">
			    <?php echo @$row['number_of_vacancy']; ?>
			</span>
		</fieldset>
	</div><br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo AREA_OF_WORK; ?>  </label>
			</legend>
			<span name="area_of_work" id="area_of_work">
			    <?php echo listText($row['area_of_work']); ?>
			</span>
		</fieldset>
	</div><br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo SKILLS_REQUIRED; ?>  </label>
			</legend>
			<span name="skills_required" id="skills_required">
			    <?php echo listText($row['skills_required']); ?>
			</span>
		</fieldset>
	</div><br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo CONTACT; ?>  </label>
			</legend><br>
		<label id="jblbl"> <?php  echo CONTACT_PERSON; ?>  </label>	<span name="contact_person" id="contact_person">
			    <?php echo @$row['contact_person']; ?>
			</span>
		<br>
		<label id="jblbl"> <?php  echo PHONE_NUMBER; ?>  </label>	
		<span name="phone_number" id="phone_number">
			    <?php echo @$row['phone_number']; ?>
			</span>
		</fieldset>
	</div>
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo PHONE_NUMBER; ?>  </label>
			</legend>
			<span name="phone_number" id="phone_number">
			    <?php echo @$row['phone_number']; ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo KEYWORDS; ?>  </label>
			</legend>
			<span name="keywords" id="keywords">
			    <?php echo @$row['keywords']; ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo NUMBER_OF_VACANCY; ?>  </label>
			</legend>
			<span name="number_of_vacancy" id="number_of_vacancy">
			    <?php echo @$row['number_of_vacancy']; ?>
			</span>
		</fieldset>
	</div> --><br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo PROCESS_DETAILS; ?>  </label>
			</legend>
			<span name="process_details" id="process_details">
			    <?php echo listText($row['process_details']); ?>
			</span>
		</fieldset>
	</div>
	<br>
	<div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo SALARY; ?>  </label>
			</legend>
			<br><label id="jblbl"> <?php  echo MIN_SALARY; ?>  </label><span name="salary_expected" id="salary_expected">
			    <?php echo @$row['salary_expected']; ?>
			</span>
			<br> <label id="jblbl"> <?php  echo SALARY_RANGE; ?>  </label>
		<span name="salary_range" id="salary_range">
						<?php echo @$row['salary_range']; ?></span>
		</fieldset>
	</div>
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo OTHER_INFO; ?>  </label>
			</legend>
			<span name="other_info" id="other_info">
					<?php echo listText($row['other_info']); ?>
			</span>
		</fieldset>
	</div> -->
	<!-- <div id="divjb">
		<fieldset>
			<legend>
				<label id="jblbl"> <?php  echo SALARY_RANGE; ?>  </label>
			</legend>
			<span name="salary_range" id="salary_range">
						<?php echo @$row['salary_range']; ?></span>
		</fieldset>
	</div>
 -->
</div>

<br />
<br />
</div>
</div>