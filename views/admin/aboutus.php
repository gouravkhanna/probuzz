
<div id="bigmid">
<?php

if(isset($_SESSION['updateAboutUs']))
{
  echo @$_SESSION['updateAboutUs'];
}
?>
<form method="post"> 
<article>
	<div id='showfrnddiv'class='fontsize20'><h1><?php echo ABOUT_US;?></h1></div>
	<div id="aboutdiv"><br><br>
	<p>
	<textarea id="aboutustext" name="textbox" rows="40" cols="104">
	    <?php 	
			echo $arrData["about_us"]; 
		?>
    </textarea>
    <input type="hidden" name=controller value="admin">
    <input type="hidden" name=url value="updateAboutUs"><br>
    <input type="submit" name="update" value="Update" id="aboutbutton">
	</p>
	</div>
</article>
</form>
</div>