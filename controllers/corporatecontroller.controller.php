	<?php
include 'controller.controller.php';
class corporatecontroller extends controller {
    function __construct() {
        parent::__construct ();
    }
    /* Will load home when user Login */
    function loadNavigation() {
        $arrData = array (
                'id' => $_SESSION ['id'] 
        );
        $this->view->loadView ( 'head/head1.php' );
        $arrArgs = loadModel ( "corporate", "fetchName", $arrData );
        $arrArgs ["profile_pic_path"] = loadModel ( "users", "getProfilePic", $arrData );
        loadView ( "navigation/corpnavigation.php", $arrArgs );
    }
    function home() {
        $this->loadNavigation ();
        loadView ( "head/head2.php" );
        loadView ( 'midpanel/midpanel.php' );
        loadView ( 'rightpanel/rightpanel1.php' );
        loadView ( 'rightpanel/rightpanel2.php' );
        loadView ( 'footer/footer.php' );
    }
    function cprofile() {
        $this->loadNavigation ();
        loadView ( "head/head2.php" );
        $arrData = loadModel ( 'corporate', "getProfile", array (
                "id" => @$_SESSION ['id'] 
        ) );
        loadView ( 'profile/editCorporateProfile.php', $arrData );
        loadView ( 'rightpanel/rightpanel.php' );
        loadView ( 'footer/footer.php' );
    }
    function createjobs() {
        $this->loadNavigation ();
        loadView ( "head/head2.php" );
        // $arrData=loadModel("corporate","showSlot",array('id'=>$_SESSION['id']));
        loadView ( 'gdata/prejob.php' ); // ,$arrData);
        loadView ( 'rightpanel/alotslot.php' );
        loadView ( 'rightpanel/rightpanel2.php' );
        loadView ( 'footer/footer.php' );
        unset($_SESSION['alotslot']);
        unset($_SESSION['updatejob']);
    }
    /* Create Jobs TAB */
/* Will create a New Job Slot... */
function alotSlot() {
        $arrArgs = array (
                'id' => @$_SESSION ['id'],
                'designation' => $_REQUEST ['designation'] 
        );
        if (@$_REQUEST ['terms'] == true) {
            $result = loadModel ( "corporate", "alotSlot", $arrArgs );
            if ($result) {
                $_SESSION['alotslot']="Alotted Slot";
            } else {
                $_SESSION['alotslot']="Failed to create a Slot! Try again";
            }
        }
        header ( "location:index.php?url=createjobs" );
    }
    /* (ajax) Will load all the jobs posted by the User */
    function showAllJobs() {
        $arrData = loadModel ( "corporate", "showSlot", array (
                'id' => $_SESSION ['id'] 
        ) );
        loadView ( "gdata/showallslot.php", $arrData );
    }
    
