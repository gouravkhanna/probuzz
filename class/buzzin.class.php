<?php
include_once 'class/dbAcess.php';
class buzzin extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    function loadBuzz($arrArg = array()) {
        $id = $arrArg ['id'];
        
        $sql = "select b.user_id as id,b.id as buzz_id,b.buzztext,
        p.first_name,p.last_name,photo.path, b.buzz_time
        from 
        buzz b 
        join personal_profile p 
            on p.user_id=b.user_id 
        join photo 
            on photo.id=p.profile_pic_id 
        where 
        ( b.user_id='$id' 
        OR 
        b.user_id in 
	    (select f.friend_id from friend f
	     where f.user_id='$id') )
       	order by buzz_time desc";
        $result = $this->executeSQLP ( $sql );
        while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
            $row2 = array ();
            $buzzId = $row ['buzz_id'];
            $row2 = $this->loadComment ( array (
                    "buzz_id" => $buzzId 
            ), true );
            $buzz [] = array (
                    "buzz" => $row,
                    "comment" => $row2 
            );
            $row = array ();
        }
        if (isset ( $buzz )) {
            return $buzz;
        } else {
            return false;
        }
    }
    function buzzUpdate($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            $buzztext = $arrArgs ['buzztext'];
            $id = $arrArgs ['id'];
            // $sql="insert into probuzz.buzz (user_id,buzztext)
            // values($id,'$buzztext')";
            $data = array (
                    "user_id" => $id,
                    "buzztext" => "$buzztext" 
            );
            
            $result = $this->db->insert ( "buzz", $data );
            if ($result && $result->rowCount () > 0) {
                $this->executeSQLP ( "call addNotification('" . $_SESSION ['id'] . "','0','" . $_SESSION ['id'] . "',now(),'" . $buzztext . "')" ) or die ( mysql_error () );
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function loadComment($arrArgs = array(), $flag = false) {
        $ob = new DbConnection ();
        $buzz_id = $arrArgs ['buzz_id']; // retive all comments of this buzz ID
                                         // YO
                                         // :D
        $sql = "select c.comment_text,p.path from comment
		 c join  photo p on c.user_id=p.user_id where c.buzz_id=$buzz_id";
        $data = array ();
        $data ['tables'] = "comment c";
        $data ['columns'] = array (
                'c.comment_text',
                'pp.path',
                'c.buzz_id as id' 
        );
        $data ['conditions'] = array (
                'c.buzz_id' => "$buzz_id" 
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
        $result = $this->db->select ( $data ); // /$ob->executeSQL($sql);
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
            $comment_text = $arrArgs ['comment_text'];
            $buzz_id = $arrArgs ['buzz_id'];
            
     //     $sql = "INSERT INTO probuzz.comment ( user_id,) 
	//	VALUES ( '$id', '$buzz_id', now(),'$comment_text')";
            $data = array (
                    "user_id" => "$id",
                    "buzz_id" => "$buzz_id",
                    "comment_time" => "now()",
                    "comment_text" => "$comment_text" 
            );
            $result = $this->db->insert ( "comment", $data );
            if ($result && $result->rowCount () > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>