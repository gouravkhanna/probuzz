<?php
session_start ();
ob_start ();
include_once 'library/lang/lang.en.php';
include_once 'library/lang/labels.lang.en.php';
include_once 'library/constant.php';
include_once ('library/common.inc.php');

ini_set ( 'display_errors', '1' );
if (isset ( $_REQUEST ['controller'] ) && ! empty ( $_REQUEST ['controller'] )) {
    $controller = $_REQUEST ['controller'];
} else {
    if (@$_SESSION ['type'] == 1) {
        $controller = "corporatecontroller";
    } else if (@$_SESSION ['type'] == 2) {
        $controller = "admin";
    } else {
        $controller = 'Controller'; // default controller
    }
}

if (isset ( $_REQUEST ['url'] ) && ! empty ( $_REQUEST ['url'] )) {
    $function = $_REQUEST ['url'];
    // friendly redirection
    $url = explode ( "/", @$_REQUEST ['url'] );
    if (count ( $url ) > 1) {
        $controller = $url [0];
   /*  if(count ( $url ) >3) {
        	header("location:".ROOTPATH."index.php");
        	$function = 'home';
        } else  {*/
        	$function = $url [1];
    //   }
    }
} else {
    $function = 'home'; // default method to be called or the first method
}

if ($function != "register" && (@$_SESSION ['id'] == "" || ! isset ( $_SESSION ['id'] ))) {
    if (! isset ( $arrData )) { // arrData used for display message on login(Server
                           // Side)
        $function = "buzzin"; // method if user is not login
    }
}

$controller = strtolower ( $controller );

$fn = SITE_ROOT . 'controllers/' . $controller . '.controller.php';

if (file_exists ( $fn )) {
    require_once ($fn);
    $controllerClass = $controller;
    $obj = new $controllerClass ();
    $obj->$function ();
} else {
    die ( $controller . ' controller not found' );
}
ob_flush ();
?>
