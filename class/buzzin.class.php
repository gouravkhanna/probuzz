<?php
include_once 'class/dbAcess.php';
class buzzin extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
    function buzzLike($arrArg = array()) {
        $data=array(
             "user_id"=>$arrArg['id'],
             "buzz_id"=>$arrArg['buzz_id'],
             "like_status"=>'0',
     );
     $result=$this->db->insert("probuzz.like",$data); 
     if($result && $result->rowCount() > 0) {
         return true;
     } else {
         return false;
     }
     
    }
    function unlike($arrArgs=array()){
    
     $data=array(
                "like_status"=>'1',
     );
     $condition=array(
             "user_id"=>$arrArgs['id'],
             "buzz_id"=>$arrArgs['buzz_id'],
             );
     $result=$this->db->update("probuzz.like",$data,$condition); 
     if($result && $result->rowCount() > 0) {
         return true;
     } else {
         return false;
     }
     
    } 
    function buzzDelete($arrArg = array()) {
     $condition=array(
             "user_id"=>$arrArg['id'],
             "id"=>$arrArg['buzz_id'],
     );
     $data=array(
             "buzz_status"=>'1',
     );
     $result=$this->db->update("buzz",$data,$condition); 
     if($result && $result->rowCount() > 0) {
         return true;
     } else {
         return false;
     }
     
}
function commentDelete($arrArg = array()) {
    $condition=array(
            "user_id"=>$arrArg['id'],
            "id"=>$arrArg['comment_id'],
    );
    $data=array(
            "comment_status"=>'1',
    );
    $result=$this->db->update("comment",$data,$condition);
    if($result && $result->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
     
}
    
    function loadBuzz($arrArg = array()) {
        $id = $arrArg ['id'];
        if(isset($arrArg ['limit']))
        {
            $limit=$arrArg ['limit'];
        } else {
            $limit=0;
        }
       
        $sql = "select b.user_id as id,b.id as buzz_id,b.buzztext,
        p.first_name,p.last_name,photo.path, b.buzz_time
        from 
        buzz b 
        join personal_profile p 
            on p.user_id=b.user_id 
        join photo 
            on photo.id=p.profile_pic_id 
        where 
        ( 
        b.buzz_status='0'
        AND
        ( b.user_id='$id' 
        OR 
        b.user_id in 
	    (select f.friend_id from friend f
	     where f.user_id='$id') ) )
       	order by buzz_time desc
        limit $limit,8
        ";
        $result = $this->executeSQLP ( $sql );
        while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
            $row2 = array ();
            $buzzId = $row ['buzz_id'];
            $row2 = $this->loadComment ( array (
                    "buzz_id" => $buzzId 
            ), true );
            $row3=$this->loadLike( array (
                    "id"=>$id,
                    "buzz_id" => $buzzId 
            ));
            $buzz [] = array (
                    "buzz" => $row,
                    "comment" => $row2,
                    "like"=>$row3, 
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
            $buzztext = strip_tags ( $arrArgs ['buzztext'] );
            $id = $arrArgs ['id'];
           
            $data = array (
                    "user_id" => $id,
                    "buzztext" => "$buzztext" 
            );      
                  
            $result = $this->db->insert ( "buzz", $data );
           $lastId=$this->db->lastInsertId();
            if ($result && $result->rowCount () > 0) {
                $this->executeSQLP ( "call addNotification(
                        '" . $id . "','0','" . $lastId . "
                        ',now(),'" . $buzztext . "')" ) 
                or die ( mysql_error () );
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
                'c.id',
                'c.buzz_id',
                'p.user_id as user_id',
                'p.first_name',
                'p.last_name',
                'unix_timestamp(c.comment_time) as comment_time',     
        );
        $data ['conditions'] = array (
                'c.buzz_id' => "$buzz_id",
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
    function loadLike($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
           $conditions=array(
                     "buzz_id"=>$arrArgs['buzz_id'],
                     "like_status"=>'0',
            );
            $result = $this->db->count( "probuzz.like",$conditions);
            $row= $result->fetch ( PDO::FETCH_ASSOC ) ;  
            $res['total_like']=$row['COUNT(*)'];
            $conditions=array(
                    "buzz_id"=>$arrArgs['buzz_id'],
                    "user_id"=>$arrArgs['id'],
                    "like_status"=>'0',
            );
            $result = $this->db->count( "probuzz.like",$conditions);
            $row= $result->fetch ( PDO::FETCH_ASSOC ) ;
                     
            $res['user_like']=$row['COUNT(*)'];
             return $res;
        }
        
    }
    function insertComment($arrArgs = array()) {
        if (! empty ( $arrArgs )) {
            
            $id = $arrArgs ['id'];
            $comment_text = strip_tags ( $arrArgs ['comment_text'] );
            $buzz_id = $arrArgs ['buzz_id'];
            $data = array (
                    "user_id" => "$id",
                    "buzz_id" => "$buzz_id",
                    "comment_text" =>"$comment_text" 
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
    function loadSpecificBuzz($arrArg = array()) {
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
        (
        b.buzz_status='0' AND 
        b.id='".$arrArg['buzz_id']."') ";
        $result = $this->executeSQLP ( $sql );
        while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
            $row2 = array ();
            $buzzId = $row ['buzz_id'];
            $row2 = $this->loadComment ( array (
                    "buzz_id" => $buzzId
            ), true );
            $row3=$this->loadLike( array (
                    "id"=>$id,
                    "buzz_id" => $buzzId
            ));
            $buzz [] = array (
                    "buzz" => $row,
                    "comment" => $row2,
                    "like"=>$row3,
            );
            $row = array ();
        }
      
        if (isset ( $buzz )) {
            return $buzz;  
        } else {
             return false;  
        }
        
    }
}
?>