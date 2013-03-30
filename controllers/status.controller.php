<?PHP 
include 'controller.controller.php';
class status extends Controller
{
	function __construct() 	{
		parent::__construct();
	}

	function buzz() {
	echo "string";
   if($_GET['url']=="buzz") {
   	$arrArgs=array("buzztext"=>$_GET['buzztext'],"id"=>$_SESSION['id']);
	if(isset($_GET['buzztext']) && !empty($_GET['buzztext'])) {
			//buzzUpdate($arrArgs);
	$res=loadModel("buzzin","buzzUpdate",$arrArgs);
	if($res=='true')
	{
      echo "Updated Statissss";
		//header('location:index.php');
	}
	  
	} 
}



}	
function displayComment() {

   $arrData=loadModel("buzzin","loadComment",array('buzz_id' => $_REQUEST['buzz_id']));
   //create a file display comment and use $arrData to get comment 
   //and load that file using loadView
    loadView("midpanel/displaycomment.php",$arrData);
   //the stuff will be loaded only to specific divison only 
   

}
   function displayBuzz()
   {
   	
   	$arrArgs=array("id"=>$_SESSION["id"]);
   	$arrData=loadmodel("buzzin","loadbuzz",$arrArgs);
      loadView("midpanel/buzzdisplay.php",$arrData);
   	
   }
   
   
   function comment() {
   
  
   	$arrArgs=array(
   			"id"=>@$_SESSION['id'],
   			"buzz_id" => $_REQUEST['buzz_id'],
   			"comment_text" => $_REQUEST['comment_text'],
   			  		);
    if(isset($_GET['comment_text']) && !empty($_GET['comment_text'])){
   	$arrData=loadModel("buzzin","insertComment",$arrArgs);

   	 if($arrData=='true'){
   		
   		echo "inserted";   				
   			             	} 
               }
               else{


                  echo "nnooooo";
               }
       }

}
?>