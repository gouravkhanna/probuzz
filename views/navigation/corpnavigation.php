<div id="navigation">

	<div id="photo">
		<img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>"
			height="80" width="80"> <span class="alignwelcome">
            <?php if(!isset($arrData['id'])) {echo WELCOME;} ?>
        <br />
        <?php echo @$arrData['company_name']; ?>
        <br />
        <?php echo @$arrData['company_alias']; ?>
        </span>
	</div>
		<br/><br/><br/><br/><br/><br/><br/>
		<br/><br/><br/>
	<div id=usermenu>
	    <ul>
			<li id="umenu">
			    <a href="<?php echo ROOTPATH."corpProfile";?>">
           	        <?php echo CORPORATE_PROFILE;?>
       	        </a>
       	    </li>
			<li id="umenu">
			    <a href="<?php echo ROOTPATH."createjobs"; ?>"
                 title="Create a new Job or Update Existing" >
                    <?php echo CREATE_JOB;?>
                 </a>
            </li>
			<li id="umenu">
			    <a href="<?php echo ROOTPATH."searchpeople"; ?>" 
                title="SearchPeople">
                    <?php echo SEARCH_PEOPLE;?>
                </a>
            </li>
			<li id="umenu">
			    <a href="<?php echo ROOTPATH."showJobs"; ?>">
                    <?php echo SHOW_JOB; ?>
                </a>
            </li>
			<li id="umenu">
			    <a href="<?php echo ROOTPATH."showApplicant";?>">
	                <?php echo SHOW_APPLICANT?>
	            </a>
	        </li>
			<li id="umenu">
				<a href="<?php echo ROOTPATH."settings"; ?>"><?php echo SETTINGS;?></a>
			</li>
		</ul>
	</div>
</div>
