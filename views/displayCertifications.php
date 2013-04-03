        <div class="align">
                <input type="button" class="b1" value="Add Certifications" onclick="openFancyBox('certifications',-1)">
                                
        </div>
        <br/>
		<?php
		$cert=$arrData['certifications'];
            if(!$cert) {
        ?>
        No Certifications to display...<br/>
        Add Certifications...
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
                    <pre>       <?php echo "Institution : ".$value['institution']; ?></pre>
                    <?php } ?>
                    <?php if($value['certification_year']) { ?>
                    <pre>       <?php echo "Certification Year : ".$value['certification_year']; ?></pre>
                    <?php } ?>
                    <?php if($value['validity']) { ?>
                    <pre>       <?php echo "Valid Till : ".$value['validity']; ?></pre>
                    <?php } ?>
                    
					<!-- Reminder to add this column to certifications table-->
					<?php// if($value['added_date']) { ?>
                    <pre>       <?php //echo "Added On : ".$value['added_date']; ?></pre>
                    <?php //} ?>
                </div>
        </div>
        
        <?php
                }
            }
        ?>
