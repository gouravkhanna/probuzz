<?php
include_once 'class/dbAcess.php';
// session_start();
class photos extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    /*Load all the photos*/
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
    /*Upload photo for user*/
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
                                
                                echo "<br/> File Uploaded Successfully</br>";
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
    /*Load photo comment*/
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
    /*Insert comment on photo*/
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
    /*Upload profile picture*/
    function uploadProfilePic($arrArgs = array()) {
        $_SESSION ['profilepic']="";
        $valid_file = true;
        print_r($_FILES);
        if ($_FILES ['myfile'] ['name']) {
            $allowedExts = array (
                    "gif",
                    "jpg",
                    "png",
                    "jpeg" 
            );
            $namess = "name";
            $extension = end ( explode ( ".", @$_FILES ["myfile"] ["name"] ) );
            if (in_array ( $extension, $allowedExts )) {
                if (! $_FILES ['myfile'] ['error']) {
                    $new_file_name = strtolower ( $_FILES ['myfile'] ['tmp_name'] ); // rename
                                                                                // file
                    if ($_FILES ['myfile'] ['size'] > (1024000))                     // can't be larger
                                                              // than 1 MB
                    {
                        $valid_file = false;
                       $_SESSION ['profilepic'] .= 'Oops!  Your file\'s size is to large.';
                    }
                    if ($valid_file) {
                        
                        $target_path = "data/photo/profilepic/";
                        
                        $target_path = $target_path . "profile" . $_SESSION ['id'] . basename ( $_FILES ['myfile'] ['name'] );
                        
                        if (move_uploaded_file ( $_FILES ['myfile'] ['tmp_name'], $target_path )) {
                            $data = array (
                                    'user_id' => strip_tags ( $_SESSION ['id'] ),
                                    'photo_name' => "profilePic",
                                    'path' => $target_path 
                            );
                            $result = $this->db->insert ( "photo", $data );
                            if ($result && $result->rowCount () > 0) {
                                $lastId = $this->db->lastInsertId ();
                                $data=array("profile_pic_id"=>$lastId);
                                $condition=array("user_id"=>$_SESSION['id']);
                                $result = $this->db->update ( "personal_profile", $data,$condition );
                                echo "Updated";
                            } else {
                                return false;
                            }
                            $_SESSION ['profilepic'] .= "Your Profile Pic is Changed Sucessfully";
                        } else {
                         $_SESSION ['profilepic'] .= "There was an error uploading the file, please try again!";
                        }
                    }
                } 

                else {
                    // set that to be the returned message
                    $message = 'Ooops!  Your upload error';
                }
            } else {
                $_SESSION ['profilepic'] .= "Please Put a valid Extension";
            }
        }
    }
    /*Upload corporate profile picture*/
    function uploadCorpProfilePic($arrArgs = array()) {
        $_SESSION ['profilepic']="";
        $valid_file = true;
        print_r($_FILES);
        if ($_FILES ['myfile'] ['name']) {
            $allowedExts = array (
                    "gif",
                    "jpg",
                    "png",
                    "jpeg"
            );
            $namess = "name";
            $extension = end ( explode ( ".", @$_FILES ["myfile"] ["name"] ) );
            if (in_array ( $extension, $allowedExts )) {
                if (! $_FILES ['myfile'] ['error']) {
                    $new_file_name = strtolower ( $_FILES ['myfile'] ['tmp_name'] ); // rename
                    // file
                    if ($_FILES ['myfile'] ['size'] > (1024000))                     // can't be larger
                        // than 1 MB
                    {
                        $valid_file = false;
                        $_SESSION ['profilepic'] .= 'Oops!  Your file\'s size is to large.';
                    }
                    if ($valid_file) {
    
                        $target_path = "data/photo/profilepic/";
    
                        $target_path = $target_path . "profile" . $_SESSION ['id'] . basename ( $_FILES ['myfile'] ['name'] );
    
                        if (move_uploaded_file ( $_FILES ['myfile'] ['tmp_name'], $target_path )) {
                            $data = array (
                                    'user_id' => strip_tags ( $_SESSION ['id'] ),
                                    'photo_name' => "profilePic",
                                    'path' => $target_path
                            );
                            $result = $this->db->insert ( "photo", $data );
                            if ($result && $result->rowCount () > 0) {
                                $lastId = $this->db->lastInsertId ();
                                $data=array("profile_pic_id"=>$lastId);
                                $condition=array("user_id"=>$_SESSION['id']);
                                $result = $this->db->update ( "personal_profile", $data,$condition );
                                $result = $this->db->update ( "corporate_profile", $data,$condition );
                                echo "Updated";
                            } else {
                                return false;
                            }
                            $_SESSION ['profilepic'] .= "Your Profile Pic is Changed Sucessfully";
                        } else {
                            $_SESSION ['profilepic'] .= "There was an error uploading the file, please try again!";
                        }
                    }
                }
    
                else {
                    // set that to be the returned message
                    $message = 'Ooops!  Your upload error';
                }
            } else {
                $_SESSION ['profilepic'] .= "Please Put a valid Extension";
            }
        }
    }
    /*Upload header*/
    function uploadHeader($arrArgs = array()) {
        $_SESSION ['profilepic']="";
        $valid_file = true;
        print_r($_FILES);
        if ($_FILES ['myfile'] ['name']) {
            $allowedExts = array (
                    "gif",
                    "jpg",
                    "png",
                    "jpeg"
            );
            $namess = "name";
            $extension = end ( explode ( ".", @$_FILES ["myfile"] ["name"] ) );
            if (in_array ( $extension, $allowedExts )) {
                if (! $_FILES ['myfile'] ['error']) {
                    $new_file_name = strtolower ( $_FILES ['myfile'] ['tmp_name'] ); // rename
                    // file
                    if ($_FILES ['myfile'] ['size'] > (1024000))                     // can't be larger
                        // than 1 MB
                    {
                        $valid_file = false;
                        $_SESSION ['profilepic'] .= 'Oops!  Your file\'s size is to large.';
                    }
                    if ($valid_file) {
    
                        $target_path = "data/photo/header/";
    
                        $target_path = $target_path . "head" . $_SESSION ['id'] . basename ( $_FILES ['myfile'] ['name'] );
    
                        if (move_uploaded_file ( $_FILES ['myfile'] ['tmp_name'], $target_path )) {
                            $data = array (
                                    'user_id' => strip_tags ( $_SESSION ['id'] ),
                                    'photo_name' => "profilePic",
                                    'path' => $target_path
                            );
                            $result = $this->db->insert ( "photo", $data );
                            if ($result && $result->rowCount () > 0) {
                                $lastId = $this->db->lastInsertId ();
                                $data=array("header_id"=>$lastId);
                                $condition=array("user_id"=>$_SESSION['id']);
                                $result = $this->db->update ( "personal_profile", $data,$condition );
                                echo "Updated";
                            } else {
                                return false;
                            }
                            $_SESSION ['profilepic'] .= "Your Cover is Changed Sucessfully";
                        } else {
                            $_SESSION ['profilepic'] .= "There was an error uploading the file, please try again!";
                        }
                    }
                }
    
                else {
                    // set that to be the returned message
                    $message = 'Ooops!  Your upload error';
                }
            } else {
                $_SESSION ['profilepic'] .= "Please Put a valid Extension";
            }
        }
    }
}