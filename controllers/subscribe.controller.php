<?php

include 'controller.controller.php';
class subscribe extends controller {
    function __construct(){
        parent::__construct();
    }
    function addSubscription() {
        if(isset($_REQUEST['corp_id'])) {
            $arrArg=array(
                    "id"=>$_SESSION['id'],
                    "corp_id"=>$_REQUEST['corp_id']
                    );
            $result=loadModel("subscription","addSubscription",$arrArg);
            if ($result == true) {
                echo "Subscribed";
            } else {
                echo "Error! Try later";
            }
        }
    }
    function removeSubscription() {
        if(isset($_REQUEST['corp_id'])) {
            $arrArg=array(
                    "id"=>$_SESSION['id'],
                    "corp_id"=>$_REQUEST['corp_id']
            );
            $result=loadModel("subscription","removeSubscription",$arrArg);
            if ($result == true) {
                echo "UnSubscribed";
            } else {
                echo "Error! Try later";
            }
        }
    }
    
}