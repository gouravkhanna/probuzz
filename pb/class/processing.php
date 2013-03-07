<?php
    require_once('proProfile.class.php'); 
    $p=new ProProfile();
    $p->__set($_POST['property'],$_POST['value']);
    $p->show();
?>