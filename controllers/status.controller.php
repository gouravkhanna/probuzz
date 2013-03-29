<?PHP 
include 'controller.controller.php';
class status extends Controller
{
	function __construct() 	{
		parent::__construct();
	}

	function buzz() {
		
		
   if($_GET['url']=="buzz") {
   	$arrArgs=array("buzztext"=>$_GET['buzztext'],"id"=>$_SESSION['id']);
	if(isset($_GET['buzztext']) && !empty($_GET['buzztext'])) {
			//buzzUpdate($arrArgs);
	$res=loadModel("buzzin","buzzUpdate",$arrArgs);
	if($res=='true')
	{
      
		header('location:index.php');
	}
	  
	}
}



}	

   function displayBuzz()
   {
   	
   	$arrArgs=$_SESSION["id"];
   	$arrData=loadmodel("buzzin","loadbuzz",$arrArgs);
   	loadView("midpanel/midpanel.php",$arrData);
   	
   }
   
   
   function comment() {
   
  
   	$arrArgs=array(
   			"id"=>@$_SESSION['id'],
   			"buzz_id" => $_REQUEST['buzz_id'],
   			"comment_text" => $_REQUEST['comment_text'],
   			  			
   	);
   
   	$arrData=loadModel("buzzin","insertComment",$arrArgs);
   	 if($arrData=='true'){
   		
   		header('location:index.php');
   				
   				
   		
   		
   		
   	} 
   }

}
?>