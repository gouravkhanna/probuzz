<div id="rightpanel1">
<div id="errorDiv">
<?php
    if(isset($_SESSION['alotslot'])) {
      echo @$_SESSION['alotslot'];
    }
?>
</div>
	<div id="createSlot">
	<div class='bluebutton'><br><span class='marginl10 fontsize16'>
		<?php echo CREATE_A_NEW_SLOT;?></span></div><br>
	<form id="formalotslot" method="" action="">
	<?php echo DESIGNATION; ?>
	<input type="text" id="designation" name="designation"> 	<br/>
	<?php echo ACCEPT_TERMS; ?> 
	<input type="checkbox" id="alotslotcheck" name="terms" value="true"><br/>
	<input type=submit name="url" id="alotslot" class='marginr10' value="Allot Slot">
	<!-- <input type=submit name="sub" value="Create Slot"> -->

</form>
</div>
</div>