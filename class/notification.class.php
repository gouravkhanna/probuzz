<?php
include_once 'class/dbAcess.php';

/*
 * adminstrator class
 * This class is the model class performing all the Admin Functionality.
*/
class notification extends DbConnection {
	
	/*
	 * constructor of the adminstrator class calls the parents constructor
	 * and thus enabling the class to perform database connectivity.
	*/
	function __construct() {
		parent::__construct ();
	}
	
	/*
	 * fetchNotifications()
	 * This method fetches all the Notifications corresponding to the Logged In User.
	*/
    function fetchNotifications() {
        $ob = new DbConnection ();
        $sql = "select n.user_id,n.notification_type,n.friend_id,
                unix_timestamp(n.notification_time) as notification_time,n.content ";
        $sql .= " from notifications as n join friend as f on n.user_id=f.friend_id where ";
        $sql .= " f.user_id=" . $_SESSION ['id'] . " and 
                 f.friendship_status='1' and notification_type <> '5' order by n.notification_time desc limit 40;";
        $notifications = array ();
        $result = $ob->executeSQL ( $sql );
        while ( $row = mysql_fetch_assoc ( $result ) ) {
            $user_name = loadModel ( "users", "fetchName", array (
                    "id" => $row ['user_id'] 
            ) );
            $user_pic = loadModel ( "users", "getProfilePic", array (
                    "id" => $row ['user_id'] 
            ) );
            $row ['user_pic'] = $user_pic;
            $row ['user_name'] = $user_name;
            if ($row ['notification_type'] != "0") {
                $friend_pic = loadModel ( "users", "getProfilePic", array (
                        "id" => $row ['friend_id'] 
                ) );
                $friend_name = loadModel ( "users", "fetchName", array (
                        "id" => $row ['friend_id'] 
                ) );
                $row ['friend_name'] = $friend_name;
                $row ['friend_pic'] = $friend_pic;
            }
		    $notifications [] = $row;
        }
			
		$sql="";
		$sql.="select count(friend_id) as count,user_id,notification_type,friend_id,"
                ."unix_timestamp(notification_time) as notification_time ,content from notifications where "
				."user_id='".$_SESSION['id']."' and notification_type='5' group by friend_id";
		
		$result = $ob->executeSQL ( $sql );
		while($row=mysql_fetch_assoc($result)) {
			$friend_pic = loadModel ( "users", "getProfilePic", array (
					"id" => $row ['friend_id'] 
			) );
			$friend_name = loadModel ( "users", "fetchName", array (
					"id" => $row ['friend_id'] 
			) );
            $row ['friend_name'] = $friend_name;
            $row ['friend_pic'] = $friend_pic;
        	$notifications [] = $row;
		}
		
        return $notifications;
    }

}
?>