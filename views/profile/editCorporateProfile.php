<style>
	.corpouter{
		width:580px;
		text-align:left;
		padding-top:5px;
		padding-bottom:5px;
		background-color: white;
	}
	.corpinner {
		width:576px;
		background-color: #f0f0f0;
		border:1px inset silver;		
	}
	.corpSubmit {
		width:200px;
		float:right;
	}
	
	
</style>
<div id="midpanel">
	<?php
		//echo "<pre>";
	$data=$arrData[0]; 
	//print_r($data);
	
	?>
	<h3 class="calign"><?php echo strtoupper("Corporate Profile");?>
	</h3>
	<form id="updateCorporate">
	<div class="corpouter">
		Company Name<br/>
		<textarea rows="1" name="company_name" cols="" class="corpinner"><?php echo $data['company_name']; ?></textarea>
	</div>
	<div class="corpouter">
		Company Alias<br/>
		<textarea rows="1" name="company_alias" cols="" class="corpinner"><?php echo $data['company_alias']; ?></textarea>
	</div>
	<div class="corpouter">
		Company's Tagline<br/>
		<textarea rows="2" name="tagline" cols="" class="corpinner"><?php echo $data['tagline']; ?></textarea>
	</div>
	<div class="corpouter">
		Number of Employees<br/>
		<textarea rows="1" name="number_of_employee" cols="" class="corpinner"><?php echo $data['number_of_employee']; ?></textarea>
	</div>
	<div class="corpouter">
		Branches At<br/>
		<textarea rows="5" name="locations" cols="" class="corpinner"><?php echo $data['locations']; ?></textarea>
	</div>
	<div class="corpouter">
		A Little About<br/>
		<textarea rows="5" name="summary" cols="" class="corpinner"><?php echo $data['summary']; ?></textarea>
	</div>
	<div class="corpouter">
		Contact Number<br/>
		<textarea rows="2" name="phone_number" cols="" class="corpinner"><?php echo $data['phone_number']; ?></textarea>
	</div>
	<div class="corpouter">
		Company's Website<br/>
		<textarea rows="2" name="website" cols="" class="corpinner"><?php echo $data['website']; ?></textarea>
	</div>
	<div class="corpouter">
		<div class="corpinner">
			Upload Company's Display Pic:&emsp;&emsp;&emsp; <input type="file" name="profile_pic_id"/><input type="button" value="Upload"/>
			<br/>
		</div>
	</div>
	<div class="corpouter">
		Company's Email Id<br/>
		<textarea rows="2" name="email_id" cols="" class="corpinner"><?php echo $data['email_id']; ?></textarea>
	</div>
	<input type="submit" class="corpSubmit"/>
	
	</form>
</div>