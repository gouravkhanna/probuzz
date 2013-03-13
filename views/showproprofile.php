<head>
    <link rel="stylesheet" type="text/css" href="style/proProfile.css" />
    <script type="text/javascript" src="js/proProfile.js"></script>
    <script>
        $(function() {
            $( "#accordion" ).accordion();
        });
    </script>
</head>
<div id="bigmid">
    <div class="alignright">
        <a href="index.php?controller=proprofile&url=editView">EDIT</a>
    </div>
    <div id="accordion">
        <h3><?php echo BASIC_PROFILE;?></h3>
        <div>
            <!--<?php echo "<pre>";print_r($arrData); ?><br/>-->
            
            <span class="highlight"><?php echo CAREER_OBJECTIVE;?></span><br/>
            <pre>       <?php echo strtoupper($arrData['professional_profile']['career_objective']); ?></pre>
            <span class="highlight"><?php echo COMPANY_NAME ;?></span><br/>
            <pre>       <?php echo strtoupper($arrData['professional_profile']['company']); ?></pre>
            <span class="highlight"><?php echo PRO_DESIGNATION; ?></span><br/>
            <pre>       <?php echo strtoupper($arrData['professional_profile']['designation']); ?></pre>
            <span class="highlight"><?php echo PROFICIENCY; ?></span><br/>
            <pre>       <?php echo strtoupper($arrData['professional_profile']['proficiency']); ?></pre>
            <span class="highlight"><?php echo SKILLS; ?></span><br/>
            <pre>       <?php echo strtoupper($arrData['professional_profile']['skills']); ?></pre>
            <span class="highlight"><?php echo INFORMATION; ?></span><br/>
            
                

        </div>
        <h3><?php echo QUALIFICATIONS; ?></h3>
        <div>
            
        </div>
        <h3><?php echo RESUME; ?></h3>
        <div>
            
          
        </div>
    </div>
</div>
