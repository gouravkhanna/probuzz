<?php
	include 'controller.controller.php';
	
class proprofile extends Controller
{
	
	function __construct(){
		parent::__construct();
		
	}
	function home()
	{
		
		loadView('head/head1.php');
	  	$path=ROOTPATH.'data/photo/g.jpg';
	  	loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path"));
	  	loadView('head/head2.php');
	  	$arrArg=loadModel("professionalprofile","retrieveData","");
		$this->view->loadView('showproprofile.php',$arrArg);
	  	loadView('footer/footer.php');
		
	}
	function editView() {
		
		loadView('head/head1.php');
	  	$path=ROOTPATH.'data/photo/g.jpg';
	  	loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path"));
	  	loadView('head/head2.php');
	  	$this->view->loadView('proprofile.php');
	  	loadView('footer/footer.php');
		
	}
	public function updateProfile() {
		$fields=array();
		foreach($_REQUEST as $key => $value) {
			$fields[$key]=$value;
		}
		$result=loadModel("professionalprofile","updateprofile",$fields);
		if($result) {
			echo "Data Successfully Updated..";
		} else {
			echo "Data Update Failure..";
		}
	}
	/*public function uploadResume() {
		echo "in upload resume";
		$allowedExts = array("doc", "docx", "rtf", "txt","pdf","tif");
		$extension = end(explode(".", $_FILES["resume"]["name"]));
		if ((($_FILES["resume"]["type"] == "application/msword")
		|| ($_FILES["resume"]["type"] == "application/rtf")
		|| ($_FILES["resume"]["type"] == "application/pdf")
		|| ($_FILES["resume"]["type"] == "text/plain"))
		&& ($_FILES["resume"]["size"] < 5242880)
		&& in_array($extension, $allowedExts)) {
		    if ($_FILES["resume"]["error"] > 0) {
			echo "Return Code: " . $_FILES["resume"]["error"] . "<br>";
		    } else {
			if (file_exists(UPLOAD_PATH . $_FILES["resume"]["name"])) {
			    echo $_FILES["resume"]["name"] . " already exists. ";
			} else {
			    $ok = move_uploaded_file($_FILES["resume"]["tmp_name"],UPLOAD_PATH.$_FILES["resume"]["name"]);
			    if($ok) { 
				echo "Stored in: " . UPLOAD_PATH . $_FILES["resume"]["name"];
				echo "File Uploaded Successfully";
			    }
			    else {
				    echo "File Upload Failed.";
			    }
			}
		    }
		}
		else {
		  echo "Invalid file";
		}
	}*/
}


?>