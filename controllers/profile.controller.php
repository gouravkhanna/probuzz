<?php
include 'controller.controller.php';

class profile extends Controller
{
	function __construct() 	{
		parent::__construct();
	}
	function home()
	{
	
	
	    loadView('head/head1.php');
	  $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));	
	  loadView("navigation/profilenavigation.php",array('profile_pic_path' =>$path));
	  $arrData=loadModel("personalprofile","loadProfile",array("id"=>$_SESSION['id']));
	  loadView('midpanel/bigmid.php',$arrData);
	  loadView('footer/footer.php');
	



	/*
		loadView('head/head1.php');
	
	  	$path=ROOTPATH.'data/photo/g.jpg';
		loadView('head/head2.php');
	  	loadView('navigation/profilenavigation.php',array('profile_pic_path'=>"$path"));
	  	$this->view->loadView('profile.php');
  	loadView('footer/footer.php');*/
		
	}		


	function editCon(){
   echo '<script> alert("sssd"); </script>';
      $arrArgs=array(
		'houseNumber'=>@$_GET["ehno"],
		'street_number'=>@$_GET["estreetNo"],
		'street_name'=>@$_GET["estreetName"],
		'city'=>@$_GET["ecity"],
		'state'=>@$_GET["estate"],
		'country'=>@$_GET["ecountry"],
	);
       $arrData=loadModel("personalprofile ","updateCon",$arrArgs);
        loadView('midpanel/bigmid.php',$arrData);





	}

}

?>