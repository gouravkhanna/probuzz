        <div class="align">
                <input type="button" class="b1" value="Add Experience" onclick="openExpFancyBox(-1)">
                                
        </div>
        <br/>
<?php
$experience=$arrData['experience'];
            if(!$experience) {
        ?>
        No Experience to display...<br/>
        Add Experience...
        <?php } else {
            foreach($experience as $key => $value){
        ?>
        
        <div id="mainExperienceDisplay<?php echo $value['id']; ?>">
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['company_name']);?>
                    <div class="deleteExp" id="<?php echo $value['id']; ?>">
                       <img title="Edit" onclick="openExpFancyBox(<?php echo $value['id']; ?>)" src="<?php echo SITE_PATH.'data/rcs/'.'edit.gif'; ?>"/>
                       <img title="Delete" onclick="deleteExp(this)" src="<?php echo SITE_PATH.'data/rcs/'.'delete.gif'; ?>"/>
                    </div>
                </div>
                <div class="displayDetails" id="div<?php echo $value['id']; ?>">
                    <?php if($value['position']) { ?>
                    <pre>       <?php echo "Postition : ".$value['position']; ?></pre>
                    <?php } ?>
                    <?php if($value['start_date']) { ?>
                    <pre>       <?php echo "From : ".$value['start_date']; ?></pre>
                    <?php } ?>
                    <?php if($value['end_date']) { ?>
                    <pre>       <?php echo "To : ".$value['end_date']; ?></pre>
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
