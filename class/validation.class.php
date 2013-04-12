<?php
class validation {
	function __construct() {
		
	}
	/*Valiadte fields on register*/
	function register($arrArgs=array()) {
		
		$email=$this->checkEmail(array("key"=>$arrArgs['email']));
   		$password=$this->validPassword(array("key"=>$arrArgs['password']));
   		$userName=$this->checkSpaces(array("key"=>$arrArgs['userName']));
   		$firstName=$this->checkSpaces(array("key"=>$arrArgs['firstName']));
   		$lastName=$this->checkSpaces(array("key"=>$arrArgs['lastName']));
   		$userNameAlpha=$this->checkAlphaNum(array("key"=>$arrArgs['userName']));
   		$flag=true;
   		$msg="";
		if(!$email){
			$flag=false;
			$msg.="Email Entered is invalid<br/>";
			
		}
		if(!$password){
			$flag=false;
			$msg.="Password Entered is invalid<br/>";
		}
		if(!$userNameAlpha){
			$flag=false;
			$msg.="User Name Must Contain Atleast one character<br/>";
		}
		if($firstName){
			$flag=false;
			$msg.="First Name Can Not Contain Only Spaces<br/>";
		}
		if($userName){
			$flag=false;
			$msg.="User Name Can Not Contain Only Spaces<br/>";
		}
		 if($lastName){
			$flag=false;
			$msg.="Last Name Can Not Contain Only Spaces<br/>";
		} 
 		if(!$arrArgs['email'] || !$arrArgs['password'] || !$arrArgs['userName'] || !$arrArgs['firstName'] || !$arrArgs['lastName']){
 			$flag=false;
 			$msg.="No fields should be empty";
 		}
 		$arrData=array('flag'=>$flag,
 			'msg'=>$msg,
		);		
 		   		
 		 return $arrData;
   
	}

    function corpregister( $arrArgs=array()){
   //   
   //$arrArgs = array (
   //                     "company_name"=>$_REQUEST['company_name'],
   //                     "user_name" =>$_REQUEST['user_name'],
   //                     "location" =>$_REQUEST['Location'],
   //                     "corp_email" =>$_REQUEST['corp_email'],
   //                     "company_password" =>$_REQUEST['company_password'],
   //                     "comp_confirm_pass" =>$_REQUEST['comp_confirm_pass'],
   //             );
   
		$email=$this->checkEmail(array("key"=>$arrArgs['corp_email']));
		$password=$this->validPassword(array("key"=>$arrArgs['company_password']));
   		$userNameAlpha=$this->checkAlphaNum(array("key"=>$arrArgs['user_name']));
   		$companyName=$this->checkSpaces(array("key"=>$arrArgs['company_name']));
		$location=$this->checkSpaces(array("key"=>$arrArgs['location']));

		$flag=true;
   		$msg="";
		if(!$arrArgs['company_name'] || !$arrArgs['user_name'] || !$arrArgs['Location']
		   || !$arrArgs['corp_email'] || !$arrArgs['company_password'] || !$arrArgs['comp_confirm_pass']){
 			$flag=false;
 			$msg.="No fields should be empty.<br/>";
 		}
		if($companyName) {
			$flag=false;
 			$msg.="Company Name Can Not Contain Only Spaces.<br/>";
		}
		if(!$userNameAlpha){
			$flag=false;
 			$msg.="Invalid Characters Used For User Name.<br/>";
		}
		if($location) {
			$flag=false;
 			$msg.="Location Can Not Contain Only Spaces.<br/>";
		}
		if(!$password) {
			$flag=false;
			$msg.="Password Length Should Be Between 6-20.<br/>";
		}
		if($arrArgs['company_password']!=$arrArgs['comp_confirm_pass']) {
			$flag=false;
			$msg.="Confirm Password Does Not Match.<br/>";
		}
		if(!$email) {
			$flag=false;
			$msg.="Email Entered is invalid<br/>";
		}
		$arrData=array('flag'=>$flag,
 			'msg'=>$msg,
		);		
 		   		
 		 return $arrData;
    }
/*Remove spaces from text*/
	function spaceRemover($input) {
		return preg_replace('/\s+/', ' ', $input);
	}
	
	/*Check if field is empty or not*/
	function checkEmpty($arrData = array()) { 
		if(!empty($arrData)) {
			$field = $arrData ['key'];
			if (empty ( $field )) {
				return true;
			} else {
				return false;
			}
		}
	}
	/**Contain Spaces*/ 
	function checkSpaces($arrData = array()){
		$field = $arrData ['key'];
		if (preg_match("/\\s/", $field)) {
			return true;
		} else {
			return false;
		}
		
	} 
	// function can also use to check string doesnot contain any special chars....
	function checkAlphaNum($arrData = array()) { // string contain digit with aplhabets
		$field = $arrData ['key'];
		if (ctype_alnum ( $field )) {
				
			return true;
		} else {
				
			return false;
		}
	}
	/* string contain only alphabets*/
	function checkAlpha($arrData = array()) { 
		$field = $arrData ['key'];
		if (ctype_alpha ( $field )) {
				
			return true;
		} else {
				
			return false;
		}
	}
	// function to validate email
	function checkEmail($arrData = array()) { 
		$field = $arrData ['key'];
		$email = filter_var ( $field, FILTER_SANITIZE_EMAIL ); // check if the mail is a valid mail or not
		if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) { // if not valid
			return false;
		} else {
				
			return true;
		}
	}
	
	// add slashes in front of predefined characters
	function addSlash($arrData = array()) {
		foreach($arrData as $key =>$val) {
			$result[$key]=addslashes($val);
		}
		
		return $result; 
	}
	/*validate password*/
	function validPassword($arrData = array()) {
		$field = $arrData ['key'];
	
		if (strlen ( $field ) < 6 || strlen ( $field ) > 20) {
				
			return false;
		} else {
			return true;
		}
	}
}
?>
