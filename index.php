<?php
session_start();
include_once 'library/lang/lang.en.php';
include_once 'library/lang/labels.lang.en.php';
include_once 'library/constant.php';
include_once('library/common.inc.php');

ini_set('display_errors','1');
if(isset($_REQUEST['controller']) && !empty($_REQUEST['controller'])){
      $controller =$_REQUEST['controller'];
    
}else{
     if(@$_SESSION['type']==1)  $controller ="corporatecontroller";
     else $controller ='Controller';  //default controller
}

if(isset($_REQUEST['url']) && !empty($_REQUEST['url'])) {
      $function =$_REQUEST['url'];     
}
else {
    $function ='home'; //default method to be called or the first method
}

if($function!="register" && (@$_SESSION['id']=="" || !isset($_SESSION['id']))) {
   if(!isset($arrData)) $function="buzzin";   //method if user is not login
}

$controller=strtolower($controller);

$fn = SITE_ROOT.'controllers/'.$controller . '.controller.php';

if(file_exists($fn)){
      require_once($fn);
      $controllerClass=$controller;
      $obj=new $controllerClass;
      $obj->$function();



}else{
      die($controller .' controller not found');
}
?>
