<?PHP
include 'controller.controller.php';
class status extends Controller {
    function __construct() {
        parent::__construct ();
    }
    function buzz() {
        loadView("head/head1.php");
        $path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
	    loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path));
	    loadView("head/head2.php");

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
    function buzzDelete() {
        $result = loadModel ( "buzzin", "buzzDelete", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'] 
        ) );
        if ($result = true) {
            echo "Buzz Deleted";
        } else {
            echo "Please Try Again! Later";
        }
    }
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
    function buzzLike() {
        $result = loadModel ( "buzzin", "buzzLike", array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'],
        ) );
        
        $result2=loadModel ( "buzzin", "loadLike", array (
                    "id" => @$_SESSION ['id'],
                    "buzz_id" => $_REQUEST ['buzz_id'],
                    ));
        if ($result = true) {
            echo "You & ".($result2['total_like']-1)." people like this";
        } else {
            echo "Please Try Again! Later";
        }
    }
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
    function displayComment() {
        $arrData = loadModel ( "buzzin", "loadComment", array (
                'buzz_id' => $_REQUEST ['buzz_id'] 
        ) );
        // create a file display comment and use $arrData to get comment
        // and load that file using loadView
        loadView ( "midpanel/displaycomment.php", $arrData );
        // the stuff will be loaded only to specific divison only
    }
    function displayBuzz() {
       
        $arrArgs = array (
                "id" => $_SESSION ["id"],
                "limit"=>@$_REQUEST['limit'], 
        );
        $arrData = loadmodel ( "buzzin", "loadbuzz", $arrArgs );
        loadView ( "midpanel/buzzdisplay.php", $arrData );
    }
    function comment() {
        $arrArgs = array (
                "id" => @$_SESSION ['id'],
                "buzz_id" => $_REQUEST ['buzz_id'],
                "comment_text" => $_REQUEST ['comment_text'] 
        );
        if (isset ( $_GET ['comment_text'] ) && ! empty ( $_GET ['comment_text'] )) {
            $arrData = loadModel ( "buzzin", "insertComment", $arrArgs );
            
            if ($arrData == 'true') {
                
                echo "Commented";
            }
        } else {
            
            echo "Encountered a Problem Wait for a Second!";
        }
    }
}
?>