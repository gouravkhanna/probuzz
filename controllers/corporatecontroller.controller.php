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
}

}