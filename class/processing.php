<?php
    require_once('proProfile.class.php');
    
    $fields=array();
    foreach($_POST as $key =>$value) {
        if($key!='table') {
            $fields[$key] = $value;        
        }
    }
    $profile=new ProProfile();
    
    $profile->updateProfile($fields,$_POST['table']);
    
    
?>