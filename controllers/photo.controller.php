<?php

include 'controller.controller.php';
class photo extends controller {
    function __construct() {
        
    }
    function home() {
        loadView("head/head1.php");
        echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";
        loadView("photo/gallery.php");
    }
    
    
}