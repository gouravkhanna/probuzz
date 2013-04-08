
<link rel="stylesheet" type="text/css" href="f2.css" />

<div id="navigation" >
        <div id="photo">
            <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
            <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
             <?php //echo @$_SESSION['user_name'];
                echo $arrData['user_name'];
             ?>
             </span> 
        </div>   
<div id="dropdown" name="dropdown">
  <ul>



</ul>

</div> 
</div>


