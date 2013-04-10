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
	<div>
		<br />
		<h3>Subscribers</h3>
		<h1>
	<?php echo $arrData['subscibers'];?>
	
	</h1>
	</div>
	<!--  <a href="index.php?controller=profile">Social Profile</a> 
        <a href="index.php?controller=proprofile">Profesional Profile</a> 
       -->
	
	<div id="divsubstatus"></div>
    	<?php
    
if ($arrData ['substatus'] ['subscribe_status'] == 0) {
        $visble1 = "visiblen";
        $visble2 = "visibley";
    } else {
        $visble2 = "visiblen";
        $visble1 = "visibley";
    }
    echo "<button class=$visble1 id='subscriptionbtn' 
            onclick=addSubscription('" . $_REQUEST ['corpId'] . "') >Subscribe</button>";
    echo "<button class=$visble2 id='unsubscriptionbtn'
            onclick=removeSubscription('" . $_REQUEST ['corpId'] . "') >Unsubscribe</button>";
    ?>
    
    <a href="index.php?url=cprofile">Corporate Profile</a>
    </div>

