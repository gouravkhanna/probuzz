<?php
include_once 'class/dbAcess.php';
class subscription extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    function addSubscription($arrArg=array()) {
        $data=array(
                "user_id"=>strip_tags($arrArg['id']),
                "corp_id"=>strip_tags($arrArg['corp_id']),
                "subscribe_status"=>'0',
                );
        $result=$this->db->insert("subscription",$data,true);
        if ($result && $result->rowCount () > 0) {
           return true;
        } else {
           return false;
        }
    }
    function removeSubscription($arrArg=array()){
        $data=array(
               "subscribe_status"=>'1',
        );
        $condition=array(
                "user_id"=>$arrArg['id'],
                "corp_id"=>$arrArg['corp_id'],
          );
        $result=$this->db->update("subscription",$data,$condition);
        if ($result && $result->rowCount () > 0) {
            return true;
        } else {
            return false;
        }
    }
    function checkSubscriptionStatus($arrArg=array()) {
        $data['tables']="subscription";
        $data['columns']=array("subscribe_status");
        $data['conditions']=array(
                "user_id"=>$arrArg['user_id'],
                "corp_id"=>$arrArg['id'],
          );
        $data['order']="subscribe_date desc";
        $result=$this->db->select($data);
        if ($result) {
            $row=$result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
}
?>