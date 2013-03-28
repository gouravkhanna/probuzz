        <div class="align">
                <a class="b1">Add Qualification</a>
        </div>
<?php
$qual=$arrData['qualification'];
            if(!$qual) {
        ?>
        No Qualifications to display...<br/>
        Add Qualification...
        <?php } else {
            foreach($qual as $key => $value){
        ?>
        
        <div id="mainQualDisplay<?php echo $value['id']; ?>">
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['qualification_type']." : ".$value['class']);?>
                    <div class="deleteQual" id="<?php echo $value['id']; ?>">
                       <a class="various fancybox.ajax" onclick="append(this)" href="" >
                           <img title="Edit" src="<?php echo SITE_PATH.'data/rcs/'.'edit.gif'; ?>"/>
                       </a>
                        <img title="Delete" onclick="deleteQual(this)" src="<?php echo SITE_PATH.'data/rcs/'.'delete.gif'; ?>"/>
                    </div>
                </div>
                <div class="displayDetails" id="div<?php echo $value['id']; ?>">
                    <?php if($value['institute']) { ?>
                    <pre>       <?php echo "Institute : ".$value['institute']; ?></pre>
                    <?php } ?>
                    <?php if($value['university']) { ?>
                    <pre>       <?php echo "University : ".$value['university']; ?></pre>
                    <?php } ?>
                    <?php if($value['percentage']) { ?>
                    <pre>       <?php echo "Percentage : ".$value['percentage']; ?></pre>
                    <?php } ?>
                    <?php if($value['start_year']) { ?>
                    <pre>       <?php echo "Start Year : ".$value['start_year']; ?></pre>
                    <?php } ?>
                    <?php if($value['end_year']) { ?>
                    <pre>       <?php echo "End Year : ".$value['end_year']; ?></pre>
                    <?php } ?>
                    <?php if($value['subject_studied']) { ?>
                    <pre>       <?php echo "Major Subjects : ".$value['subject_studied']; ?></pre>
                    <?php } ?>
                    <?php if($value['added_date']) { ?>
                    <pre>       <?php echo "Added On : ".$value['added_date']; ?></pre>
                    <?php } ?>
                </div>
        </div>
        
        <?php
                }
            }
        ?>
