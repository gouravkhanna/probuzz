<?php
    require_once('proProfile.class.php');
   
   
    $p=new ProProfile();
    foreach($_POST as $key =>$value) {
        
        if($key!='table') {
            echo "$key $value <br/>";    
        }
        //$p->__set($key,$value);    
    }
    
    //$p->show();
?>