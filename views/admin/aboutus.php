<?php
print_r($_SESSION);
?>
<div id="midpanel">
<?php

if(isset($_SESSION['updateAboutUs']))
{
  echo @$_SESSION['updateAboutUs'];
}
?>
<form method="post"> 
<article>
	<h1><?php echo ABOUT_US;?></h1>
	<p>
	<textarea name="textbox">
	    <?php 	
			echo $arrData["about_us"]; 
		?>
    </textarea>
    <input type="hidden" name=controller value="admin">
    <input type="hidden" name=url value="updateAboutUs">
    <input type="submit" name="update" value="Update About Us" >
	</p>
</article>
</form>
</div>