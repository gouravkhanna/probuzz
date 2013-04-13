<?PHP
include 'controller.controller.php';
class status extends Controller {
    function __construct() {
        parent::__construct ();
    }
    /*Load the specific buzz in seprate page and link*/
    function buzz() {
        
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	    $userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
	    loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
	    $this->loadHeadUser();

	    $url=explode("/",$_REQUEST['url']);
        $arrArgs = array (
                "id" => $_SESSION ["id"], 
                "buzz_id"=>base64_decode($url[2]),
               );
           echo "<div id=midpanel>";
           $arrData = loadmodel ( "buzzin", "loadSpecificBuzz", $arrArgs );
           loadView ( "midpanel/buzzdisplay.php", $arrData );
           echo "</div>";
           loadView ( "rightpanel/rightpanel.php");
           loadView ( "footer/footer.php");
    }
    /*Delete the buzz*/
    function buzzDelete() {
        $result = loadModel ( "buzzin", "buzzDelete", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'] 
        ) );
        if ($result == true) {
            echo "Buzz Deleted";
        } else {
            echo "Please Try Again! Later";
        }
    }
    /*Delete the COmments*/
    function commentDelete() {
        $result = loadModel ( "buzzin", "commentDelete", array (
                "id" => @$_SESSION ['id'],
                "comment_id" => $_REQUEST ['comment_id'],
        ) );
        if ($result = true) {
            echo "Comment Deleted";
        } else {
            echo "Please Try Again! Later";
       }
    }
    /*let use like the buzz*/
    function buzzLike() {
        $result = loadModel ( "buzzin", "buzzLike", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'],
        ) );
        
        $result2=loadModel ( "buzzin", "loadLike", array (
                    "id" => @$_SESSION ['id'],
                    "buzz_id" => $_REQUEST ['buzz_id'],
                    ));
        if ($result == true) {
            echo "You & ".($result2['total_like']-1)." people like this";
        } else {
            echo "Please Try Again! Later";
        }
    }
    /*Let user unlike the buzz*/
    function buzzUnLike() {
        $result = loadModel ( "buzzin", "unLike", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'],
        ) );
       
        $result2=loadModel ( "buzzin", "loadLike", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'],
        ));
        if ($result = true) {
            echo "".$result2['total_like']." people like this";
        } else {
            echo "Please Try Again! Later";
        }
    }
    /*handle buzz Request*/
    function buzzUpdate() {
        if ($_GET ['url'] == "buzzUpdate") {
            $arrArgs = array (
                    "buzztext" => $_GET ['buzztext'],
                    "id" => $_SESSION ['id'] 
            );
            if (isset ( $_GET ['buzztext'] ) && ! empty ( $_GET ['buzztext'] )) {
                $res = loadModel ( "buzzin", "buzzUpdate", $arrArgs );
                if ($res == 'true') {
                    echo "Buzzed";
                } else {
                    echo "Can't Buzz Now";
                }
            }
        }
    }
    /*Display Comments Dynamically(ajax)*/
    function displayComment() {
        $arrData = loadModel ( "buzzin", "loadComment", array (
                'buzz_id' => $_REQUEST ['buzz_id'] 
        ) );
        // create a file display comment and use $arrData to get comment
        // and load that file using loadView
        loadView ( "midpanel/displaycomment.php", $arrData );
        // the stuff will be loaded only to specific divison only
    }
    /*Display th ebuzz on ajax Request*/
    function displayBuzz() {
       
        $arrArgs = array (
                "id" => $_SESSION ["id"],
                "limit"=>@$_REQUEST['limit'], 
        );
        $arrData = loadmodel ( "buzzin", "loadbuzz", $arrArgs );
        loadView ( "midpanel/buzzdisplay.php", $arrData );
    }
    /*Handle comment insert request*/
    function comment() {
        $arrArgs = array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'],
                "comment_text" => $_REQUEST ['comment_text'] 
        );
        if (isset ( $_GET ['comment_text'] ) && ! empty ( $_GET ['comment_text'] )) {
            $arrData = loadModel ( "buzzin", "insertComment", $arrArgs );
            
       if($arrData == 'true') {
                echo "Commented";
            }
        } else {
            
            echo "Encountered a Problem Wait for a Second!";
        }
    }
    /*Let user to mark a BUzz Spam*/
    function markBuzzSpam() {
        echo "!";
        $result = loadModel ( "buzzin", "markBuzzSpam", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id']
        ) );
        if ($result=="spam") {
            echo "Already Marked Spam By You";
        } else if($result == "newspam") {
            echo "Marked Spam";
        } else {
            echo "Please Try Again! Later";
        }
    }
}
?>