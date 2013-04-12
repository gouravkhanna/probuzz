<?php
include_once 'class/dbAcess.php';
// session_start();
class adminstrator extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    function loadBuzzSpam($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            $data ['tables'] = 'spams';
            $data ['columns'] = array (
                    'count(spam_id) as spam_count',
                    'spam_id' 
            );
            $data ['conditions'] = array (
                    'spam_type' => '0',
                    'spam_review' => '0' 
            );
            $data ['group'] = "spam_id";
            $result = $this->db->select ( $data );
            if ($result) {
                while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $row;
            } else {
                return false;
            }
        }
    }
    function loadUserSpam($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            $data ['tables'] = 'spams';
            $data ['columns'] = array (
                    'count(spam_id) as spam_count',
                    'spam_id' 
            );
            $data ['conditions'] = array (
                    'spam_type' => '1',
                    'spam_review' => '0' 
            );
            $data ['group'] = "spam_id";
            $result = $this->db->select ( $data );
            if ($result) {
                while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $row;
            } else {
                return false;
            }
        }
    }
    function buzzDelete($arrArg = array()) {
        if (! empty ( $arrArg ['buzz_id'] )) {
            $condition = array (
                    "id" => $arrArg ['buzz_id'] 
            );
            $data = array (
                    "buzz_status" => '1' 
            );
            $result = $this->db->update ( "buzz", $data, $condition );
            if ($result && $result->rowCount () > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    function updateReview($arrArg = array()) {
        if (! empty ( $arrArg ['spam_id'] )) {
            $spamAction = strip_tags($arrArg ['spam_action']);
            $spamType = strip_tags($arrArg ['spam_type']);
            $condition = array (
                    "spam_id" => $arrArg ['spam_id'],
                    "spam_type" => "$spamType" 
            );
            $data = array (
                    "spam_review" => '1',
                    "spam_action" => "$spamAction" 
            );
            
            $result = $this->db->update ( "probuzz.spams", $data, $condition );
            if ($result && $result->rowCount () > 0) {
                echo "SSS";
                return true;
            } else {
                echo "NOOSOS";
                return false;
            }
        }
    }
    function banUserOneDay($arrArg = array()) {
        if (! empty ( $arrArg ['spam_id'] )) {
            $spamType = $arrArg ['spam_type'];
            if ($spamType == 1) {
                $condition = array (
                        "user_id" => $arrArg ['spam_id'] 
                );
            } else {
                $data ['tables'] = "buzz";
                $data ['column'] = array (
                        "user_id" 
                );
                $data ['conditions'] = array (
                        "id" => $arrArg ['spam_id'] 
                );
                $res = $this->db->select ( $data );
                if ($res) {
                    $row = $res->fetch ( PDO::FETCH_ASSOC );
                    $condition = array (
                            "user_id" => strip_tags($row ['user_id']) 
                    );
                } else {
                    return false;
                }
            }
            $data = array (
                    "current_status" => '2' 
            );
            
            $result = $this->db->update ( "users", $data, $condition );
            if ($result && $result->rowCount () > 0) {
                return true;
            } else {
               return false;
            }
        }
    }
    function banUserOnePermanent($arrArg = array()) {
        if (! empty ( $arrArg ['spam_id'] )) {
            $condition = array (
                    "user_id" => strip_tags($arrArg ['spam_id'])
            );
            $data = array (
                    "current_status" => '3' 
            );
            
            $result = $this->db->update ( "users", $data, $condition );
            if ($result && $result->rowCount () > 0) {
                echo "aa";
                return true;
            } else {
                echo "NooooS";
                return false;
            }
        }
    }
    function loadSpamReview($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            $data ['tables'] = 'spams';
            $data ['columns'] = array (
                    'count(spam_id) as spam_count',
                    'spam_id',
                    'spam_type',
                    'spam_review_time',
                    'spam_action' 
            );
            $data ['conditions'] = array (
                    'spam_review' => '1' 
            );
            $data ['group'] = "spam_id,spam_type";
            $result = $this->db->select ( $data );
            if ($result) {
                while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $row;
            } else {
                return false;
            }
        }
    }
    function loadContactUs($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            if (isset ( $arrArgs ['read'] )) {
                $read = $arrArgs ['read'];
            } else {
                $read = "1";
            }
            $data ['tables'] = 'contact_us';
            $data ['columns'] = array (
                    'id',
                    'name',
                    'email',
                    'details',
                    'contact_time',
                    'details_read' 
            );
            if ($read == 0) {
                $data ['conditions'] = array (
                        'details_read' => '0' 
                );
            }
            $data ['order'] = "contact_time desc";
            
            $result = $this->db->select ( $data );
            if ($result) {
                while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
                }
                return $row;
            } else {
                return false;
            }
        }
    }
    function updateFeedback($arrArg = array()) {
        if (! empty ( $arrArg ['id'] )) {
            $condition = array (
                    "id" => $arrArg ['id'] 
            )
            ;
            $data = array (
                    "details_read" => '1' 
            );
            
            $result = $this->db->update ( "probuzz.contact_us", $data, $condition );
            if ($result && $result->rowCount () > 0) {
                return true;
            } else {
                
                return false;
            }
        }
    }
 
    function updateAboutUs($arrArg = array()){
       if($arrArg['text']!="") {
           $condition = array (
                     "id" => '1',
        )
        ;
        $data = array (
                "about_us" => strip_tags($arrArg['text']),
        );
        
        $result = $this->db->update ( "probuzz.pb_data", $data, $condition );
        if ($result && $result->rowCount () > 0) {
            return true;
        } else {
            return false;
        }
       }
    }
    function addAdmin($arrArg=array()) {
        if (! empty ( $arrArg)) {
            //echo "<pre>";
            //print_r($arrArg);
            $data["tables"]="users";
            $data["columns"]=array(
                "count(*) as count"
            );
            $data['conditions']=array(
                "user_name" => $_REQUEST['user_name']
            );
            $userExists=$this->db->select($data);
            $row=$userExists->fetch(PDO::FETCH_ASSOC);
            if($row['count']) {
                echo "User Name Already Exists.";
                return ;
            }
            $data=array(
                "user_name"=>strip_tags($_REQUEST['user_name']),
                "password" => md5($_REQUEST['password']),
                "current_status" => strip_tags($_REQUEST['current_status']),
                "type" => "2"
            );
            $result=$this->db->insert("users",$data);
            if($result) {
                echo "Account Successfully Added.";
            } else {
                echo "Error Occured While Adding New Admin Account.";
            }
        }
    }
    function showAllAdmin($arrArg=array()) {
        if (! empty ( $arrArg ['id'] )) {
            $data["tables"]="users";
            $data["columns"]=array(
                "user_id",
                "user_name",
                "current_status"
            );
            $data['conditions']=array(
                "type" => "2"
            );
            $result=array();
            $temp=$this->db->select($data);
            while($row=$temp->fetch(PDO::FETCH_ASSOC)) {
                $result[]=$row;
            }
            if($result) {
                return $result;
            } else {
                return false;
            }
            
        }
    }
    function showAllUsers($arrArgs=array()) {
        if($arrArgs) {
            $data['columns']=array(
                "user_id",
                "user_name",
                "current_status"
            );
            $data['tables']="users";
            $data['conditions']=array(
                "type"=>"0"
            );
            $temp=$this->db->select($data);
            $result=array();
            while($row=$temp->fetch(PDO::FETCH_ASSOC)) {
                $result[]=$row;
            }
            return $result;
        }
    }
    function deactivateAccount($arrArgs=array()) {
           if($arrArgs){
            $data=array(
                "current_status"=>$arrArgs['status']
            );
            $where=array(
                "user_id"=>$arrArgs['rowId']
            );
            $this->db->update("users",$data,$where);
        }
        return "User Account Deactivated.";
    }
    function activateAccount($arrArgs=array()) {
        if($arrArgs){
            $data=array(
                "current_status"=>$arrArgs['status']
            );
            $where=array(
                "user_id"=>$arrArgs['rowId']
            );
            $this->db->update("users",$data,$where);
        }
        return "User Account Activated.";
    }
}
?>