<?php

include 'controller.controller.php';

/*
 * admin Class
 * This controller class deals with all the functionalities related to the
 * Administrator.
*/
class admin extends controller {
    
    /*
	 * Constructor of admin class calls the parent class constructor
	 * enabling admin class to use the Controller Abilities
    */
    function __construct(){
        parent::__construct();
    }
    private $type="X";
    
    /*
     * home()
     * This is the default method of the admin Controller.
     * Loads the Default View of the Admin User.
     */
    function home()
    {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("buzzin","loadBuzz",array('id'=>$_SESSION['id']));
        $this->view->loadView('midpanel/midpanel.php',$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * buzzSpam()
     * This method calls the model to load all the BUZZ which are reported as SPAM.
    */
    function buzzSpam() {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","loadBuzzSpam",array('id'=>$_SESSION['id']));
        $this->view->loadView('admin/buzzspam.php',$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * userSpam()
     * This method calls the model to load all the Users who are reported as SPAM.
    */
    function userSpam() {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","loadUserSpam",array('id'=>$_SESSION['id']));
        $this->view->loadView('admin/userspam.php',$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * review()
     * This method calls the model to load the review regarding any SPAM.
    */
    function review() {
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","loadSpamReview",array('id'=>$_SESSION['id']));
        $this->view->loadView('admin/review.php',$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * contactUs()
     * This method calls the model to load the Contact Us details of the User.
    */
    function contactUs() {
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
         $arrData=loadModel("adminstrator","loadContactUs",array('read'=>'0'));
        $this->view->loadView('admin/contactus.php',$arrData);
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * contactUsAll()
     * This method  calls the model to load all read/unread the Contact Us details of the User.
    */
    function contactUsAll() {
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $arrData=loadModel("adminstrator","loadContactUs",array(array('read'=>'1')));
        $this->view->loadView('admin/contactus.php',$arrData);
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * buzzAdminDelete()
     * This method calls the model to delete any reported SPAM.
    */
    function buzzAdminDelete() {
        echo $this->type;
       // if($this->type==2) {
            $result = loadModel ( "adminstrator", "buzzDelete", array (
                   "buzz_id" => $_REQUEST ['spam_id']
            ) );
            if ($result == true) {
               $this->updateReview("1");
                echo "Buzz Deleted";
            } else {
                echo "Please Try Again! Later";
            }
      /*  } else {
            print_r($_SESSION);
            echo "Something GOne Wrong Please Login Again".$this->type. "fff ";
        } */
    }
    
    /*
     * banUserOneDay()
     * This method calls the model to ban a User for One Whole Day.
    */
    function banUserOneDay() {
        $result = loadModel ( "adminstrator", "banUserOneDay", array (
                "spam_id" => $_REQUEST ['spam_id'],
                'spam_type'=>$_REQUEST['spam_type'],
        ) );
        if ($result == true) {
            $this->updateReview("2");
            echo "Banned User";
        } else {
            echo "Paalease Try Again! Later";
        }
    }
    
    /*
     * udpateReview()
     * This method calls the model to update the review status of any SPAM.
    */
    function updateReview($spamAction=""){
        if($spamAction=="") {
            $spamAction="0";
        }
        $result=loadModel("adminstrator", "updateReview",array (
                "spam_id" => $_REQUEST ['spam_id'],
                "spam_type"=>$_REQUEST['spam_type'],
                "spam_action"=>"$spamAction",
        ) );
        if ($result == true) {
            echo "Review Updated";
        } else {
            echo "Review NOt updated";
        }
    }
    
    /*
     * banUserOnePermanent()
     * This method calls the model to Ban the User Permanently
    */
    function banUserOnePermanent() {
        $result = loadModel ( "adminstrator", "banUserOnePermanent", array (
                "spam_id" => $_REQUEST ['spam_id'],
            ) );
        if ($result == true) {
            $this->updateReview("3");
            echo "Banned User";
        } else {
            echo "Please Try Again! Later";
        }
    }
    
    /*
     * updateFeedBack()
     * This method calls the model to update the FeedBack.
    */
    function updateFeedback() {
        $result = loadModel ( "adminstrator", "updateFeedback", array (
                "id" => $_REQUEST ['read_id'],
        ) );
        if ($result == true) {
                echo "Message Read";
        } else {
            echo "Please Try Again! Later";
        }
    }
    
    /*
     * loadAboutUs()
     * This method loads the About Us view.
    */
    function loadAboutUs() {
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
         $arrData=loadModel("users", "loadAboutUs");
        loadView("admin/aboutus.php",$arrData);
        $this->view->loadView('footer/footer.php');
        unset($_SESSION['updateAboutUs']);
    }
    
    /*
     * updateAboutUs()
     * This method calls the model to update the About us Page.
    */
    function updateAboutUs() {
        $result=loadModel("adminstrator", "updateAboutUs",array("text"=>@$_REQUEST['textbox']));
        if($result) {
            $_SESSION['updateAboutUs']="Updated Successfully";
        } else {
            $_SESSION['updateAboutUs']="Try AGlly";
        }
        header('location:'.ROOTPATH.'admin/loadAboutUs');
    }
    
    /*
     * addAdmin()
     * This method loads the Add Admin View.
    */ 
    function addAdmin() {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $this->view->loadView("admin/addAdmin.php");
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * addAdminAccount()
     * This method calls the model to add an Admin Account.
    */
    function addAdminAccount() {
        //echo "<pre>";
        //print_r($_REQUEST);
        $msg="";
        $flag=true;
        if(!$_REQUEST['user_name']) {
            $msg.="User Name Cannot Be Empty.<br/>";
            $flag=false;
        }
        if(strlen($_REQUEST['user_name'])<6) {
            $msg.="User Name Should Be Atleast 6 Characters Long.<br/>";
            $flag=false;
        }
        if(!$_REQUEST['password']) {
            $msg.="Password Cannot Be Empty.<br/>";
            $flag=false;
        }
        if($_REQUEST['current_status']!="0" && $_REQUEST['current_status']!="4") {
            $msg.="Please Select Status.<br/>";
            $flag=false;
        }
        if(strlen($_REQUEST['password'])<6) {
            $msg.="Password Length Should Be Atleast 6 Characters Long.<br/>";
            $flag=false;
        }
        if($flag) {
            loadModel("adminstrator","addAdmin",$_REQUEST);
        } else {
            echo $msg;
        }
    }
    
    /*
     * deleteAdmin()
     * This method loads the Delete Admin Account View
    */
    function deleteAdmin() {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","showAllAdmin",array("id"=>$_SESSION['id']));
        $this->view->loadView("admin/deleteAdmin.php",$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * showAllAdmin()
     * This method calls the model to fetch all the Admin Users using the Site.
    */
    function showAllAdmin() {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","showAllAdmin",array("id"=>$_SESSION['id']));
        $this->view->loadView("admin/showAllAdmin.php",$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * manageUsers()
     * This method loads the View to Manage all the Users.
    */
    function manageUsers() {
        $this->type=$_SESSION['type'];
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        
        $arrData=loadModel("adminstrator","showAllUsers",array("id"=>$_SESSION['id']));
        $this->view->loadView("admin/showAllUsers.php",$arrData);
        
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    
    /*
     * deactivateAccount()
     * This method calls the model to Deactivate an Account.
    */
    function deactivateAccount() {
        $arrData=array(
            "rowId" => $_REQUEST['rowId'],
            "status" => $_REQUEST['status']
        );
        $result=loadModel("adminstrator","deactivateAccount",$arrData);
        echo $result;
    }
    
    /*
     * activateAccount()
     * This method calls the model to Activate an Account.
    */
    function activateAccount() {
        $arrData=array(
            "rowId" => $_REQUEST['rowId'],
            "status" => $_REQUEST['status']
        );
        $result=loadModel("adminstrator","activateAccount",$arrData);
        echo $result;
    }
    
}
?>