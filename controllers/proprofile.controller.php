<?php
	include 'controller.controller.php';

/*
 * proprofile class
 * This controller class handles all the tasks relating to Users Professional Profile
*/
class proprofile extends Controller
{
	
	/*
	 * Constructor of proprofile class calls the parent class constructor
	 * enabling proprofile class to use the Controller Abilities
	*/
	function __construct(){
		parent::__construct();
		
	}
	
	/*
	 * home()
	 * This is the default method of the proprofile Controller
	 * This method loads the default View of the Professional Profile
	*/
	function home()
	{
		loadView('head/head1.php');
		$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
		$userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
		loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path,"user_name"=>$userName));
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
	
	/*
	 * editView()
	 * This method calls the model and Loads the Editing View of the Users Professional Profile.
	*/
	function editView() {
		loadView('head/head1.php');
	  	$path=ROOTPATH.'data/photo/g.jpg';
	  	$userName=loadModel("users","fetchName",array("id"=>$_SESSION['id']));
	  	loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path","user_name"=>$userName));
		if(isset($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
			
		} else {
			$id=$_SESSION['id'];
		}
		$arrArg=loadModel("professionalprofile","retrieveFrom",array("id"=>$id,"table"=>"professional_profile"));
	  	$this->view->loadView('proprofile.php',$arrArg);
	  	loadView('footer/footer.php');
		
	}
	
	/*
	 * updateProfile()
	 * This method calls the model to update the Basic Professional Profile Information of the User.
	*/
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
	
	/*
	 * deleteFrom()
	 * This method calls the model to delete an entry from either of the Qualification,
	 * Experience or the Certifications of the Users Professional Profile.
	*/
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
	
	/*
	 * getFancyBoxContent()
	 * This method calls the model and loads the fancybox with respective view of Experience, Qualification,
	 * or Certifications.
	*/
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
	
	/*
	 * inserInto()
	 * This method calls the model and add either Qualification, Experience OR Certification
	 * in the Users Professional Profile.
	*/
	public function insertInto() {
		$fields=array();
		foreach($_REQUEST as $key => $value) {
			$fields[$key]=$value;
		}
		if($_REQUEST['table']=="qualification") {
			$flag=true;
			$msg="";
			if(!$_REQUEST['class']) {
				$msg="Qualification Can't Be Empty.<br/>";
				$flag=false;
			}
			if($_REQUEST['qualification_type']=="0") {
				$msg.="Please Select A Qualification Type.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['start_year']) {
				$msg.="Must Provide Start Year.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['end_year']) {
				$msg.="Must Provide End Year.<br/>";
				$flag=false;
			}
			if(!$flag) {
				$_SESSION['qual_error']=$msg;
				echo "Qualification Addition Failure.";
				return false;
			}
			$message="Qualification";
		} else if($_REQUEST['table']=="certifications") {
			$flag=true;
			$msg="";
			if(!$_REQUEST['certification_name']) {
				$msg.="Certification Name Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['institution']) {
				$msg.="Institution Name Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['certification_year']) {
				$msg.="Certification Year Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['validity']) {
				$msg.="Certification Validity Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$flag) {
				$_SESSION['cert_error']=$msg;
				echo "Certification Addition Failure.";
				return false;
			}
			$message="Certification";
		} else if($_REQUEST['table']=="experience") {
			$flag=true;
			$msg="";
			if(!$_REQUEST['company_name']) {
				$msg.="Company Name Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['position']) {
				$msg.="Position Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['start_date']) {
				$msg.="Joining Date Can't Be Empty.<br/>";
				$flag=false;
			}
			if(!$flag) {
				$_SESSION['exp_error']=$msg;
				echo "Experience Addition Failure.";
				return false;
			}
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
	
	/*
	 * updateInto()
	 * This method calls the model and update either Qualification, Experience OR Certification
	 * in the Professional Profile.
	*/
	public function updateInto() {
		$fields=array();
		foreach($_REQUEST as $key => $value) {
			$fields[$key]=$value;
		}
		if($_REQUEST['table']=="qualification") {
				$flag=true;
			if(!$_REQUEST['class']) {
				$msg="Qualification Can't Be Empty.<br/>";
				$flag=false;
			}
			if($_REQUEST['qualification_type']=="0") {
				$msg.="Please Select A Qualification Type.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['start_year']) {
				$msg.="Must Provide Start Year.<br/>";
				$flag=false;
			}
			if(!$_REQUEST['end_year']) {
				$msg.="Must Provide End Year.<br/>";
				$flag=false;
			}
			if(!$flag) {
				$_SESSION['qual_error']=$msg;
				echo "Qualification Addition Failure.";
				return false;
			}
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
	
	/*
	 * fetchFrom()
	 * This method fetches the data from either Qualification or Experience or Certifications.
	*/
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
	
	/*
	 * uploadResume()
	 * This method calls the model to add a single resume to the Users Professional Profile.
	*/
	public function uploadResume() {
		$response=loadModel("professionalprofile","processUpload");
		echo "<script language='javascript' type='text/javascript'>window.top.window.stopUpload('".$response."');</script>";
	}

}


?>