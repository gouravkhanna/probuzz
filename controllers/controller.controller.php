<?php

include 'views/view.php';
class Controller
{
	//$view1;
	function __construct() 	{
		$this->view= new view();
	}
	function buzzin()
	{
		$arrArgs= array(
			'user_name' =>@$_REQUEST["user_name"],
			'password' => @$_REQUEST["password"],
			);
		if(@$_REQUEST["user_name"] == "") {
			loadView("login1.php");
		}
		else if(loadModel("users","login",$arrArgs)) {
			header('location:index.php');
		}
		else {
			$arrArgs=array('error_msg' => 	"Not a Valid User Or Password" );
			loadView("login1.php",$arrArgs);
		}

	}

/*	function register()
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
*/

	function error($key="",$index="")
	{
		$s="location:views/error.php?$key=$index";
		header("$s");
	}

	function __call($key,$index)
	{
		$this->error($key,$index);
	}
	function home()
	{
	  $this->view->loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	  loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	  $this->view->loadView('head/head2.php');
	  $this->view->loadView('midpanel/midpanel.php');
	  $this->view->loadView('rightpanel/rightpanel1.php');
	  $this->view->loadView('rightpanel/rightpanel2.php');
      $this->view->loadView('footer/footer.php');
	}
	function loadHome1()
	{ 
	  loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	  loadView('head/head2.php');
	  loadView('midpanel/mid.php');
	  loadView('footer/footer.php');

	}
	function loadHome2()
	{
	  loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	  loadView('head/head2.php');
	  loadView('midpanel/midpanel.php');
	  loadView('rightpanel/rightpanel.php');
	  loadView('footer/footer.php');
	}

	function profile()
	{
	  $this->view->loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/corpnavigation.php",array('profile_pic_path' =>$path));
	  $this->view->loadView('head/head2.php');
	  $this->view->loadView('midpanel/midpanel.php');
	  $this->view->loadView('rightpanel/rightpanel1.php');
	  $this->view->loadView('rightpanel/rightpanel2.php');
      $this->view->loadView('footer/footer.php');
	}
	function logout()
	{
		loadModel("users","logout");
		header("location:index.php");
	}
	/*function loadHome()
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
		return 'data/photo/g.jpg';
		//loadModel
		///return $userOb->getProfilePic($_SESSION['id']);
	}
	
	function updateSlot() {
		echo "<script> alert('in iupddex'); </script>";
			$corporateOb=new corporate();		
			$corporateOb->updateSlot();
			echo "<script> alert('index'); </script>";
		}
	function alotSlot() {	
		$corporateOb=new corporate();
		$corporateOb->alotSlot(@$_REQUEST['designation']);
	}*/
}
	
?>
