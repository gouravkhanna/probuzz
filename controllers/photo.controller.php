<?php

include 'controller.controller.php';
class photo extends controller {
    function __construct() {
        
    }
    /*load home page*/
    function home() {
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
        $arrData=loadModel("photos", "loadPhoto",array("id"=>@$_SESSION['id']));
        loadView("photo/gallery.php",$arrData);
        loadView("footer/footer.php");
    }
    function upload() {
        loadModel("photos","uploadPhoto");
    }
    /*Insert Comments on photo*/
    function insertComment(){
        $arrArgs = array (
                "id" => @$_SESSION ['id'],
                "photo_id" => $_REQUEST ['photo_id'],
                "comment_text" => $_REQUEST ['comment_text']
        );
        if (isset ( $_POST ['comment_text'] ) && ! empty ( $_POST ['comment_text'] )) {
            $arrData = loadModel ( "photos", "insertComment", $arrArgs );
        
            if($arrData == 'true') {
                echo "Commented";
            }
        } else {
        
            echo "Encountered a Problem Wait for a Second!";
        }
    }
/*Display all the comments on photo */
    function displayComment() {
        $arrData = loadModel ( "photos", "loadPhotoComment", array (
                'photo_id' => $_REQUEST ['photo_id']
        ) );
        loadView ( "midpanel/displayphotocomment.php", $arrData );
     
    }
    /* New photo upload*/
    function newPhoto(){
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
        loadView("photo/uploadPhoto.php");
        loadView("footer/footer.php");
    }
    /*Upload profile picture*/
    function uploadProfilePic(){
        loadModel("photos","uploadProfilePic",array("id"=>$_SESSION['id']));
    }
    /*Profile pic display */
    function profilePic(){
        if(@$_REQUEST['profilepicupload']=="Upload") {
            loadModel("photos","uploadProfilePic",array("id"=>$_SESSION['id']));
        }
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
        loadView("photo/uploadProfilePic.php");
        loadView("footer/footer.php");
       
    }
    /*Upload corporate picture*/
    function uploadCorpProfilePic(){
        if(@$_REQUEST['profilepicupload']=="Upload") {
            loadModel("photos","uploadCorpProfilePic",array("id"=>$_SESSION['id']));
        }
        $arrData = array (
                'id' => $_SESSION ['id'] 
        );
        loadView ( 'head/head1.php' );
        $arrArgs = loadModel ( "corporate", "fetchName", $arrData );
        $arrArgs ["profile_pic_path"] = loadModel ( "users", "getProfilePic", $arrData );
        loadView ( "navigation/corpnavigation.php", $arrArgs );
        loadView("photo/uploadProfilePic.php");
        loadView("footer/footer.php");
         
    }
    /*Upload header of user*/
    function uploadheader(){
         if(@$_REQUEST['profilepicupload']=="Upload") {
            loadModel("photos","uploadHeader",array("id"=>$_SESSION['id']));
        }
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
        $arrData=loadModel("photos","getHeaders",$arrData);
        loadView("photo/uploadProfilePic.php",$arrData);
        loadView("footer/footer.php");
   }
   function updateChooseHeader(){
      $arrData = array (
               'id' => $_SESSION ['id'],
               "head_id"=>$_REQUEST['header_id'],
       );
       if(isset($_REQUEST['header_id'])) {
           loadModel("photos","updateChooseHeader",$arrData);
       }
       header("location:".ROOTPATH."index.php?controller=photo&url=uploadheader");
   }
    
    
    
}