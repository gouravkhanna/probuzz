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

	function register()
	{
		require_once 'library/recaptcha/recaptchalib.php';
		$privatekey = "6LcMKN8SAAAAAFbaKu1_OvaeP1yMaQ7cKT5zxwgQ";
		$resp = recaptcha_check_answer ($privatekey,
				$_SERVER["REMOTE_ADDR"],
				$_POST["recaptcha_challenge_field"],
				$_POST["recaptcha_response_field"]);
		
	/*	if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			
			$msg="<div id=wrongcaptcha>The reCAPTCHA wasn't entered correctly. Go back and try it again." .
					"(reCAPTCHA said: " . $resp->error . ")</div>";
			loadView("login1.php",array('error_msg'=>$msg));
		} else {
	*/
	{		// Your code here to handle a successful verification
		
		$arrArgs=array(
		'userName'=>@$_REQUEST["user_name1"],
		'password'=>@$_REQUEST["password1"],
		'firstName'=>@$_REQUEST["first_name"],
		'lastName'=>@$_REQUEST["last_name"],
		'email'=>@$_REQUEST["email"],
	);
  
	$validator=loadModel("validation","register",$arrArgs); //cal the validator method for server side validation

	if(!$validator['flag'])
	{
		$arrArgs=array('error_msg' => 	$validator['msg'] );
		loadView("login1.php",$arrArgs);
	}
	else if(loadModel("users","register",$arrArgs)) {
			header('location:index.php');
	}
	else {
		$arrArgs=array('error_msg' => 	"User Already Exist valid" );
		loadView("login1.php",$arrArgs);
	}
			
	}
	}

	function error($key="",$index="")
	{
		$s="location:".ROOTPATH."views/error.php?$key=$index";
		header("$s");
	}

	function __call($key,$index)
	{
		
		$url=explode("/", @$_REQUEST['url']);
		$this->error($key,$index);
	}
	function home()
	{
	  $this->view->loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	  loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path));
	  $this->view->loadView('head/head2.php');
	  $arrData=loadModel("buzzin","loadBuzz",array('id'=>$_SESSION['id']));
	  $this->view->loadView('midpanel/midpanel.php',$arrData);
	 
	  $this->view->loadView('rightpanel/rightpanel1.php');
	 // $this->view->loadView('rightpanel/topjobs.php');
	  $this->topjobs();
      $this->view->loadView('footer/footer.php');
	}
	
	function loadHome1()
	{ 
	  loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path));
	  loadView('head/head2.php');
	  loadView('midpanel/mid.php');
	  loadView('footer/footer.php');

	}
	function loadHome2()
	{
	  loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path));
	  loadView('head/head2.php');
	  loadView('midpanel/midpanel.php');
	  loadView('rightpanel/rightpanel.php');
	  loadView('footer/footer.php');
	}
	function loadHome3()
	{
	  loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));	
	  loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path));
	  loadView('midpanel/bigmid.php');
	  loadView('footer/footer.php');
	}

	function search()
	{
	   $arrArgs=loadModel("users","search",array("searcharg"=>@$_REQUEST['searcharg']));		
	  loadView("search/search.php",$arrArgs);
	}
	function logout()
	{
		loadModel("users","logout");
		header("location:index.php");
	}
	function topjobs()
	{
		$arrArgs=loadModel("users","topjobs");
		$this->view->loadView("rightpanel/topjobs.php",$arrArgs);
	}
	function aboutus() {

	      
	    if(@$_POST['contactus']=="Submit") {
	        if($_POST['name']!="" && $_POST['email']!="") {
	      /*  require_once 'library/recaptcha/recaptchalib.php';
	        $privatekey = "6LcMKN8SAAAAAFbaKu1_OvaeP1yMaQ7cKT5zxwgQ";
	        $resp = recaptcha_check_answer ( $privatekey, $_SERVER ["REMOTE_ADDR"], $_POST ["recaptcha_challenge_field"], $_POST ["recaptcha_response_field"] );
	        echo "Ss";
	        if (! $resp->is_valid) {
	            // What happens when the CAPTCHA was entered incorrectly
	            $msg = "<div id=wrongcaptcha>The reCAPTCHA wasn't entered correctly</div>";
	          $arrData['error_msg']=$msg;  
	        } else {
	        */    
	                loadModel("users", "insertContactUs",array(
                            "name"=>@$_POST['name'],
	                        "email"=>@$_POST['email'],
	                        "comments"=>@$_POST['comments'],
	                    ));
	                echo "Succesfully Submitted";    
	        }
	          //  }
	    }
	    $arrData=loadModel("users", "loadAboutUs");
	    loadView("about_us.php",$arrData);
	}
	
	
	/*function displayAddress()
	{
	
	$arrArgs=loadModel("users","getAddress",array('id'=>$_SESSION['id']));
	loadView('midpanel/bigmid.php',$arrArgs);
	
	
	}*/
	
	/*function displayEducation()
	{
	
	$arrArgs=loadModel("users","getProfileData",array('id'=>$_SESSION['id']));
	loadView('midpanel/bigmid.php',$arrArgs);
	
	
	
	}
	
	function displayWork()
	{
	
	$arrArgs=loadModel("users","getProfileData",array('id'=>$_SESSION['id']));
	loadView('midpanel/bigmid.php',$arrArgs);
	
	
	
	}
	function displaySocial()
	{
	
	$arrArgs=loadModel("users","getProfileData",array('id'=>$_SESSION['id']));
	loadView('midpanel/bigmid.php',$arrArgs);
		
	}*/
	
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
