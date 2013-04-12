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
    }
    function upload() {
        loadModel("photos","uploadPhoto");
    }
    
    
}