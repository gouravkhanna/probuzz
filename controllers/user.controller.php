<?php

include 'controller.controller.php';
class user extends controller {
    function showSearchJobs() {
        /*
         * echo "<pre>"; print_r($_REQUEST);
         */
        $designation = @$_REQUEST ['sjdesignation'];
        $minSal = @$_REQUEST ['sjminsal'];
        $maxSal = @$_REQUEST ['sjmaxsal'];
        $experiance = @$_REQUEST ['sjexp'];
        $City = @$_REQUEST ['sjclocation'];
        $company = @$_REQUEST ['sjcompany'];
        // checking whether if any other city are specified or not
        $CityArray = array ();
        if ($City != "") {
            $CityArray = explode ( ",", $City );
        }
        $arrArgs = array (
                'designation' => $designation,
                'minsal' => $minSal,
                'maxsal' => $maxSal,
                'experiance' => $experiance,
                'location' => $CityArray,
                'experiance' => $experiance 
        );
        $arrData = loadModel ( "users", "showSearchJobs", $arrArgs );
        loadView ( "search/displaysearchjob.php", $arrData );
    }
    function searchJob() {
        /*
         * echo "<br><br><br><br>"; echo "<pre>"; print_r($_REQUEST); echo
         * "</pre>";
         */
        // loading page content
        loadView ( "head/head1.php" );
        $path = loadModel ( "users", "getProfilePic", array (
                'id' => $_SESSION ['id'] 
        ) );
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView ( "navigation/usernavigation.php", array (
                'profile_pic_path' => $path,
                "user_name" => $userName
        ) );
        // checking if request for search is made or not
        loadView ( 'search/searchjob.php' );
        loadView ( 'footer/footer.php' );
    }
    function loadAppStatus() {
        $result = loadModel ( "users", "getJobAppStatus", array (
                'id' => $_SESSION ['id'],
                'jobId' => $_REQUEST ['jobId'] 
        ) );
        loadView ( "appstatus.php", array (
                'status' => $result,
                'jobid' => $_REQUEST ['jobId'] 
        ) );
    }
    /* SHow all the Jobs Applied */
    function displayApplication() {
        loadView ( "head/head1.php" );
        $path = loadModel ( "users", "getProfilePic", array (
                'id' => $_SESSION ['id'] 
        ) );
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView ( "navigation/usernavigation.php", array (
                'profile_pic_path' => $path,
                "user_name" => $userName
        ) );
        $arrData = loadModel ( "users", "displayApplication", array (
                'id' => $_SESSION ['id'] 
        ) );
        loadView ( "displayapplication.php", $arrData );
    }
    function applyJob() {
        $result = loadModel ( "users", "applyJob", array (
                'id' => $_SESSION ['id'],
                'jobId' => $_REQUEST ['jobId'] 
        ) );
        if ($result) {
            echo "Applied Succesfully ";
        } else {
            echo "Error!! Please Try Again Later";
        }
    }
    function messages() {
        loadView ( "head/head1.php" );
        $path = loadModel ( "users", "getProfilePic", array (
                'id' => $_SESSION ['id']
        ) );
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView ( "navigation/usernavigation.php", array (
        'profile_pic_path' => $path,
        "user_name" => $userName
        ) );
        loadView ( "message/message.php" );
        loadView ( "footer/footer.php" );
    }
    function getMessageFriendId() {
        $para = explode ( '/', $_REQUEST ['url'] );
        print_r ( $para );
        if (isset ( $para [2] ) && $para [2] != " ") {
            return base64_decode ( $para [2] );
        } else {
            return "-1";
        }
    }
    function showSender() {
        $arrData = loadModel ( "messaging", "showSender", array (
                "id" => @$_SESSION ['id'] 
        ) );
        loadView ( "message/showsender.php", $arrData );
    }
    function getMessage() {
        $friendId = $_REQUEST ['friend_id'];
        
        $arrData = loadModel ( "messaging", "showMessage", array (
                "id" => @$_SESSION ['id'],
                "friend_id" => $friendId 
        ) );
        loadView ( "message/getmessage.php", $arrData );
    }
    function insertMessage() {
        // print_r($_REQUEST);
        $message_text = $_REQUEST ['message_text'];
        $friendId = $_REQUEST ['friend_id'];
        $arrArg = array (
                "id" => @$_SESSION ['id'],
                "friend_id" => $friendId,
                "message_text" => "$message_text" 
        );
        $result = loadModel ( "messaging", "insertMessage", $arrArg );
        if ($result) {
            echo "yes";
        } else {
            echo "no";
        }
    }
    function messageSeen() {
        $friendId = $_REQUEST ['friend_id'];
        $arrArg = array (
                "id" => @$_SESSION ['id'],
                "friend_id" => $friendId 
        );
        $result = loadModel ( "messaging", "messageSeen", $arrArg );
    }
    function createMessage() {
    	loadView("head/head1.php");
    	$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
    	loadView("message/createmessage.php");
    	loadView('footer/footer.php');
    }
  
