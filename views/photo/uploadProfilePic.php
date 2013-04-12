<div id="bigmid">
<div id="errorDiv">
<?php
    if(isset($_SESSION['profilepic'])) {
      echo @$_SESSION['profilepic'];
      unset($_SESSION['profilepic']);
    }
?>
</div>

<form method="post" action="#" enctype="multipart/form-data"> 

Choose file: <input type="file" name="myfile"> 
<input type="submit" name="profilepicupload" value="Upload"> 
</form>
</div>
