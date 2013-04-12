<?php

include 'controller.controller.php';
class photo extends controller {
    function __construct() {
        
    }
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
    function displayComment() {
        $arrData = loadModel ( "photos", "loadPhotoComment", array (
                'photo_id' => $_REQUEST ['photo_id']
        ) );
        loadView ( "midpanel/displayphotocomment.php", $arrData );
     
    }
    function newPhoto(){
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
        loadView("photo/uploadPhoto.php");
        loadView("footer/footer.php");
    }
    
}