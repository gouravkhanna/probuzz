
<?php
session_start();
include_once 'class/lang/lang.en.php';
include_once 'class/lang/labels.lang.en.php';
include_once 'class/constant.php';
include 'controllers/controller.php';
//Controller Object	
$COb=new Controller();
if(isset($_GET['url'])) {
	$COb->error();
}
//handling login request
if(@$_REQUEST['submit']=="BuZZIN") {
	$COb->login();
}
if(@$_GET['url']=="logout") {
	$COb->logout();
}


//to check whether the  user is login or not by checking the session
if(!isset($_SESSION['id']) || $_SESSION['id']=="" || @$_GET['url']=="login" ) {
	header("location:login1.php");
}
else {
		$id=$_SESSION['id'];
		$COb->loadHome();
}


/*

$uri = explode("/",$_SERVER["PHP_SELF"]);
echo " URi  ";
print_r($uri);
echo " <br />php selef<br />";
print_r( $_SERVER["PHP_SELF"]);
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

