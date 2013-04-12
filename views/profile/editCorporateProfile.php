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
	
.corpinner,.corpouter textarea{
	float:left;
	margin-left:4px;
}	
</style>
<div id="midpanel">
	<div id="errorDiv">
	<?php 
	    if (isset ( $_SESSION ['error'] )) {
               echo $_SESSION ['error'];
            unset ( $_SESSION ['error'] );
        }
     ?>
	</div>
	<?php
		$data=$arrData[0]; 
    ?>
	<div class="bluebutton"><?php echo strtoupper("Corporate Profile");?>
	</div>
	<form id="updateCorporateProfile">
	<div class="corpouter">
		<?php echo COMPANY_NAME;?><br/>
		<textarea rows="1" name="company_name" id="company_name" cols="" class="corpinner"><?php echo $data['company_name']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo COMPANY_ALIAS;?><br/>
		<textarea rows="1" name="company_alias" cols="" class="corpinner"><?php echo $data['company_alias']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo COMPANY_TAGLINE;?><br/>
		<textarea rows="2" name="tagline" cols="" class="corpinner"><?php echo $data['tagline']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo NO_OF_EMPLOYEES;?><br/>
		<textarea rows="1" name="number_of_employee" 
		id="number_of_employee" cols="" 
		class="corpinner" onblur="jsCheckNumber(this.id)"><?php echo $data['number_of_employee']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo BRANCHES_AT;?><br/>
		<textarea rows="5" name="locations" cols="" class="corpinner"><?php echo $data['locations']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo LITTLE_ABOUT;?><br/>
		<textarea rows="5" name="summary" cols="" class="corpinner"><?php echo $data['summary']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo CONTACT_NO;?><br/>
		<textarea rows="2" name="phone_number" 
		id="phone_number" cols=""
		onblur="jsCheckNumber(this.id)"
		class="corpinner"><?php echo $data['phone_number']; ?></textarea>
	</div>
	<div class="corpouter">
		<?php echo COMPANY_WEBSITE;?><br/>
		<textarea rows="2" name="website" cols="" class="corpinner"><?php echo $data['website']; ?></textarea>
	</div><br><br><br>
	
	<div class="corpouter">
		<?php echo COMPANY_EMAIL_ID;?><br/>
		<textarea rows="2" name="email_id" id="corpemail_id" cols="" class="corpinner"><?php echo $data['email_id']; ?></textarea>
	</div>
	<input type="submit" value="update" name="corpSubmit" class="corpSubmit"/>
	
	</form>
</div>