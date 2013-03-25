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

}
?>