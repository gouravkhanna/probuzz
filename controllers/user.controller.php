<?php include 'controller.controller.php';
class user extends controller {
	
	
	function showSearchJobs() {
		echo "<pre>";
		//print_r($_REQUEST);
		$designation=@$_REQUEST['sjdesignation'];
		$minSal=@$_REQUEST['sjminsal'];
		$maxSal=@$_REQUEST['sjmaxsal'];
		$experiance=@$_REQUEST['sjexp'];
		$city=@$_REQUEST['sjlocation'];
		$otherCity=@$_REQUEST['sjclocationother'];
		$company=@$_REQUEST['sjcompany'];
		//checking whether if any other city are specified or not
		if($otherCity!="") {
			$otherCityArray=explode(",",$otherCity);
			//checking if only other city are specified and value from select box is not choosen
			if(!is_array($city)) {
				$city=array();
			}
			$city=array_merge($city,$otherCityArray);
		}
		$arrArgs=array(
				'designation'=>$designation,
				'minsal'=>$minSal,
				'maxsal'=>$maxSal,
				'experiance'=>$experiance,
				);
		$arrData=loadModel("users","showSearchJobs",$arrArgs);
		loadView("search/displaysearchjob.php", $arrData);
		
		
	}
	function searchJob(){
		/* echo "<br><br><br><br>";
		echo "<pre>";
		print_r($_REQUEST);
		echo "</pre>";
		 *///loading page content
		loadView("head/head1.php");
		$path=loadModel("users","getProfilePic",array('id'=>$_SESSION['id']));
		loadView("navigation/usernavigation.php",array('profile_pic_path' =>$path));
		//checking if request for search is made or not
		loadView('search/searchjob.php');	
		loadView('footer/footer.php');
	}
	function loadAppStatus() {
		$result=loadModel("users","getJobAppStatus",array(
														'id'=>$_SESSION['id'],
														'jobId'=>$_REQUEST['jobId'],
														));
		loadView("appstatus.php",array(
										'status'=>$result,
										'jobid'=>$_REQUEST['jobId'],
										));
		
	}

	function applyJob() {
			$result=loadModel("users","applyJob",array(
														'id'=>$_SESSION['id'],
														'jobId'=>$_REQUEST['jobId'],
														));
			if($result) {
				echo "Applied Succesfully ";
			}
			else {
				echo "Error!! Please Try Again Later";
			}
		
	}
	
}

?>