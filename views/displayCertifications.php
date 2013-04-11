<div class="align">
		<input type="button" class="b1" value="Add Certifications" onclick="openFancyBox('certifications',-1)">
						
</div>
<div class="red">
<?php
	if(isset($_SESSION['cert_error'])) {
		echo $_SESSION['cert_error'];
		unset($_SESSION['cert_error']);
	}
?>
</div>
<br/>
		<?php
		$cert=$arrData['certifications'];
            if(!$cert) {
        ?>
        <?php echo NO_CERTIFICATION_TO_DISPLAY;?>
        <?php } else {
            foreach($cert as $key => $value){
        ?>
        
        <div id="mainCertDisplay<?php echo $value['id']; ?>">
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['certification_name']);?>
                    <div class="deleteCert" id="<?php echo $value['id']; ?>">
                       <img title="Edit" onclick="openFancyBox('certifications',<?php echo $value['id']; ?>)" src="<?php echo SITE_PATH.'data/rcs/'.'edit.gif'; ?>"/>
                       <img title="Delete" onclick="deleteFrom(this,'certifications')" src="<?php echo SITE_PATH.'data/rcs/'.'delete.gif'; ?>"/>
                    </div>
                </div>
                <div class="displayDetails" id="div<?php echo $value['id']; ?>">
                    <?php if($value['institution']) { ?>
                    <pre>       <?php echo INSTITUTION." : ".$value['institution']; ?></pre>
                    <?php } ?>
                    <?php if($value['certification_year']) { ?>
                    <pre>       <?php echo CERTIFICATION_YEAR." : ".$value['certification_year']; ?></pre>
                    <?php } ?>
                    <?php if($value['validity']) { ?>
                    <pre>       <?php echo VALID_TILL." : ".$value['validity']; ?></pre>
                    <?php } ?>
                    
                </div>
        </div>
        
        <?php
                }
            }
        ?>
