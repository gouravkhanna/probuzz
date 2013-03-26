<?php
include_once 'class/dbAcess.php';
class friend extends users{
	
	function showfriend($arrArg=array()) {
		
		$ob=new DbConnection();
		$sql="select f.friend_id as id,p.first_name,p.last_name from friend f JOIN personal_profile p ";
		$sql.=" on f.friend_id=p.user_id ";
		$sql.=" where f.user_id='".$arrArg['id']."' AND f.friendship_status='1'";
		$rr=array();
		$res=$ob->executeSQL($sql);
		while($row=mysql_fetch_array($res)) {
			
			$path=$this->getProfilePic($row['id']);
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
	
}
?>;