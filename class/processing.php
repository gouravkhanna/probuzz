<?php
    require_once('proProfile.class.php');
   
   
    $p=new ProProfile();
    foreach($_POST as $key =>$value) {
        $p->__set($key,$value);    
    }
    $p->insertProfile($_POST['table']);
    //$p->show();
    
?>