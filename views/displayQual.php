<?php
$qual=$arrData['qualification'];
            if(!$qual) {
        ?>
        No Qualifications to display...<br/>
        Add Qualification...
        <?php } else {
            foreach($qual as $key => $value){
        ?>
        <div class="highlight" id="divhead<?php echo $value['id']; ?>">
            <?php echo strtoupper($value['qualification_type']." : ".$value['class']);?>
            <div class="deleteQual" id="yellow" >
                
                <img title="Delete" id="<?php echo $value['id']; ?>" onclick="deleteQual(this.id)" src="delete.gif"/></div>
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
        <?php
                }
            }
        ?>
        <input type="button" value="Add Qualification" onclick=""/>