    /* Show form to update the JOb details! */
    function showUpdateSlot() {
        $this->loadNavigation ();
        loadView ( "head/head2.php" );
        $arrData = loadModel ( "corporate", "showSlot", array (
                'id' => $_SESSION ['id'],
                'jobId' => $_REQUEST ['jobId'] 
        ) );
        // $arrData=array('type'=>$_REQUEST['jobId']);
        loadView ( "gdata/jobs.php", $arrData );
        loadView ( 'rightpanel/alotSlot.php' );
        loadView ( 'rightpanel/rightpanel2.php' );
        loadView ( 'footer/footer.php' );
    }
    /* Will update all the Job details! */
    function updateSlot() {
        $msg="";
        $flag=true;
        if(!$_REQUEST['designation']) {
            $msg.="*Designation Can't Be Empty.<br/>";
            $flag=false;
        }
        if(!$_REQUEST['start_date']) {
            $msg.="*Start Date Can't Be Empty.<br/>";
            $flag=false;
        }
        if(!$_REQUEST['last_date']) {
            $msg.="*Last Date Can't Be Empty.<br/>";
            $flag=false;
        }
        if($_REQUEST['start_date'] && $_REQUEST['last_date']) {
            //$start=$_REQUEST['start_date'];
            //$end=$_REQUEST['last_date'];
            $tempflag=true;
            /*    date format regular expression for yyyy-mm-dd    */
            $reg="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
            
            if(!preg_match($reg,$_REQUEST['start_date'])) {
                $msg.="*Invalid Date Format For Start Date.<br/>";
                $flag=false;
                $tempflag=false;
            }
            if(!preg_match($reg,$_REQUEST['last_date'])) {
                $msg.="*Invalid Date Format For End Date.<br/>";
                $flag=false;
                $tempflag=false;
            }
            if($tempflag) {
                $start = DateTime::createFromFormat('Y-m-d', $_REQUEST['start_date']);
                $end = DateTime::createFromFormat('Y-m-d',$_REQUEST['last_date'] );
                $interval = $start->diff($end);
                if($interval->format('%R%d')<0) {
                    $flag=false;
                    $msg.="*Start Date Can't Be Less Than End Date ";
                }
            }
        }
        if(!$flag) {
            $_SESSION['error']=$msg;
            header("location:".ROOTPATH."index.php?jobId=".$_REQUEST['jobId']."&url=showUpdateSlot");
        } else {
            foreach ( $_REQUEST as $key => $value ) {
                if ($key != "controller" && $key != "url" && $key != "submit" && $key != "PHPSESSID")
                    $arrArg [$key] = $value;
                
            }
            $res = loadModel ( "corporate", "updateSlot", $arrArg );
            if ($res = true) {
                unset($_SESSION['error']);
                $_SESSION['updatejob']="Updated Sucessfully";
                header("location:".ROOTPATH."createjobs");
            } else {
                echo "Error";
            }
        }
    }
    /* Will update the status of the JOb Active or Inactive */
    function updateStatusJob() {
        // $status=@$_REQUEST['status']=="active"?0:1;
        $arrArgs = array (
                'status' => @$_REQUEST ['status'],
                'jobId' => @$_REQUEST ['jobId'] 
        );
        $res = loadModel ( "corporate", "updateStatusJob", $arrArgs );
        if ($res == true) {
            echo "updated Status";
        } else {
            echo "Error";
        }
    }
    /* ShowJObs Tab */
    function showJobs() {
      $this->loadNavigation();
        loadView ( "head/head2.php" );
        $arrData = loadModel ( "corporate", "showSlot", array (
                'id' => $_SESSION ['id'] 
        ) );
        loadView ( 'gdata/showjobs.php', $arrData );
        loadView ( 'rightpanel/rightpanel1.php' );
        loadView ( 'rightpanel/rightpanel2.php' );
        loadView ( 'footer/footer.php' );
    }
    /*
     * (ajax)will be loaded when user click on particular Job And show the
     * Specific Details of the Job Based on JobId
     */
    function showSpecficJob() {
        $requestType = "";
        if (@$_REQUEST ['request_type'] == "user") {
            $requestType = "user";
        }
        
        $arrArgs = array (
                'id' => @$_SESSION ['id'],
                'jobId' => $_REQUEST ['jobId'],
                'requestType' => "$requestType" 
        );
        $arrData1 = loadModel ( "corporate", "showSlot", $arrArgs );
        loadView ( "gdata/showSpecificJob.php", $arrData1 );
    }
    /* Show the applicant for the job */
    function showApplicant() {
        $this->loadNavigation();
        loadView ( "head/head2.php" );
        $arrData = loadModel ( "corporate", "showSlot", array (
                'id' => $_SESSION ['id'] 
        ) );
        loadView ( 'displayapplicant.php', $arrData );
        $this->getAppStats ();
        loadView ( 'footer/footer.php' );
    }
    /* Get the stats of company or particular application */
    function getAppStats() {
        $arrData = loadModel ( "corporate", "getAppStats", array (
                'id' => $_SESSION ['id'] 
        ) );
        loadView ( 'rightpanel/appstats.php', $arrData );
    }
    /* Get the applicant lists */
    function getApplicant() {
        $arrData = loadModel ( "corporate", "getApplicant", array (
                'jobId' => $_REQUEST ['jobId'] 
        ) );
        loadView ( "getapplicant.php", $arrData );
    }
    /* Search for the people with required qualification,City,Gender */
    function searchPeople() {
        // fetching valued from url
        $city = @$_REQUEST ['spcity'];
        $degree = @$_REQUEST ['spdegree'];
        $gender = @$_REQUEST ['spgender'];
        $otherDegree = @$_REQUEST ['spcdegreeother'];
        $otherCity = @$_REQUEST ['spccityother'];
        
        // checking whether if any other city are specified or not
        if ($otherCity != "") {
            $otherCityArray = explode ( ",", $otherCity );
            // checking if only other city are specified and value from select
            // box is not choosen
            if (! is_array ( $city )) {
                $city = array ();
            }
            $city = array_merge ( $city, $otherCityArray );
        }
        // checking whether if any other degree are specified or not
        if ($otherDegree != "") {
            $otherDegreeArray = explode ( ",", $otherDegree );
            // checking if only other city are specified and value from select
            // box is not choosen
            if (! is_array ( $degree )) {
                $degree = array ();
            }
            $degree = array_merge ( $degree, $otherDegreeArray );
        }
        
        // loading page content
       $this->loadNavigation();
        // checking if request for search is made or not
        if (isset ( $_REQUEST ['search'] ) || @$_REQUEST ['search'] != "") {
            $arrArgs = array (
                    "city" => $city,
                    "degree" => $degree,
                    "gender" => $gender 
            );
            // passing data to model
            $arrData = loadModel ( "corporate", "searchPeople", $arrArgs );
            if ($arrData) {
                loadView ( 'search/searchpeople.php', $arrData );
            } else {
                loadView ( 'search/searchpeople.php' );
                echo NRF;
            }
        } else {
            loadView ( 'search/searchpeople.php' );
        }
        
        loadView ( 'footer/footer.php' );
    }
    /*For other user to view Corporate profile*/
    function showProfile() {
        if ($_REQUEST ['corpId'] != $_SESSION ['id']) {
             $arrData = array (
                    'id' => $_REQUEST ['corpId'] ,
                     'user_id'=>@$_SESSION['id'],
            );
            $this->view->loadView ( 'head/head1.php' );
            $path = loadModel ( "users", "getProfilePic", $arrData );
            $arrArgs = loadModel ( "corporate", "fetchName", $arrData );
            $arrArgs ["profile_pic_path"] = $path;
            $arrArgs ["id"] = $_REQUEST ['corpId'];
            
            $arrArgs['substatus']=loadModel("subscription","checkSubscriptionStatus",$arrData);
            $arrArgs['subscibers']=loadModel("corporate","countSubscriber",$_REQUEST['corpId']);
            loadView ( "navigation/viewercorpnavigation.php", $arrArgs );
            $arrArg = loadModel ( 'corporate', "getProfile", $arrData);
            loadView ( "profile/displayCorporateProfile.php",$arrArg  );
                   } else {
            header ( "Location: http://localhost/probuzz/trunk/index.php" );
        }
    }
    /*For other user to view Corporate Jobs*/
    function displayJob() {
        if ($_REQUEST ['corpId'] != $_SESSION ['id']) {
            $arrData = array (
                    'id' => $_REQUEST ['corpId'] ,
                    'user_id'=>@$_SESSION['id'],
            );
            $this->view->loadView ( 'head/head1.php' );
            $path = loadModel ( "users", "getProfilePic", $arrData );
            $arrArgs = loadModel ( "corporate", "fetchName", $arrData );
            $arrArgs ["profile_pic_path"] = $path;
            $arrArgs ["id"] = $_REQUEST ['corpId'];
            //subscription status
            $arrArgs['substatus']=loadModel("subscription","checkSubscriptionStatus",$arrData);
            //no of subscriber
            $arrArgs['subscibers']=loadModel("corporate","countSubscriber",$_REQUEST['corpId']);
            loadView ( "navigation/viewercorpnavigation.php", $arrArgs );
            $arrData=loadModel("corporate","getJobs",$arrArgs);
            loadView ("displayjob.php",$arrData);
        } else {
            header ( "Location: http://localhost/probuzz/trunk/index.php" );
        }
    }
}