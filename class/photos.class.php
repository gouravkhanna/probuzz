<?php
include_once 'class/dbAcess.php';
// session_start();
class photos extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    function loadPhoto($arrArgs=array()) {
        $data['tables']="photo";
        $data['conditions']=array(
                "user_id"=>$arrArgs['id'],
                );
        $data['order']="photo_date desc";
        $result = $this->db->select ( $data );
        if ($result) {
            $r=array();
            while ( $row1 = $result->fetch ( PDO::FETCH_ASSOC ) ) {
                $row=$row1;
                
                $row['comment']=$this->loadPhotoComment(array(
                                                    "photo_id"=>$row1['id']
                                                    ),true);
                $r[]=$row;
           
            }
           return $r;
            
        } else {
            return false;
        }
    }
    function uploadPhoto() {
            
        $size = 0;
        for($j = 1; $j <= $_REQUEST ['size']; $j ++) {
            for($i = 0; $i < 25; $i ++)             //
            {
                if (! isset ( $_FILES ['resume1'] ['name'] ["$i"] )) {
                    break;
                }
                echo @$_FILES ['resume1'] ['name'] ["$i"] . "<br/>";
                $key = "resume$j";
                $size += @$_FILES ["$key"] ["size"] ["$i"];
                if ($size >= 1048576) {
                    echo "total size Exceed 25 Mb will not upload more File (Bye)";
                    break;
                }
                echo "<br/>Upload Status <br/>";
                
                $allowedExts = array (
                        "gif",
                        "jpg",
                        "png",
                        "jpeg" 
                );
                $namess="name";
                $extension = end ( explode ( ".", @$_FILES ["$key"] ["$namess"] ["$i"] ) );
                if (in_array ( $extension, $allowedExts )) {
                    if ($_FILES ["$key"] ["error"] ["$i"] > 0) {
                        echo "Return Code: " . $_FILES ["$key"] ["error"] ["$i"] . "<br>";
                    } else {
                        if (file_exists ( "upload/" . $_FILES ["$key"] ["name"] ["$i"] . ".$extension" )) { // $_FILES["resume"]["name"]."$extension"))
                                                                                                           // {
                            echo "$fileNewName.$extension already exists.<br/> <a href=test.php> Go back and Retry</a> ";
                        } else {
                            $newName = time () . $_SESSION ['id'] . $i;
                            $status = move_uploaded_file ( $_FILES ["$key"] ["tmp_name"] ["$i"], "data/photo/upload/" . $newName . ".$extension" ); // "$fileNewName.$extension"
                            
                            if ($status) {
                                   $data = array (
                                            'user_id' => strip_tags ( $_SESSION ['id'] ),
                                            'photo_name'=>$newName,
                                            'path' =>"data/photo/upload/" . $newName . ".$extension",
                                    );
                                $result = $this->db->insert ( "photo", $data );
                                if ($result && $result->rowCount () > 0) {
                                   echo "Updated";
                                } else {
                                    return false;
                                }
                                
                                echo "<br/> File Uploaded Successfully";
                            } else {
                                echo "<br/>File Upload Failed.";
                            }
                        }
                    }
                } else {
                    echo "<br/>Invalid file Format";
                }
            } // end of for loop
        }
    }
    function loadPhotoComment($arrArgs = array(), $flag = false) {
        $ob = new DbConnection ();
        $buzz_id = $arrArgs ['photo_id']; // retive all comments of this buzz ID
    
        $sql = "select c.comment_text,p.path from comment
        c join  photo p on c.user_id=p.user_id where c.photo_id=$buzz_id";
        $data = array ();
        $data ['tables'] = "comment c";
        $data ['columns'] = array (
                'c.comment_text',
                'pp.path',
                'c.id',
                'c.photo_id',
                'p.user_id as user_id',
                'p.first_name',
                'p.last_name',
                'unix_timestamp(c.comment_time) as comment_time',
        );
        $data ['conditions'] = array (
                'c.photo_id' => "$buzz_id",
                'c.comment_status'=>'0',
        );
        $data ['joins'] [] = array (
                'table' => 'personal_profile p ',
                'type' => 'INNER',
                'conditions' => array (
                        'p.user_id' => 'c.user_id'
                )
        );
        $data ['joins'] [] = array (
                'table' => 'photo pp',
                'type' => 'INNER',
                'conditions' => array (
                        'p.profile_pic_id' => 'pp.id'
                )
        );
        $result = $this->db->select ( $data );
        while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
        }
        if ($flag) {
            return $row;
        } else {
            $comments = array (
                    "comment_text" => $row
            );
            return $comments;
        }
        // code for retriving comments
        // and return in array
    }
    function insertComment($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
    
            $id = $arrArgs ['id'];
            $comment_text = strip_tags ( $arrArgs ['comment_text'] );
            if($comment_text!="") {
                $photo_id = $arrArgs ['photo_id'];
                $data = array (
                        "user_id" => "$id",
                        "buzz_id" => "1",
                        "photo_id" => "$photo_id",
                        "comment_text" =>"$comment_text"
                );
                $result = $this->db->insert ( "comment", $data );
                if ($result && $result->rowCount () > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}