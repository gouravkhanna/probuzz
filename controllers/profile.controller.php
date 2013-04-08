<?php
include 'controller.controller.php';

class profile extends Controller
{
  function __construct()  {
    parent::__construct();
  }
  function home()
  {
     loadView('head/head1.php');
    $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
    $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
    loadView("navigation/profilenavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
    
    $arrData=loadModel("personalprofile","loadProfile",array("id"=>$_SESSION['id']));
    loadView('midpanel/bigmid.php',$arrData);
    /*$arrData=loadModel("personalprofile","loadProfile",array("id"=>$_SESSION['id']));
    loadView('midpanel/bigmid.php',$arrData);
    */loadView('footer/footer.php');
        
  }   
        
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
     if($arrData){

      $this->home();
   }
 }
} 

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
  if($arrData){

    $this->home();
   }
}
}

function new_Education(){
  if($_GET['url']=='new_Education'){

    $arrArgs= array("institute"=>@$_GET['newinstitute'],
                "start_year"=>@$_GET['newistart'],
                 "end_year "=>@$_GET['newiend'],
                 "university"=>@$_GET['newuniversity'],  
        
     );
        $arrData=loadModel("personalprofile","insert_Education",$arrArgs);
    
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



