<?php

session_start();
include_once 'class/lang/lang.en.php';
include_once 'class/lang/labels.lang.en.php';
include_once 'class/constant.php';
include 'controllers/controller.php';

//Controller Object	
$COb=new Controller();
//handling error
if(isset($_GET['url'])) {
		//$COb->error();
}
//handling login request
if(@$_REQUEST['submit']=="BuZZIN") {
	$COb->login();
}
//handling logout request
if(@$_GET['url']=="logout") {
	$COb->logout();
}

//to check whether the  user is login or not by checking the session
if(!isset($_SESSION['id']) || $_SESSION['id']=="" || @$_GET['url']=="login" ) {
	header("location:login1.php");
}
else {
	$id=$_SESSION['id'];
	$type=$_SESSION['type'];
	//if user is corporate User
	if($type=='1') 	{
		$COb->loadCorporateHome();	
	}
	//if user is Normal User
	else {
		$COb->loadHome();
	}
	
}
//Corporate user slot allotment
if(@$_REQUEST['terms']=="true" && @$_REQUEST['SlotAllotment']=="GETSlot" && isset($_REQUEST['designation'])) {	

 		$COb->alotSlot();
}

/*


if(!isset($_GET['url']))
{
	echo "Ss";
}
else
{
	
	echo " <br/>get url  ".@$_GET['url'];
}
	//if(){}
*/

?><br>

