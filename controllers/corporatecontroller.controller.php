<?php
include 'controller.controller.php';
class corporatecontroller extends controller {

function __construct() {

}
function home() {
	loadView("head/head1.php");
	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	loadView("head/head2.php");
	loadView('midpanel/midpanel.php');
	loadView('rightpanel/rightpanel1.php');
	loadView('rightpanel/rightpanel2.php');
    loadView('footer/footer.php');
}
function cprofile(){

	loadView("head/head1.php");
	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	loadView("head/head2.php");
	loadView('midpanel/mid.php');
	loadView('footer/footer.php');
}
function showJobs()
{
	loadView("head/head1.php");
	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	loadView("head/head2.php");
	$arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id']));
	loadView('gdata/showjobs.php',$arrData);
	loadView('rightpanel/rightpanel1.php');
	loadView('rightpanel/rightpanel2.php');
    loadView('footer/footer.php');

}
function createjobs()
{
	echo "lot of lulus";
}

}