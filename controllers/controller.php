<?php
include_once 'class/constant.php';
include 'class/users.php';
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
}
	
?>
