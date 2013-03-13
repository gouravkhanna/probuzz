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
function cprofile() {

}
function showJobs() {
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
function createjobs() {
	loadView("head/head1.php");
	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	loadView("head/head2.php");
	$arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id']));
	loadView('gdata/prejob.php',$arrData);
	loadView('rightpanel/alotSlot.php');
	loadView('rightpanel/rightpanel2.php');
    loadView('footer/footer.php');
}
function alotSlot() {
	
	$arrArgs=array(
		'id'=>@$_SESSION['id'],
		'designation'=>$_REQUEST['designation'],
		);
	if(@$_REQUEST['terms']==true)
	loadModel("corporate","alotSlot",$arrArgs);
	header("location:index.php?url=createjobs");
	//$this->createjobs();
}
function showAllJobs() {
	$arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id']));
	loadView("gdata/showallslot.php",$arrData);
}
function showSpecficJob() {
	$arrArgs=array(
		'id'=>@$_SESSION['id'],
		'jobId'=>@$_REQUEST['jobId']
		);
	$arrData1=loadModel("corporate","showSlot",$arrArgs);
	loadView("gdata/showSpecificJob.php",$arrData1);
	
}
function showUpdateSlot()
{
	loadView("head/head1.php");
	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	loadView("head/head2.php");
	$arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id'],'jobId'=>$_REQUEST['jobId']));
	//$arrData=array('type'=>$_REQUEST['jobId']);
	loadView("gdata/jobs.php",$arrData);
	loadView('rightpanel/alotSlot.php');
	loadView('rightpanel/rightpanel2.php');
	loadView('footer/footer.php');
}
function updateSlot() {
	//print_r($_REQUEST);
	foreach($_REQUEST as $key=>$value) 	{
		if($key!="controller" && $key!="url" && $key!="submit")
			$arrArg[$key]=$value;
	}
	
	$res=loadModel("corporate","updateSlot",$arrArg);
	if($res=true) {
		$this->createjobs();
	}
	else  {
		echo "Error";
	}
		
}
function updateStatusJob() {
	//$status=@$_REQUEST['status']=="active"?0:1;
	$arrArgs=array(
		'status'=>@$_REQUEST['status'],
		'jobId'=>@$_REQUEST['jobId'],
		);
	$res=loadModel("corporate","updateStatusJob",$arrArgs);
	if($res=true) {
		echo "updated Status";
	}
	else  {
		echo "Error";
	}
}
}