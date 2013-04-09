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
		$userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
	  	loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path","user_name"=>$userName));
	  	//$arr=loadModel("professionalprofile","constructFields");
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
			
		} else {
			$id=$_SESSION['id'];
		}
		$arrArg=loadModel("professionalprofile","retrieveData",$id);
		$this->view->loadView('showproprofile.php',$arrArg);
		
	  	loadView('footer/footer.php');
	}
	function editView() {
		loadView('head/head1.php');
	  	$path=ROOTPATH.'data/photo/g.jpg';
	  	loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path"));
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
			
		} else {
			$id=$_SESSION['id'];
		}
		$arrArg=loadModel("professionalprofile","retrieveFrom",array("id"=>$id,"table"=>"professional_profile"));
	  	$this->view->loadView('proprofile.php',$arrArg);
	  	loadView('footer/footer.php');
		
	}
	public function updateProfile() {
		$fields=array();
		foreach($_REQUEST as $key => $value) {
			$fields[$key]=$value;
		}
		$result=loadModel("professionalprofile","updateProfile",$fields);
		if($result) {
			echo "Data Successfully Updated..";
		} else {
			echo "Data Update Failure..";
		}
	}
	public function deleteFrom() {
		if($_REQUEST['table']=="qualification") {
			$message="Qualification";
		} else if($_REQUEST['table']=="certifications") {
			$message="Certification";
		} else if($_REQUEST['table']=="experience") {
			$message="Experience";
		}
		$method="deleteFrom";
		$result=loadModel("professionalprofile",$method,array("row_id"=>$_GET['rowId'],"table"=>$_REQUEST['table']));
		if($result) {
			echo $message." Successfully Deleted..";
		} else {
			echo $message." Deletion Failed..";
		}
	}
	public function getFancyBoxContent() {
		if($_REQUEST['table']=="qualification") {
			$view="addUpdateQual.php";
		} else if($_REQUEST['table']=="certifications") {
			$view="addUpdateCert.php";
		} else if($_REQUEST['table']=="experience") {
			$view="addUpdateExp.php";
		}
		$method="retrieveFrom";
		if(isset($_REQUEST['rowId'])) {
			if($_REQUEST['rowId']) {
				$arrData=array(
							"rowId" => $_REQUEST['rowId'],
							"table" => $_REQUEST['table']
							);
				$arrArg=loadModel("professionalprofile",$method,$arrData);
				$this->view->loadView($view,$arrArg);

			} else {
				echo "Error Getting the facnybox..";
			}
		} else {
			$this->view->loadView($view,"");
			
		}
	}
	
	public function insertInto() {
		$fields=array();
		foreach($_REQUEST as $key => $value) {
			$fields[$key]=$value;
		}
		if($_REQUEST['table']=="qualification") {
			$message="Qualification";
		} else if($_REQUEST['table']=="certifications") {
			$message="Certification";
		} else if($_REQUEST['table']=="experience") {
			$message="Experience";
		}
		$method="insertInto";
		$result=loadModel("professionalprofile",$method,$fields);
		if($result) {
			echo $message." Successfully Added..";
		} else {
			echo $message." Addition Failure..";
		}
	}
	

	public function updateInto() {
		$fields=array();
		foreach($_REQUEST as $key => $value) {
			$fields[$key]=$value;
		}
		if($_REQUEST['table']=="qualification") {
			$method="updateQualification";
			$message="Qualification";
		} else if($_REQUEST['table']=="certifications") {
			$method="updateCertification";
			$message="Certificate";
		} else if($_REQUEST['table']=="experience") {
			$method="updateExperience";
			$message="Experience";
		}
		$method="updateInto";
		$result=loadModel("professionalprofile",$method,$fields);
		if($result) {
			echo $message." Updation Successful..";
		} else {
			echo $message." Updation Failed..";
		}
	}
	public function fetchFrom() {
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
		} else {
			$id=$_SESSION['id'];
		}
		if($_REQUEST['table']=="qualification") {
			$method="updateQualification";
			$view="displayQual.php";
		} else if($_REQUEST['table']=="certifications") {
			$method="updateCertification";
			$view="displayCertifications.php";
		} else if($_REQUEST['table']=="experience") {
			$method="updateExperience";
			$view="displayExperience.php";
		}
		$arrArg=loadModel("professionalprofile","retrieveData",$id);
		$this->view->loadView($view,$arrArg);
	}
	
	public function uploadResume() {
		//echo "in upload resume";
		
		$response=loadModel("professionalprofile","processUpload");
		echo "<script language='javascript' type='text/javascript'>window.top.window.stopUpload('".$response."');</script>";
		//echo "<script language='javascript' type='text/javascript'>window.top.window.response( '".$response."' );</script>";
		
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