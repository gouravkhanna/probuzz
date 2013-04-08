
<div id="midpanel">
	<br/><br/><br/><br/>
	<h3>Add Administrator Account.</h3>
	<hr/>
	<form id="addAdminForm">
		User Name:<br/>
		<input type="text" name="user_name" id="user_name" placeholder="Unique User Name For Admin." /><br/>
		Account Status:<br/>
		<select name="current_status">
			<option value="0">Active Account</option>
			<option value="1">Inactive Account</option>
		</select><br/>
		Password:<br/>
		<input type="text" name="password" id="password" placeholder="Password" /><br/>
		<pre>			<input type="button" id="addAdminSubmit" value="Add Account"/></pre>
	</form>
	<div id="displayResult">
		
	</div>
</div>