<?php include_once 'class/lang/lang.en.php';
include_once 'class/lang/labels.lang.en.php';
include_once 'class/constant.php';
include_once 'controllers/controller.php';
//Controller Object	
$COb=new Controller();
//handling error
if(@$_REQUEST['create']=="SIGN UP") {
	$COb->register();
}

?>
