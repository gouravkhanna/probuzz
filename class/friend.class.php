<?php
include_once 'class/dbAcess.php';
class friend extends DbConnection {
    function __construct() {
        parent::__construct ();
    }
	function showfriend($arrArg=array()) {
		
		$ob=new DbConnection();
		/* $sql="select f.friend_id as id,p.first_name,p.last_name 
		        from friend f JOIN personal_profile p ";
		$sql.=" on f.friend_id=p.user_id ";
		$sql.=" where f.user_id='".$arrArg['id']."' AND f.friendship_status='1'"; */
		$rr=array();
    		$data['tables']="friend f";
    		$data['columns']=array("f.friend_id as id","p.first_name","p.last_name");
    		$data['conditions']=array("f.user_id"=>$arrArg['id'],
    		                "f.friendship_status"=>'1'
    		        );
    		$data ['joins'] [] = array (
    		        'table' => 'personal_profile p ',
    		        'type' => 'INNER',
    		        'conditions' => array (
    		         "p.user_id" => "f.friend_id"
    		        ));
    	    $result = $this->db->select ( $data ); 
            while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
            $type=$this->getType(array("id"=>$row['id']));
			
			if($type!='1') {
				$path=loadModel("users","getProfilePic",array("id"=>$row['id']));
				$rr[]=array(
						"id"=>$row['id'],
						"first_name"=>$row['first_name'],
						"last_name"=>$row['last_name'],
						"path"=>"$path",
				);	
			}
			
		}
		if(!empty($rr)) {
			return $rr;
		}
		else {
			return false;
		}
	} 

	function fetchStatus($arrArg=array()) {
		
		if($arrArg) {
			$ob=new DbConnection();
			/* $sql="select friendship_status 
			        as status from friend
			         where friend_id='".$arrArg['id']."' && 
			                user_id= '".$_SESSION['id']."';"; */
			$data['tables']="friend f";
			$data['columns']=array("f.friendship_status as status");
			$data['conditions']=array("f.friend_id"=>$arrArg['id'],
			        "user_id"=>$_SESSION['id'],
			);
			$result = $this->db->select ( $data );
			 $row = $result->fetch ( PDO::FETCH_ASSOC ) ;
			//$res=$ob->executeSQL($sql);
			//echo $sql;
			//$row=mysql_fetch_assoc($res);
			//print_r($row);
			//echo $row['status'];
			if(!$row['status']) {
				return 0;
			}
			return $row['status'];
		}
	}
	function sendRequest($arrArg) {
		 if($arrArg) {
			$ob=new DbConnection();
			$data=array(
			        "user_id"=>$_SESSION['id'],
			        "friend_id"=>$arrArg,
			        "friendship_status"=>2,
			        "friend_request_date"=>"now()"
			        );
			//$this->db->insert($data);
			$data1=array(
			        "user_id"=>strip_tags($arrArg),
			        "friend_id"=>strip_tags($_SESSION['id']),
			        "friendship_status"=>3,
			        "friend_request_date"=>"now()"
			);
			$result1=$this->db->insert("friend",$data);
			$result2=$this->db->insert("friend",$data1);
			//$sql="insert into friend (user_id,friend_id,friendship_status,friend_request_date) ";
			//$sql.=" values ('".$_SESSION['id']."','".$arrArg."','',now())";
			//$result1=$ob->executeSQL($sql);
		/* 	$sql="insert into friend (user_id,friend_id,friendship_status,friend_request_date) ";
			$sql.=" values ('".$arrArg."','".$_SESSION['id']."','3',now())";
			$result2=$ob->executeSQL($sql); */
			if($result1 && $result2) {
				return "Request Sent Successfully";
			}
		} 
	}
	function acceptRequest($arrArg) {
		
		if($arrArg) {
			$ob=new DbConnection();
			
			/* $sql="update friend set friendship_status='1',friend_accept_date=now() ";
			$sql.=" where user_id='".$_SESSION['id']."' AND friend_id='".$arrArg."'"; */
			//echo $sql;
			$data=array(
					"friendship_status"=>"1",
					"friend_accept_date"=>"now()",
			);
			$conditions=array(
					"user_id" 	=> $_SESSION['id'],
					"friend_id" => $arrArg
			);
			$result1=$this->db->update("friend",$data,$conditions);
			/* $result1=$ob->executeSQL($sql); */
			/* 
			$sql="update friend set friendship_status='1',friend_accept_date=now() ";
			$sql.=" where user_id='".$arrArg."' AND friend_id='".$_SESSION['id']."'"; */
			//echo $sql;
			$data1=array(
					"friendship_status"=>"1",
					"friend_accept_date"=>"now()",
			);
			$conditions1=array(
					"user_id" 	=> $arrArg,
					"friend_id" => $_SESSION['id']
			);
			$result2=$this->db->update("friend",$data1,$conditions1);
			/* $result2=$ob->executeSQL($sql); */
			 if($result1 && $result2) {
				$notification_type=1;
				$friend_id=$arrArg;
				$content="";
				$this->executeSQLP("call addNotification('".
						$_SESSION['id']."','".$notification_type."','".$friend_id."',now(),'".$content."')")
				 		or die(mysql_error());
				$this->executeSQLP("call addNotification('".
						$friend_id."','".$notification_type."','".$_SESSION['id']."',now(),'".$content."')") or
					 	die(mysql_error());
				return "Friend Added.";
				
			} 
		}
	}
	function declineRequest($arrArg) {
		
		if($arrArg) {
			$ob=new DbConnection();
			$sql="delete from friend where user_id='".$_SESSION['id']."' AND friend_id='".$arrArg."'";
			$result1=$ob->executeSQL($sql);
			$sql="delete from friend where user_id='".$arrArg."' AND friend_id='".$_SESSION['id']."'";
			$result2=$ob->executeSQL($sql);
			if($result1 && $result2) {
				return "Request Declined.";
			}
		}
	}
	function showRequests($arrArg=array()) {
		
		if($arrArg) {
			$ob=new DbConnection();
	/* 		$sql="select f.user_id,p.first_name,p.last_name 
			        from personal_profile as p ";
            $sql .= " join friend as f 
			        on f.user_id=p.user_id 
			        where 
			        f.friend_id=".$arrArg['id']." and f.friendship_status=3;"; */
			//echo $sql;
			$data['tables']="friend f";
    		$data['columns']=array("f.friend_id","p.first_name","p.last_name");
    		$data['conditions']=array("f.user_id"=>$arrArg['id'],
    		                "f.friendship_status"=>'3'
    		        );
    		$data ['joins'] [] = array (
    		        'table' => 'personal_profile p ',
    		        'type' => 'INNER',
    		        'conditions' => array (
    		                "p.user_id" => "f.friend_id"
    		        ));
    	    $result = $this->db->select ( $data ); 
          
           //     $result=$ob->executeSQL($sql);
   
			$requests=array();
		//	while($row=mysql_fetch_assoc($result)) {
			while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				$path=loadModel("users","getProfilePic",array("id"=>$row['friend_id']));//$this->getProfilePic(array("id"=>$row['friend_id']));
				$requests[]=array(
					"id"=>$row['friend_id'],
					"first_name"=>$row['first_name'],
					"last_name"=>$row['last_name'],
					"path"=>"$path",
				);
			}
			return $requests;
		}
	}
	function getProfilePic($arrArg=array())	{
		//echo "hello";
		$ob=new DbConnection();
		
		$sql="select p.path from photo p join personal_profile pp where pp.user_id='";
		$sql.=$arrArg['id']."' and pp.profile_pic_id=p.id  ";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return ROOTPATH.$row['path'];
	}
	function getType($arrArg=array()) {
		if($arrArg) {
			$ob=new DbConnection();
			$data['tables']="users";
			$data['columns']=array("type");
			$data['conditions']=array("user_id"=>$arrArg['id']);
//			$sql="select type from users where user_id='".$arrArg['id']."'";
			//echo $sql;
			$result = $this->db->select ( $data );
			$row = $result->fetch ( PDO::FETCH_ASSOC );
			/* $result=$ob->executeSQL($sql);
			$row=mysql_fetch_assoc($result); */
			return $row['type'];
		}
	}
/* 	function removeFriend($arrArg) {
		if($arrArg) {
			$ob=new DbConnection();
			$sql="update friend set friendship_status='4' where user_id='".$_SESSION['id']."' AND friend_id='".$arrArg."'";
			//echo $sql;
			$result1=$ob->executeSQL($sql);
			$sql="update friend set friendship_status='4' where user_id='".$arrArg."' AND friend_id='".$_SESSION['id']."'";
			$result2=$ob->executeSQL($sql);
			if($result1 && $result2) {
				return "Friend Removed.";
			}
		}
	} */

}
?>