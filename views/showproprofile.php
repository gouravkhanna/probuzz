
<div id="bigmid">
    <div class="alignright">
        <a href="index.php?controller=proprofile&url=editView">EDIT</a>
    </div>
    <div id="accordion" >
        <h3><?php echo BASIC_PROFILE;?></h3>
        <div class="wide">
            <!--<?php echo "<pre>";print_r($arrData); ?><br/>-->
            <?php $pro=$arrData['professional_profile']; ?>

            <div class="highlight"><?php echo strtoupper(CAREER_OBJECTIVE);?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['career_objective']; ?></pre></div>
            <div class="highlight"><?php echo strtoupper(COMPANY_NAME) ;?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['company']; ?></pre></div>
            <div class="highlight"><?php echo strtoupper(PRO_DESIGNATION); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['designation']; ?></pre></div>
            <div class="highlight"><?php echo strtoupper(PROFICIENCY); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['proficiency']; ?></pre></div>
            <div class="highlight"><?php echo strtoupper(SKILLS); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['skills']; ?></pre></div>
            <div class="highlight"><?php echo strtoupper(INFORMATION); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['information']; ?></pre></div>


        </div>
        <h3><?php echo QUALIFICATIONS; ?></h3>
        <div class="wide">


            <?php $qual=$arrData['qualification'];
                if(!$qual) {
            ?>
            No Qualifications to display...<br/>
            Add Qualifications by clicking On Edit..
            <?php } else {
                foreach($qual as $key => $value){
            ?>
            <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                <?php echo strtoupper($value['qualification_type']." : ".$value['class']);?>
                <div class="deleteQual" ></div>
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

        </div>
        <h3><?php echo RESUME; ?></h3>
        <div class="wide">

          <?php echo "<pre>";print_r($arrData['resume']); ?>
        </div>
    </div>
</div>