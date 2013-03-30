<?php
include_once 'class/dbAcess.php';
class friend {
	function showfriend($arrArg=array()) {
		$ob=new DbConnection();
		$sql="select f.friend_id as id,p.first_name,p.last_name from friend f JOIN personal_profile p ";
		$sql.=" on f.friend_id=p.user_id ";
		$sql.=" where f.user_id='".$arrArg['id']."' AND f.friendship_status='1'";
		$rr=array();
		$res=$ob->executeSQL($sql);
		while($row=mysql_fetch_array($res)) {
			
			$path=$this->getProfilePic(array("id"=>$row['id']));
			$rr[]=array(
					"id"=>$row['id'],
					"first_name"=>$row['first_name'],
					"last_name"=>$row['last_name'],
					"path"=>"$path",
			);
		}
		//print_r($rr);
		if(!empty($rr)) {
			return $rr;
		}
		else {
			return false;
		}
	} 
	function fetchName($arrArg=array()) {
		
		if($arrArg) {
			$ob=new DbConnection();
			$sql="select p.first_name,p.last_name from personal_profile as p join users as u on u.user_id=p.user_id where u.user_id=".$arrArg['id'].";";
			$res=$ob->executeSQL($sql);
			$row=mysql_fetch_array($res);
			$result=@$row['first_name']." ".@$row['last_name'];
			return $result;
		} else {
			//echo "No Id Passed..";
			return false;
		}
	}
	function fetchStatus($arrArg=array()) {
		
		if($arrArg) {
			$ob=new DbConnection();
			$sql="select friendship_status as status from friend where friend_id='".$arrArg['id']."' && user_id= '".$_SESSION['id']."';";
			$res=$ob->executeSQL($sql);
			//echo $sql;
			$row=mysql_fetch_assoc($res);
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
			$sql="insert into friend (user_id,friend_id,friendship_status,friend_request_date) ";
			$sql.=" values ('".$_SESSION['id']."','".$arrArg."','2',now())";
			$result1=$ob->executeSQL($sql);
			$sql="insert into friend (user_id,friend_id,friendship_status,friend_request_date) ";
			$sql.=" values ('".$arrArg."','".$_SESSION['id']."','3',now())";
			$result2=$ob->executeSQL($sql);
			if($result1 && $result2) {
				return "Request Sent Successfully";
			}
		} 
	}
	function acceptRequest($arrArg) {
		
		if($arrArg) {
			$ob=new DbConnection();
			$sql="update friend set friendship_status='1',friend_accept_date=now() ";
			$sql.=" where user_id='".$_SESSION['id']."' AND friend_id='".$arrArg."'";
			//echo $sql;
			$result1=$ob->executeSQL($sql);
			$sql="update friend set friendship_status='1',friend_accept_date=now() ";
			$sql.=" where user_id='".$arrArg."' AND friend_id='".$_SESSION['id']."'";
			//echo $sql;
			$result2=$ob->executeSQL($sql);
			 if($result1 && $result2) {
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
			$sql="select f.user_id,p.first_name,p.last_name from personal_profile as p ";
			$sql.=" join friend as f on f.user_id=p.user_id where f.friend_id=".$arrArg['id']." and f.friendship_status=3;";
			echo $sql;
			$result=$ob->executeSQL($sql);
			$requests=array();
			while($row=mysql_fetch_assoc($result)) {
				$path=$this->getProfilePic(array("id"=>$row['user_id']));
				$requests[]=array(
					"id"=>$row['user_id'],
					"first_name"=>$row['first_name'],
					"last_name"=>$row['last_name'],
					"path"=>"$path",
				);
			}
			return $requests;
		}
	}
	function getProfilePic($arrArg=array())	{
		$ob=new DbConnection();
		$sql="select p.path from photo p join personal_profile pp where pp.user_id='";
		$sql.=$arrArg['id']."' and pp.profile_pic_id=p.id  ";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return ROOTPATH.$row['path'];
	}
	function removeFriend($arrArg) {
		if($arrArg) {
			$ob=new DbConnection();
			$sql="update friend set friendship_status='4' where user_id='".$_SESSION['id']."' AND friend_id='".$arrArg."'";
			echo $sql;
			$result1=$ob->executeSQL($sql);
			$sql="update friend set friendship_status='4' where user_id='".$arrArg."' AND friend_id='".$_SESSION['id']."'";
			$result2=$ob->executeSQL($sql);
			if($result1 && $result2) {
				return "Friend Removed.";
			}
		}
	}

}
?>;