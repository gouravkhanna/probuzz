<?php
class validation {
	function __construct() {
		
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
			echo "space";return true;
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

/* $ob=new validation();
$arr=array(
		"key"=>"a2554''/*",
		"key1"=>"a//",
		"key2"=>"a2554''/*",
		"key3"=>"a2554''/*",
		"key4"=>"a2554''/*",
);
$res=$ob->addSlash($arr);
echo "<pre>";
print_r($res);
if($res) {
	echo "yesyes";
} else {
	echo "SHIt";
}
 */


?>
