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
				
	}		
        
        function edit_Con(){

   if($_POST['url']=='edit_Con'){

 
    $arrArgs=array(
		'houseNumber'=>@$_POST["ehno"],
		'street_number'=>@$_POST["estreetNo"],
		'street_name'=>@$_POST["estreetName"],
		'city'=>@$_POST["ecity"],
		'state'=>@$_POST["estate"],
		'country'=>@$_POST["ecountry"],
	);
	   
     $arrData=loadModel("personalprofile","upCon",$arrArgs);
     if($arrData){

   $this->home();
   }



       }


    } 

  function editInfo(){
          if($_POST['url']=='editInfo'){
             $arrArgs=array('fav_book' =>@$_POST["fav_book"] ,
                             'fav_movies'=>@$_POST["fav_mv"],
                              'fav_food'=>@$_POST["fav_food"]   
              );
            
           $arrData=loadModel("personalprofile","upInfo",$arrArgs);
            if($arrData){

         $this->home();
            }

   
          } 

  }
  function basicInfoUp()
  {
  if($_POST['url']=='basicInfoUp'){
  
    $arrArgs=array('gender' =>@$_POST['gender'] ,
                    'dob'=>@$_POST['dob'],
                    'relationship_status'=>@$_POST['relationship'],
                    'i_in'=>@$_POST['i_in'] // @todo intersted in vales are not going into database
     );

     $arrData=loadModel("personalprofile","upbInfo",$arrArgs);
     if($arrData){

   $this->home();
   }

  }
}
 
 

 function edu_up ()
 {

   if($_POST['url']=='edu_up'){

   	$arrArgs= array('institute' =>@$_POST['institute'] ,
   	                  'start_year'=>@$_POST['istart'],
   	                   'end_year'=>@$_POST['iend'],
   	                   'university'=>@$_POST['university'] );
  

    $arrData=loadModel("personalprofile","up_E",$arrArgs);
   if($arrData){

   $this->home();
   }

   }

 }


}




?>