    function loadc() {
    	$arrData=loadModel("friend","showfriend",array("id"=>@$_SESSION['id']));
	    foreach ($arrData as $key) {
  		  	$row['value']=$key['first_name']." ".$key['last_name'];
  		  	$row['id']=$key['id'];
    		$row['path']=$key['path'];
    	
    		$row_set[] = $row;
    	   }
    	
    	echo json_encode($row_set);
    	
    }
    
    /*load the Setting for the user*/
    function settings() {
        loadView('head/head1.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
        loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
        $this->loadHeadUser();
        loadView('userSettings.php');
        loadView('rightpanel/rightpanel.php');
        loadView('footer/footer.php');
    }
    function changePassword() {
        $msg="";
        $flag=true;
        if(!$_REQUEST['old_password']) {
            $msg.="Old Password Cannot Be Empty.<br/>";
            $flag=false;
        }
        if(!$_REQUEST['new_password']) {
            $msg.="New Password Cannot Be Empty.<br/>";
            $flag=false;
        }
        if(!$_REQUEST['new_password_confirm']) {
            $msg.="Confirmation Password For New Password Cannot Be Empty.<br/>";
            $flag=false;
        }
        if(strlen($_REQUEST['new_password'])<6) {
            $msg.="Password Length Should Be Atleast 6 Characters Long.<br/>";
            $flag=false;
        }
        if($_REQUEST['new_password_confirm']!=$_REQUEST['new_password']) {
            $msg.="Confirmation Password Does Not Match The Typed In New Password.<br/>";
            $flag=false;
        }
        if($flag) {
            $result=loadModel("users","changePassword");
            echo $result;
        } else {
            echo $msg;    
        }
        
    }
    function deactivateAccount() {
        echo "<script> alert('You Can Reactivate Your Account By Logging ".
        "In Using The Same User Id And Password');</script>";
        $result=loadModel("users","deactivateAccount");
        if($result) {
            unset($_SESSION['id']);
            echo "<script>alert('Account Successfully Deactivated. Hope To See You Again..');".
            "window.location.href='".ROOTPATH."index.php'; </script>";
        } else {
            echo "<script>alert('Error Occured While Performing Required Task.');".
            "window.location.href='".ROOTPATH."index.php?controller=user&url=settings';</script>";
        }
    }
    function setupSecurityQuestion() {
        $msg="";
        $flag=true;
        if(!$_REQUEST['securityQuestion']) {
            $msg.="Security Question Cannot Be Empty.<br/>";
            $flag=false;
        }
        if(!$_REQUEST['securityAnswer']) {
            $msg.="Answer Cannot Be Empty.<br/>";
            $flag=false;
        }
        if($flag) {
            $result=loadModel("users","setupSecurityQuestion");
            echo $result;
        } else {
            echo $msg;
        }
    }
    function fetchSecurityQuestions() {
        loadModel("users","fetchSecurityQuestions");
    }
    function markUserSpam() {
        echo "!";
        $result = loadModel ( "users", "markUserSpam", array (
                "id" => @$_SESSION ['id'],
                "spam_id" => $_REQUEST ['spam_id']
        ) );
        if ("spam"==$result) {
            echo "Already Marked Spam By You";
        } else if($result == "newspam") {
            echo "Marked Spam";
        } else {
            echo "Please Try Again! Later";
        }
    }
    function forgotPasswordEmail() {
        $arrArgs=array(
                "userName"=>@$_REQUEST['userName'],
                "email"=>@$_REQUEST['email'],
                );
        $result=loadModel("users","forgotPasswordEmail",$arrArgs);
        print_r($_REQUEST);
        echo "hello";
        //echo $result;
    }

}

?>