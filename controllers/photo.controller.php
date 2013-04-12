<?php

include 'controller.controller.php';
class photo extends controller {
    function __construct() {
        
    }
    function home() {
        loadView("head/head1.php");
        echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";
        $arrData=loadModel("photos", "loadPhoto",array("id"=>@$_SESSION['id']));
        loadView("photo/gallery.php",$arrData);
    }
    function upload() {
        loadModel("photos","uploadPhoto");
    }
    
    
}