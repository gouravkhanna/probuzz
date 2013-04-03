<?php
include_once 'dbAcess.php';
class messaging extends DbConnection {
	function __construct() {
		parent::__construct ();
	}
	/*Display the senders*/
	function showSender($arrArgs = array()) {
		if (! empty ( $arrArgs )) {
			$id=$arrArgs['id'];
			$sql = "SELECT m.friend_id as id, m.message_time,
			first_name,last_name,path,m.seen
		FROM (
			SELECT friend_id, message_time,first_name,last_name,path,seen
			FROM message
        		JOIN personal_profile
        		on
         			message.friend_id=personal_profile.user_id
         		JOIN photo
        		on
        			personal_profile.profile_pic_id=photo.id
			WHERE 
				( message.user_id ='$id' OR message.friend_id='$id' )
			ORDER BY  `message_time` DESC
     		)
		as m
		group by m.friend_id
		ORDER BY  `message_time` DESC ";
			$result = $this->executeSQLP ( $sql );
			if ($result) {
				while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				}
				if (! empty ( $row )) {
					return $row;
				} else {
					return false;
				}
			}
		}
	}
	/*Display the 10 messages to user*/
	function showMessage($arrArgs = array()) {
		$friendId=$arrArgs['friend_id'];
		$id=$arrArgs['id'];
			
		if (! empty ( $arrArgs ) && $friendId!='-1') {
			$sql="	select m.user_id as id,m.friend_id,m.message,
				  	p.first_name,p.last_name,photo.path,
				  	 UNIX_TIMESTAMP(m.message_time) as message_time 
				  	from message m
				 	join personal_profile p
						on
						m.user_id=p.user_id
					join photo
						on photo.id=p.profile_pic_id
					where
					type='0' AND
					(	
						( m.user_id='$id' AND m.friend_id='$friendId' )
						OR
						( m.user_id='$friendId' AND m.friend_id='$id' )
					)
					
					order by m.message_time desc
					limit 0,10";
			$result = $this->executeSQLP ( $sql );
			if ($result) {
				while ( $row [] = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				}
				$_SESSION['friend_idm']=$friendId;
				if (! empty ( $row )) {
					return $row;
				} else {
					return false;
				}
			}
			
		}
	}
	/*Create a new MEssage*/
	function insertMessage($arrArgs = array()) {
		if (! empty ( $arrArgs )) {
			$message_text=$arrArgs['message_text'];
			$id=$arrArgs['id'];
			$friendId=$arrArgs['friend_id'];
			$data=array(
					"user_id"=>"$id",
					"friend_id"=>"$friendId",
					"message"=>"$message_text",
					"type"=>'0'
					);
			$result=$this->db->insert("message",$data);
			$data1=array(
					"user_id"=>"$friendId",
					"friend_id"=>"$id",
					"message"=>"$message_text",
					"type"=>'1'
			);
			$result1=$this->db->insert("message",$data1);
			if($result && $result->rowCount()>0) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	/*Update Message to Seen*/
	function messageSeen($arrArgs = array()) {
		if (! empty ( $arrArgs )) {
			$id=$arrArgs['id'];
			$friendId=$arrArgs['friend_id'];
			$data=array(
					"seen"=>"1"
					);
			$conditions=array(
					"user_id"=>$id,
					"friend_id"=>$friendId,
					);
			$this->db->update("message",$data,$conditions);
		}
	}
	
		
}