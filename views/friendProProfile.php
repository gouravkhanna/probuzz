
<div id="bigmid">
 
    <div id="accordion" >
        <h3><?php echo BASIC_PROFILE;?></h3>
        <div class="wide">
            <!--<?php echo "<pre>";print_r($arrData); ?><br/>-->
            <?php
                $pro=$arrData['professional_profile'];
                $flag=0;
                if($pro['career_objective']) {
                    $flag=1;
            ?>
            
            <div class="highlight"><?php echo strtoupper(CAREER_OBJECTIVE);?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['career_objective']; ?></pre></div>
            <?php
                }
                if($pro['company']) {
                    $flag=1;
            ?>
            <div class="highlight"><?php echo strtoupper(COMPANY_NAME) ;?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['company']; ?></pre></div>
            <?php
                }
                if($pro['designation']) {
                    $flag=1;
            ?>
            <div class="highlight"><?php echo strtoupper(PRO_DESIGNATION); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['designation']; ?></pre></div>
            <?php
                }
                if($pro['proficiency']) {
                    $flag=1;
            ?>
            <div class="highlight"><?php echo strtoupper(PROFICIENCY); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['proficiency']; ?></pre></div>
            <?php
                }
                if($pro['skills']) {
                    $flag=1;
            ?>
            <div class="highlight"><?php echo strtoupper(SKILLS); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['skills']; ?></pre></div>
            <?php
                }
                if($pro['information']) {
                    $flag=1;
            ?>
            <div class="highlight"><?php echo strtoupper(INFORMATION); ?></div>
            <div class="displayDetails"><pre>       <?php echo $pro['information']; ?></pre></div>
            <?php
                }
                if($flag==0) {
            ?>
            <div class="displayDetails alignCenter">
				<h3><?php echo NO_RESULTS_TO_DISPLAY;?></h3></pre>
			</div>
            <?php
                }
            ?>


        </div>
        <h3><?php echo QUALIFICATIONS; ?></h3>
        <div class="wide">


            <?php $qual=$arrData['qualification'];
                if(!$qual) {
                    echo NO_QUALIFICATION_TO_DISPLAY;
            ?>
            
            <?php } else {
                foreach($qual as $key => $value){
            ?>
            <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                <?php echo strtoupper($value['qualification_type']." : ".$value['class']);?>
                <div class="deleteQual" ></div>
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
            <?php
                    }
                }
            ?>

        </div>
        <h3><?php echo CERTIFICATIONS; ?></h3>
        <div class="wide">
        <?php
            $cert=$arrData['certifications'];
            if(!$cert) {
                echo NO_CERTIFICATION_TO_DISPLAY;
            } else {
            foreach($cert as $key => $value){
        ?>
        
        <div id="mainCertDisplay<?php echo $value['id']; ?>">
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['certification_name']);?>
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

        </div>
        <h3><?php echo EXPERIENCE; ?></h3>
        <div class="wide">
            <?php
            $experience=$arrData['experience'];
            if(!$experience) {
                echo NO_EXPERIENCE_TO_DISPLAY;
            } else {
            foreach($experience as $key => $value){
        ?>
        
        <div id="mainExperienceDisplay<?php echo $value['id']; ?>">
                <div class="highlight" id="divhead<?php echo $value['id']; ?>">
                    <?php echo strtoupper($value['company_name']);?>
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

        </div>
        <h3><?php echo RESUME; ?></h3>
        <div class="wide">

          <?php echo "<pre>";print_r($arrData['resume']); ?>
        </div>
    </div>
</div>