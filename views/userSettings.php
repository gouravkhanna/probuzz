<div id="midpanel"><br><br><br> <br>
<?php echo "<div id='showfrnddiv'><h1>".SETTINGS ."</h1> <br><br></div>";?>
	<br><br><br> <br><div id="accordion" class='marginl10'>
		<h3><?php echo CHANGE_PASSWORD;?></h3>
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
		<h3><?php echo SETUP_SECURITY_QUESTION;?></h3>
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
		<h3><?php echo DEACTIVATE_ACCOUNT;?></h3>
		<div id="deactivateAccount">
			<a href="<?php echo ROOTPATH."index.php?controller=user&url=deactivateAccount"; ?>"
				onclick="return confirm('<?php echo DELETION_CONFIRMATION;?>');">
			<?php echo DEACTIVATE_LINK;?></a>
		</div>
	</div>
</div>