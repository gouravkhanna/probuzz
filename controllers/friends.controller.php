

<?php
include 'controller.controller.php';
class friends extends Controller
{
	function __construct() 	{
		parent::__construct();
	}
	function home()
	{
		echo "Home";
	}
	function request()
	{
		echo "ALL requests Aree :D :P";
	}
	function friendsProfile () {
		$this->view->loadView('head/head1.php');
		$path=loadModel("users","getProfilePic",array('id'=>$_REQUEST['friendId']));
		$friendName=loadModel("friend","fetchName",array('id'=>$_REQUEST['friendId']));
		loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$_REQUEST['friendId']));
		$this->view->loadView('head/head2.php');
		$this->view->loadView('midpanel/midpanel.php');
		$this->view->loadView('rightpanel/rightpanel1.php');
		$this->view->loadView('footer/footer.php');
	}
	function showfriend() {
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		}
		else {
			$id=$_SESSION['id'];
		}
		loadView('head/head1.php');
		$path=loadModel("users","getProfilePic",array('id'=>$id));
		$friendName=loadModel("friend","fetchName",array('id'=>$id));
		loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$id));
		$arrData=loadModel("friend","showfriend",array("id"=>$id));
		loadView("showfriend.php",$arrData);
		loadView("footer/footer.php",$arrData);
	}
 	function professionalProfile() {
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		}
		else {
			$id=$_SESSION['id'];
		}
		loadView('head/head1.php');
		$path=loadModel("users","getProfilePic",array('id'=>$id));
		$friendName=loadModel("friend","fetchName",array('id'=>$id));
		loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$id));
		//$arr=loadModel("friend","constructFields");
		$arrArg=loadModel("professionalprofile","retrieveData",$id);
		$this->view->loadView('friendProProfile.php',$arrArg);
		loadView('footer/footer.php');
		
	} 
	
}
?>