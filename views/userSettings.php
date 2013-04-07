<div id="midpanel">
    <div id="settingsDiv">
        <form name="userSettingsForm" id="userSettingsForm">
            Change Password.<br/>
            <input type="password" name="old_password" id="old_password" placeholder="Old Password"/><br/>
            <input type="password" name="new_password" id="new_password" placeholder="New Password"/><br/>
            <input type="password" name="new_password_confirm" id="new_password_confirm" placeholder="Retype Password"/><br/>
            <input type="button" id="userSettingsSubmit" value="Submit"/>
        </form>
		<div id="userSettingsResponse">
			
		</div>
    </div>
	<div id="securityQuestionDiv">
		<form name="securityQuestionForm" id="securityQuestionForm">
			Set Up A Custom Security Question Here..<br/>
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
	<div id="deactivateAccount">
		<a href="<?php echo ROOTPATH."index.php?controller=user&url=deactivateAccount"; ?>"
			onclick="return confirm('Are You Sure, You Want To Deactivate Your Account??');">
		To Deactivate Your account Click Here..</a>
	</div>
</div>