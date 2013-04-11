<div id="midpanel">
<div class="bluebutton"><span class="fontsize20 marginl10">Available Job Slots</span><br><br></div>
	<div id="smsg"></div>
	<div id="a11"></div>
	<div id="errorDiv">
<?php
if (isset ( $arrData ['err_msg'] )) {
    echo $arrData ['err_msg'];
}
?>
<div>
<div id="errorDiv">
        <?php
        if(isset($_SESSION['updatejob'])) {
              echo $_SESSION['updatejob'];
              unset($_SESSION['updatejob']);
        }
        ?>
        </div>
    </div>
</div>
<?php
// List/Table of jobs will be loaded in this divison
?>	
<div id="showAllSlot"></div>


	<div id="updateSlot"></div>
</div>