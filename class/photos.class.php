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
        $result = $this->db->select ( $data );
        if ($result) {
            while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
            }
            return $row;
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
}