<div class="align">
    <input type="button" class="b1" value="Add Qualification" onclick="openFancyBox('qualification',-1)">        
</div>
<div class="red">
    <?php
        if(isset($_SESSION['qual_error'])) {
            echo $_SESSION['qual_error'];
            unset($_SESSION['qual_error']);
        }
    ?>
</div>
<br/>
<?php
$qual=$arrData['qualification'];
            if(!$qual) {
        ?>
        <?php echo NO_QUALIFICATION_TO_DISPLAY;?><br/>
        <?php } else {
            foreach($qual as $key => $value){
        ?>
        
        <div id="mainQualDisplay<?php echo $value['id']; ?>">
        
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['qualification_type']." : ".$value['class']);?>
                    <div class="deleteQual" id="<?php echo $value['id']; ?>">
                       <img title="Edit" onclick="openFancyBox('qualification',<?php echo $value['id']; ?>)" src="<?php echo SITE_PATH.'data/rcs/'.'edit.gif'; ?>"/>
                       <img title="Delete" onclick="deleteFrom(this,'qualification')" src="<?php echo SITE_PATH.'data/rcs/'.'delete.gif'; ?>"/>
                    </div>
                </div>
                <div class="displayDetails" id="div<?php echo $value['id']; ?>">
                    <?php if($value['institute']) { ?>
                    <pre>       <?php echo INSTITUTE." : ".$value['institute']; ?></pre>
                    <?php } ?>
                    <?php if($value['university']) { ?>
                    <pre>       <?php echo UNIVERSITY." : ".$value['university']; ?></pre>
                    <?php } ?>
                    <?php if($value['percentage']) { ?>
                    <pre>       <?php echo PERCENTAGE." ".$value['percentage']; ?></pre>
                    <?php } ?>
                    <?php if($value['start_year']) { ?>
                    <pre>       <?php echo START_YEAR." ".$value['start_year']; ?></pre>
                    <?php } ?>
                    <?php if($value['end_year']) { ?>
                    <pre>       <?php echo END_YEAR." ".$value['end_year']; ?></pre>
                    <?php } ?>
                    <?php if($value['subject_studied']) { ?>
                    <pre>       <?php echo MAJOR_SUBJECTS." ".$value['subject_studied']; ?></pre>
                    <?php } ?>
                    <?php if($value['added_date']) { ?>
                    <pre>       <?php echo ADDED_ON.$value['added_date']; ?></pre>
                    <?php } ?>
                </div>
        </div>
        
        <?php
                }
            }
        ?>
