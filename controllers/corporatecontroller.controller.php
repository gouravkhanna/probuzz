<?php
include 'controller.controller.php';
class corporatecontroller extends controller {

function __construct() {
parent::__construct();
}
/* Will load home when user Login */
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
function createjobs() {
	loadView("head/head1.php");
	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	loadView("head/head2.php");
	$arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id']));
	loadView('gdata/prejob.php',$arrData);
	loadView('rightpanel/alotslot.php');
	loadView('rightpanel/rightpanel2.php');
    loadView('footer/footer.php');
}
/*Create Jobs TAB  */
/* Will create a New Job Slot... */
function alotSlot() {
	$arrArgs=array(
		'id'=>@$_SESSION['id'],
		'designation'=>$_REQUEST['designation'],
		);
	if(@$_REQUEST['terms']==true)
	loadModel("corporate","alotSlot",$arrArgs);
	header("location:index.php?url=createjobs");
}
/* (ajax) Will load all the jobs posted by the User  */
function showAllJobs() {
	$arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id']));
	loadView("gdata/showallslot.php",$arrData);
}

/* Show form to update the JOb details! */
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
/* Will update all the Job details! */
function updateSlot() {
	//print_r($_REQUEST);
	foreach($_REQUEST as $key=>$value) 	{
		if($key!="controller" && $key!="url" && $key!="submit" && $key!="PHPSESSID")
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
/* Will update the status of the JOb Active or Inactive */
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
/* ShowJObs Tab */
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
/* (ajax)will be loaded when user click on particular Job   
 * And show the Specific Details of the Job Based on JobId 
 * */

function showSpecficJob() {
	$requestType="";
	if(@$_REQUEST['request_type']=="user") {
		$requestType="user";
	}
	
	$arrArgs=array(
			'id'=>@$_SESSION['id'],
			'jobId'=>@$_REQUEST['jobId'],
			'requestType'=>"$requestType",
	);
	$arrData1=loadModel("corporate","showSlot",$arrArgs);
	loadView("gdata/showSpecificJob.php",$arrData1);

}
/* Search for the people with required qualification,City,Gender */
	function searchPeople() {
		//fetching valued from url
		$city=@$_REQUEST['spcity'];
		$degree=@$_REQUEST['spdegree'];
		$gender=@$_REQUEST['spgender'];
		$otherDegree=@$_REQUEST['spcdegreeother'];
		$otherCity=@$_REQUEST['spccityother'];
		
		//checking whether if any other city are specified or not
		if($otherCity!="") {
			$otherCityArray=explode(",",$otherCity);
			//checking if only other city are specified and value from select box is not choosen
			if(!is_array($city)) {
				$city=array();	
			}
			$city=array_merge($city,$otherCityArray);
		}
		//checking whether if any other degree are specified or not
		if($otherDegree!="") {
			$otherDegreeArray=explode(",",$otherDegree);
			//checking if only other city are specified and value from select box is not choosen
			if(!is_array($degree)) {
				$degree=array();
			}
			$degree=array_merge($degree,$otherDegreeArray);
		}
		
		
		//loading page content
		loadView("head/head1.php");
		$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
		loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
		//checking if request for search is made or not
		if(isset($_REQUEST['search']) || @$_REQUEST['search']!="") {
			$arrArgs=array(
					"city"=>$city,
					"degree"=>$degree,
					"gender"=>$gender,
				);
			//passing data to model
			$arrData=loadModel("corporate", "searchPeople",$arrArgs);
			loadView('search/searchpeople.php',$arrData);
		}
		else
		{
			loadView('search/searchpeople.php');
		}
		
		loadView('footer/footer.php');
	}
}