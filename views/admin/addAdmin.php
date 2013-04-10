
<div id="midpanel">

	<h3><?php echo ADD_ADMINISTRATOR_ACCOUNT;?></h3>
	<hr/>
	<form id="addAdminForm">
		<?php echo USERNAME;?><br/>
		<input type="text" name="user_name" id="user_name" placeholder="Unique User Name For Admin." /><br/>
		<?php echo ACCOUNT_STATUS;?><br/>
		<select name="current_status">
			<option value="0"><?php echo ACTIVE_ACCOUNT;?></option>
			<option value="1"><?php echo INACTIVE_ACCOUNT;?></option>
		</select><br/>
		<?php echo PASSWORD;?><br/>
		<input type="text" name="password" id="password" placeholder="Password" /><br/>
		<pre>			<input type="button" id="addAdminSubmit" value="Add Account"/></pre>
	</form>
	<div id="displayResult">
		
	</div>
</div>