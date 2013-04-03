
<link rel="stylesheet" type="text/css" href="f2.css" />

<div id="navigation" >
        <div id="photo">
            <img class="photo" src="<?php echo $arrData['profile_pic_path']; ?>" height="80" width="80">
            <span class="alignwelcome"> <?php echo WELCOME; ?> <br/>
             <?php echo @$_SESSION['user_name']; ?>
             </span> 
        </div>   
<div id="dropdown" name="dropdown">
  <ul>
<li> <input type="image" title="Home" src=<?php echo ROOTPATH."data/rcs/home.png"; ?> id="home" name="home" /> </li>

<li>  <input type="image" title="My Profile" src=<?php echo ROOTPATH."data/rcs/user-icon.png"; ?> id="profile" name="profile">	</li>

<li> <input type="image" id="friend" name="friend"  title="My Friends"  src=<?php echo ROOTPATH."data/rcs/friend-feed-icon.png"; ?> </li>
<li> <input type="image" id="pics" name="pics"  title="My pics"  src=<?php echo ROOTPATH."data/rcs/picture-icon.png"; ?> </li>


</ul>

</div> 
</div>


