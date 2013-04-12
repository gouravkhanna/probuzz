<?php
include 'controller.controller.php';

/*
 * profile class
 * This controller class handles all the tasks relating to Users Personal Profile
*/
class profile extends Controller {
    
  	/*
	 * Constructor of profile class calls the parent class constructor
	 * enabling profile class to use the Controller Abilities
	*/
  
	function __construct()  {
      parent::__construct();
	}
    
    /*
     * home()
     * This is the default method of profile controller.
     * This method loads the default Profile view of the User
    */
	function home() {
		loadView('head/head1.php');
		$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
		$userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
		loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path","user_name"=>$userName));
		
		$arrData=loadModel("personalprofile","loadProfile",array("id"=>$_SESSION['id']));
		loadView('midpanel/bigmid.php',$arrData);
		/*$arrData=loadModel("personalprofile","loadProfile",array("id"=>$_SESSION['id']));
		loadView('midpanel/bigmid.php',$arrData);
		*/loadView('footer/footer.php');      
	}   
	
    /*
     * edit_Con()
     * This method calls the model to update the Contact Information of the User.
    */
	function edit_Con(){
		if($_GET['url']=='edit_Con'){
			
			$arrArgs=array(
			'houseNumber'=>@$_GET["ehno"],
			'street_number'=>@$_GET["estreetNo"],
			'street_name'=>@$_GET["estreetName"],
			'city'=>@$_GET["ecity"],
			'state'=>@$_GET["estate"],
			'country'=>@$_GET["ecountry"],
			'pincode'=>@$_GET['epincode'],
			'district'=>@$_GET['edistrict'],
			'i'=>@$_GET["neid"],
			);
			
			$arrData=loadModel("personalprofile","upCon",$arrArgs);
			header("location:".ROOTPATH."/index.php?controller=profile");
	
		}

		/*if(isset($_GET['delete_contact']))
		{

			$arrArgs= array('i'=>@$_GET["neid"], );
			$arrData=loadModel("personalprofile","delete_contact",$arrArgs);
			header("location:".ROOTPATH."/index.php?controller=profile");
		}*/
	}
	
    /*
     * tagline()
     * This method calls the model to update the User Name ,Last Name and About Me information
     * of the User.
    */
	function tagline(){
         if($_GET['url']=='tagline'){
          $msg="";
          $flag=true;
          if(!$_GET["fname1"]) {
            $msg.="First Name Can't Be Empty<br/>";
            $flag=false;
          }
          if(!$_GET["fname1"]) {
            $msg.="Last Name Can't Be Empty<br/>";
            $flag=false;
          }
          if(!$flag) {
            $_SESSION['profile_error']=$msg;
            header("location:".ROOTPATH."/index.php?controller=profile");
            return false;
          }
         	$arrArgs=array(
	       'about_myself'=>strip_tags(@$_GET["about"]),
	       'fname'=>strip_tags(@$_GET["fname1"]),
	       'lname'=>strip_tags(@$_GET["lname1"]),
	                );
    print_r($arrArgs);
    $arrData=loadModel("personalprofile","insertabout",$arrArgs);
	header("location:".ROOTPATH."/index.php?controller=profile");

         }

	}
    
    /*
     * new_Con()
     * This method calls the model to create a new Contact Information of the User.
    */
	function new_Con(){
	if($_GET['url']=='new_Con'){
	
	
	$arrArgs=array(
	'houseNumber'=>@$_GET["nehno"],
	'street_number'=>@$_GET["nestreetNo"],
	'street_name'=>@$_GET["nestreetName"],
	'city'=>@$_GET["necity"],
	'state'=>@$_GET["nestate"],
	'country'=>@$_GET["necountry"],
	'pincode'=>@$_GET["nepincode"],
	'district'=>@$_GET["nedistrict"],
	);
	
	$arrData=loadModel("personalprofile","insertCon",$arrArgs);
	header("location:".ROOTPATH."/index.php?controller=profile");
	}
	}
    
    /*
     * new_Education()
     * This method calls the model to add a new Education Entry in Users Profile.
    */
	function new_Education(){
	if($_GET['url']=='new_Education'){
	
	$arrArgs= array("institute"=>@$_GET['newinstitute'],
	"start_year"=>@$_GET['newistart'],
	"end_year "=>@$_GET['newiend'],
	"university"=>@$_GET['newuniversity'],  
	
	);
	$arrData=loadModel("personalprofile","insert_Education",$arrArgs);
	
	header("location:".ROOTPATH."/index.php?controller=profile");
	
	}
	}
	
    /*
     * editInfo()
     * This method calls the model to update the favourites of the User.
    */
	function editInfo(){
	if($_POST['url']=='editInfo'){
	$arrArgs=array('fav_book' =>@$_POST["fav_book"] ,
	'fav_movies'=>@$_POST["fav_mv"],
	'fav_food'=>@$_POST["fav_food"]   
	);
	
	$arrData=loadModel("personalprofile","upInfo",$arrArgs);
	header("location:".ROOTPATH."/index.php?controller=profile");
	
	
	} 
	
	}
    
    /*
     * basicInfoUp()
     * This method calls the model to update the Basic Information about the User.
    */
	function basicInfoUp()
	{
	if($_POST['url']=='basicInfoUp'){
	
	$arrArgs=array('gender' =>@$_POST['gender'] ,
	'dob'=>@$_POST['dob'],
	'relationship_status'=>@$_POST['relationship'],
	'i_in'=>@$_POST['i_in'] // @todo intersted in vales are not going into database
	);
	
	$arrData=loadModel("personalprofile","upbInfo",$arrArgs);
	header("location:".ROOTPATH."/index.php?controller=profile");
	
	}
	}
	
	
	/*
     * edu_up()
     * This method calls the model to update the Education details of the User.
	*/
	function edu_up ()
	{
	
		if($_POST['url']=='edu_up'){
		
			$arrArgs= array('institute' =>@$_POST['institute'] ,
			'start_year'=>@$_POST['istart'],
			'end_year'=>@$_POST['iend'],
			'university'=>@$_POST['university'],
			'id'=>@$_POST['eeid']
			);
			
			
			$arrData=loadModel("personalprofile","up_E",$arrArgs);
			header("location:".ROOTPATH."/index.php?controller=profile");
		}
	
	}


}
?>
