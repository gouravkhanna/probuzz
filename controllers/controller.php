<?php
include_once 'class/constant.php';
include 'class/users.php';
include 'class/corporate.php';
class Controller
{

	function __construct()
	{
	}


	function login()
	{
		$userName=@$_REQUEST["user_name"];
		$password=@$_REQUEST["password"];
		$userOb=new users();
		if($userOb->login($userName,$password)) {
			header('location:index.php');
//			require_once("home.php");
		}
		
	}
function register()
{

$userName=@$_REQUEST["user_name1"];
$password=@$_REQUEST["password1"];
$first_name=@$_REQUEST["first_name"];
$last_name=@$_REQUEST["last_name"];
$email=@$_REQUEST["email"];
$userOb=new users();
$userOb->register($first_name,$last_name,$email,$password,$userName);
header('location:registerindex.php');
			
}




	function error($key="",$index="")
	{
		$s="location:views/error.php?$key=$index";
		header("$s");
	}

	function __call($key,$index)
	{
		$this->error($key,$index);
	}

	function loadHome()
	{
		
		$path=$this->populateHomeData();
		//$profile_pic_path = "http://".$_SERVER["HTTP_HOST"]."/".APPNAME."/".$path;
		$profile_pic_path = ROOTPATH.$path;
		include('home.php');
	}
	function loadCorporateHome()
	{
		$path=$this->populateHomeData();
		$profile_pic_path = ROOTPATH.$path;
		include('corp.php');
	
	}
	function populateHomeData()
	{
		$userOb=new users();
		return $userOb->getProfilePic($_SESSION['id']);
	}
	function logout()
	{
		$userOb=new users();
		$userOb->logout();
	}
	function alotSlot()
	{	
		echo "<script> alert('Controller');</script>";
		$corporateOb=new corporate();
		$corporateOb->alotSlot(@$_REQUEST['designation']);
	}
}
	
?>
