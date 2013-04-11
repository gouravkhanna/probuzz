<div id="rightpanel1">
<div id="errorDiv">
<?php
    if(isset($_SESSION['alotslot'])) {
      echo @$_SESSION['alotslot'];
    }
?>
</div>
	<div id="createSlot">
	<div class=bluebutton><?php echo CREATE_A_NEW_SLOT;?></div><hr/>
	<form id="formalotslot" method="" action="">
	<?php echo DESIGNATION; ?>
	<input type="text" id="designation" name="designation"> 	<br/>
	<?php echo ACCEPT_TERMS; ?> 
	<input type="checkbox" id="alotslotcheck" name="terms" value="true"><br/>
	<input type=submit name="url" id="alotslot" value="alotSlot">
	<!-- <input type=submit name="sub" value="Create Slot"> -->
<hr/>
</form>
</div>
</div>