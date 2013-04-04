<?php
class validation {
	function __construct() {
		
	}
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
			$msg.="First Name Can Not Contain Spaces<br/>";
		}
		if($userName){
			$flag=false;
			$msg.="User Name Can Not Contain Spaces<br/>";
		}
		 if($lastName){
			$flag=false;
			$msg.="Last Name Can Not Contain Spaces<br/>";
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
	function spaceRemover($input) {
		return preg_replace('/\s+/', ' ', $input);
	}
	
	
	function checkEmpty($arrData = array()) { // check field is empty or not
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
	function checkAlpha($arrData = array()) { // string contain only alphabets
		$field = $arrData ['key'];
		if (ctype_alpha ( $field )) {
				
			return true;
		} else {
				
			return false;
		}
	}
	
	function checkEmail($arrData = array()) { // function to validate email
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
