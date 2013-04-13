<div id="bigmid">
<div id="errorDiv">
<?php
    if(isset($_SESSION['profilepic'])) {
      echo @$_SESSION['profilepic'];
      unset($_SESSION['profilepic']);
    }

?>
</div>

<button onclick="showChooseHeader()">Choose Header</button>
<div id="chooseheader">
<?php 
if(isset($arrData)) {
foreach ($arrData as $val) {
if($val['path']!="") {
    echo "<a href='".ROOTPATH."index.php?controller=photo&url=updateChooseHeader&header_id=".$val['id']."' ><img src='".$val['path']."' height=100 width=130  class=marginl2></a>";
    }
}
}

?>
</div>

<form method="post" action="#" enctype="multipart/form-data"> 

Choose file: <input type="file" name="myfile"> 
<input type="submit" name="profilepicupload" value="Upload"> 
</form>
</div>
