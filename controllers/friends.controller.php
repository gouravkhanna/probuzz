<?php
include 'controller.controller.php';
class friends extends Controller
{
	function __construct() 	{
		parent::__construct();
	}
	/*Load Home*/
	function home()
	{
		echo "Home";
	}
	function request()
	{
		echo "ALL requests Aree :D :P";
	}
	/*Load Friend profile*/
	function friendsProfile () {
		
		$type=loadModel("friend","getType",array("id"=>$_REQUEST['friendId']));
		
		if($_REQUEST['friendId']!=$_SESSION['id'] && $type!='1') {
			$arrData=array('id'=>$_REQUEST['friendId']);
			$this->view->loadView('head/head1.php');
			$path=loadModel("friend","getProfilePic",$arrData);
			$friendName=loadModel("users","fetchName",$arrData);
			loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$_REQUEST['friendId']));
			 $path=loadModel("users","getHeaderPic",array("id"=>$_REQUEST['friendId']));
            if($path=="http://localhost/probuzz/trunk/data/photo/g.jpg") {
                $path="";
            }
            loadView('head/head2.php',$path);
			$arrData1=loadModel("buzzin","loadBuzz",array('id'=>$_REQUEST['friendId']));
			$this->view->loadView('midpanel/buzzdisplay.php',$arrData1);
			$status=loadModel("friend","fetchStatus",$arrData);
			$arrArgs=array("status"=>$status,"friendId"=>$_REQUEST['friendId']);
			$this->view->loadView('rightpanel/rightpanel1.php',$arrArgs);
			$this->view->loadView('footer/footer.php');	

		} else {
			header("Location: http://localhost/probuzz/trunk/index.php");
		}
		
	}
	/*Show all the friends of a user */
	function showfriend() {
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		}
		else {
			$id=$_SESSION['id'];
		}
		$arrData=array('id'=>$id);
		loadView('head/head1.php');
		$path=loadModel("friend","getProfilePic",$arrData);
		$friendName=loadModel("users","fetchName",$arrData);
		if($id==$_SESSION['id']) {
			$userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
			loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
		} else {
			loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$id));	
		}
		
		$arrData=loadModel("friend","showfriend",$arrData);
		loadView("showfriend.php",$arrData);
		loadView("footer/footer.php",$arrData);
	}
	/*Load the professional profile of a friend*/
 	function professionalProfile() {
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		}
		else {
			$id=$_SESSION['id'];
		}
		$arrData=array('id'=>$id);
		loadView('head/head1.php');
		$path=loadModel("friend","getProfilePic",$arrData);
		$friendName=loadModel("users","fetchName",$arrData);
		loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$id));
		$arrArg=loadModel("professionalprofile","retrieveData",$id);
		$this->view->loadView('friendProProfile.php',$arrArg);
		loadView('footer/footer.php');
		
	}
	/*Load Personal profile of a friend*/
	function personalProfile(){

		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		}
		else {
			$id=$_SESSION['id'];
		}
		$arrData=array('id'=>$id);
		loadView('head/head1.php');
		$path=loadModel("friend","getProfilePic",$arrData);
		$friendName=loadModel("users","fetchName",$arrData);
	    loadView("navigation/friendNavigation.php",
				array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$id));
        $arrArgs=loadModel("personalprofile","loadProfile",array("id"=>$id));
       // print_r($arrArgs);
        $this->view->loadView('midpanel/friendsocialprofile.php',$arrArgs);
       loadView('footer/footer.php');

	}
	/*Send Request to a friend*/
	function sendRequest() {
		$friendId=$_REQUEST['friendId'];
		$result=loadModel("friend","sendRequest",$friendId);
		//echo $result;
	}
	/*Accept the request from a friend*/
	function acceptRequest() {
		$friendId=$_REQUEST['friendId'];
		$result=loadModel("friend","acceptRequest",$friendId);
		//echo $result;
	}
	/*Decline the friend request*/
	function declineRequest() {
		$friendId=$_REQUEST['friendId'];
		$result=loadModel("friend","declineRequest",$friendId);
		//echo $result;
	}
	/*Show all the friend request*/
	function showRequests() {
		$arrData=array('id'=>$_SESSION['id']);
		loadView("head/head1.php");
		$path=loadModel("friend","getProfilePic",$arrData);
		$userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
		loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
		$data=loadModel("friend","showRequests",$arrData);
		$this->view->loadView('showFriendRequests.php',$data);
		loadView('footer/footer.php');

	}
	/*Remove Friend form profile*/
	function removeFriend() {
		$friendId=$_REQUEST['friendId'];
		$result=loadModel("friend","declineRequest",$friendId);
	}
	/*Display friend photo*/
	function friendPhoto(){
	   if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		}
		else {
			$id=$_SESSION['id'];
		}
		$arrData=array('id'=>$id);
		loadView('head/head1.php');
		$path=loadModel("friend","getProfilePic",$arrData);
		$friendName=loadModel("users","fetchName",$arrData);
		loadView("navigation/friendNavigation.php",array('profile_pic_path' =>$path,'friend_name'=>$friendName,'id'=>$id));
		$arrData=loadModel("photos", "loadPhoto",array("id"=>$id));
	    loadView("photo/gallery.php",$arrData);
	    loadView("footer/footer.php");
	}
}
?>