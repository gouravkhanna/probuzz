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

   if($_GET['url']=='editCon'){

 
    $arrArgs=array(
		'houseNumber'=>@$_GET["ehno"],
		'street_number'=>@$_GET["estreetNo"],
		'street_name'=>@$_GET["estreetName"],
		'city'=>@$_GET["ecity"],
		'state'=>@$_GET["estate"],
		'country'=>@$_GET["ecountry"],
	);
	   
     $arrData=loadModel("personalprofile","upCon",$arrArgs);
     /* if($arrData=='true'){
header('location:index.php');
      }*/


       }


    } 

  function editInfo(){
          if($_GET['url']=='editInfo'){
             $arrArgs=array('fav_book' =>@$_GET["fav_book"] ,
                             'fav_movies'=>@$_GET["fav_mv"],
                              'fav_food'=>@$_GET["fav_food"]   
              );
             print_r($arrArgs);
           $arrData=loadModel("personalprofile","upInfo",$arrArgs);

          } 

  }
  function basicInfoUp()
  {
  if($_GET['url']=='basicInfoUp'){
  
    $arrArgs=array('gender' =>@$_GET['gender'] ,
                    'dob'=>@$_GET['dob'],
                    'relationship_status'=>@$_GET['relationship'],
                    'i_in'=>@$_GET['i_in'] // @todo intersted in vales are not going into database
     );
  print_r($arrArgs);
     $arrData=loadModel("personalprofile","upbInfo",$arrArgs);
  }
}
 
  function wUp(){
  if($_GET['url']=='wUp'){

     $arrArgs=array('company' =>@$_GET['companyName'],
                     'start_date'=>@$_GET['start_date'],
                     'end_date'=>@$_GET['end_date'],
                     'position'=>@$_GET['position'] );

     print_r($arrArgs);
      $arrData=loadModel("personalprofile","up_Work",$arrArgs);

  }


  }


 function edu_up ()
 {

   if($_GET['url']=='edu_up'){

   	$arrArgs= array('institute' =>@$_GET['institute'] ,
   	                  'start_year'=>@$_GET['istart'],
   	                   'end_year'=>@$_GET['iend'],
   	                   'university'=>@$_GET['university'] );
  
  print_r($arrArgs);
    $arrData=loadModel("personalprofile","up_E",$arrArgs);

   }

 }


}




?>



