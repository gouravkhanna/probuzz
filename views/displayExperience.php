<div class="align">
	<input type="button" class="b1" value="Add Experience" onclick="openFancyBox('experience',-1)">
</div>
<div class="red">
<?php
	if(isset($_SESSION['exp_error'])) {
		echo $_SESSION['exp_error'];
		unset($_SESSION['exp_error']);
	}
?>
</div>
<br/>
<?php
$experience=$arrData['experience'];
            if(!$experience) {
        ?>
        <?php echo NO_EXPERIENCE_TO_DISPLAY;?>
        <?php } else {
            foreach($experience as $key => $value){
        ?>
        
        <div id="mainExperienceDisplay<?php echo $value['id']; ?>">
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['company_name']);?>
                    <div class="deleteExp" id="<?php echo $value['id']; ?>">
                       <img title="Edit" onclick="openFancyBox('experience',<?php echo $value['id']; ?>)" src="<?php echo SITE_PATH.'data/rcs/'.'edit.gif'; ?>"/>
                       <img title="Delete" onclick="deleteFrom(this,'experience')" src="<?php echo SITE_PATH.'data/rcs/'.'delete.gif'; ?>"/>
                    </div>
                </div>
                <div class="displayDetails" id="div<?php echo $value['id']; ?>">
                    <?php if($value['position']) { ?>
                    <pre>       <?php echo POSTITION." : ".$value['position']; ?></pre>
                    <?php } ?>
                    <?php if($value['start_date']) { ?>
                    <pre>       <?php echo FROM." ".$value['start_date']; ?></pre>
                    <?php } ?>
                    <?php if($value['end_date']) { ?>
                    <pre>       <?php echo TO." ".$value['end_date']; ?></pre>
                    <?php } ?>
                    
					
                </div>
        </div>
        
        <?php
                }
            }
        ?>
