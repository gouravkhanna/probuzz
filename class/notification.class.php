<?php
	include_once 'class/dbAcess.php';
	class notification extends DbConnection {
		function fetchNotifications() {
			$ob=new DbConnection();
			$sql="select n.user_id,n.notification_type,n.friend_id,unix_timestamp(n.notification_time) as notification_time,n.content ";
			$sql.=" from notifications as n join friend as f on n.user_id=f.friend_id where ";
			$sql.=" f.user_id=".$_SESSION['id']." and f.friendship_status='1' order by n.notification_time desc limit 20;";
			//echo $sql;
			$notifications=array();
			$result=$ob->executeSQL($sql);
			while($row=mysql_fetch_assoc($result)) {
				$user_name=$this->getUserName($row['user_id']);
				$row['user_name']=$user_name;
				if($row['notification_type']!="0") {
					$friend_name=$this->getUserName($row['friend_id']);
					$row['friend_name']=$friend_name;
				}
				
				$notifications[]=$row;
			}
			return $notifications;
		}
		function getUserName($userId="") 	{
			if($userId!="") {
				$data['tables']	= 'users';
				$data['columns']= array('users.user_name');
				$data['conditions']=array("users.user_id"=>"$userId");
				$result=$this->db->select($data);
				$row = $result->fetch(PDO::FETCH_ASSOC);
				return $row['user_name'];
				}
		}
	}
?>