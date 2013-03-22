
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
<li> <input type="image" title="Home" src="../../data/rcs/home.png"   id="home" name="home" /> </li>

<li>  <input type="image" title="My Profile" src="../../data/rcs/profile.jpg" id="profile" name="profile">	</li>

<li> <input type="image" id="friend" name="friend"  title="My Friends" src="../../data/rcs/images.jpg"> </li>
<li> <input type="image" id="pics" name="pics"  title="My pics" src="../../data/rcs/camera.png"> </li>

<li>  </li>
</ul>

</div> 
</div>


