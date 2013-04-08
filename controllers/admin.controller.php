<?php

include 'controller.controller.php';
class admin extends controller {
    function __construct(){
        parent::__construct();
    }
    private $type="X";
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
    function contactUs() {
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","loadContactUs",array('read'=>'0'));
        $this->view->loadView('admin/contactus.php',$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
    function contactUsAll() {
        $this->view->loadView('head/headadmin.php');
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
        loadView("navigation/adminnavigation.php",array('profile_pic_path' =>$path));
        $this->view->loadView('head/head2.php');
        $arrData=loadModel("adminstrator","loadContactUs",array(array('read'=>'1')));
        $this->view->loadView('admin/contactus.php',$arrData);
        $this->view->loadView('rightpanel/rightpanel.php');
        $this->view->loadView('footer/footer.php');
    }
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
    
    
}
?>