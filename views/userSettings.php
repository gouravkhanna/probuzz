<div id="midpanel">
	<div id="accordion">
		<h3>Change Password</h3>
		<div id="settingsDiv">
			
			<form name="userSettingsForm" id="userSettingsForm">
				<input type="password" name="old_password" id="old_password" placeholder="Old Password"/><br/>
				<input type="password" name="new_password" id="new_password" placeholder="New Password"/><br/>
				<input type="password" name="new_password_confirm" id="new_password_confirm" placeholder="Retype Password"/><br/>
				<input type="button" id="userSettingsSubmit" value="Submit"/>
			</form>
			<div id="userSettingsResponse">
				
			</div>
		</div>
		<h3>Set Up A Custom Security Question Here..</h3>
		<div id="securityQuestionDiv">
			<form name="securityQuestionForm" id="securityQuestionForm">
				<div id="displaySecurityQuestionAnswers">
					
				</div>
				<input type="text" placeholder="Security Question" name="securityQuestion" id="securityQuestion"/>
				<input type="text" placeholder="Answer" name="securityAnswer" id="securityAnswer"/>
				<br/>
				<input type="button" value="Add" id="setSecurityQuestion"/>
			</form>
			<div id="securityQuestionResponse">
				
			</div>
		</div>
		<h3>Deactivate Your Account</h3>
		<div id="deactivateAccount">
			<a href="<?php echo ROOTPATH."index.php?controller=user&url=deactivateAccount"; ?>"
				onclick="return confirm('Are You Sure, You Want To Deactivate Your Account??');">
			To Deactivate Your account Click Here..</a>
		</div>
	</div>
</div>