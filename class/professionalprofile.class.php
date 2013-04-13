<?php
require_once ('dbAcess.php');

/*
 * professionalprofile class
 * This class is the model class performing all the Functionality related to Professional Profile.
*/
class professionalprofile extends DbConnection {
    public $dbInstance;
    
    /*
	 * constructor of the professionalprofile class calls the parents constructor
	 * and thus enabling the class to perform database connectivity.
	*/
    public function __construct() {
        parent::__construct ();
    }
    /*
     * constructFields()
     * This method constructs the columns for the professional_profile,qualification,resume,experience and
     * certifications table. 
    */
    private function constructFields() {
        $arr ["professional_profile"] = array (
                "career_objective",
                "skills",
                "proficiency",
                "designation",
                "company",
                "information" 
        );
        
        $arr ["qualification"] = array (
                "id",
                "class",
                "qualification_type",
                "institute",
                "university",
                "start_year",
                "end_year",
                "percentage",
                "subject_studied",
                "added_date",
                "field" 
        );
        $arr ["certifications"] = array (
                "id",
                "certification_name",
                "certification_year",
                "institution",
                "validity" 
        );
        $arr ["resume"] = array (
                "resume_path",
                "resume_date" 
        );
        $arr ["experience"] = array (
                "id",
                "company_name",
                "start_date",
                "end_date",
                "current_job",
                "position" 
        );
        return $arr;
    }
    /*
     * updateProfile()
     * This method updates the Basic Professional Profile of the User.
     * */
    public function updateProfile($fields) {
        if ($fields) {
            $data = array ();
            foreach ( $fields as $key => $value ) {
                if ($key != 'table' && $key != 'controller' && $key != 'url' && $key != 'PHPSESSID') {
                    $data ["$key"] = strip_tags ( "$value" );
                }
            }
            $where = array (
                    "user_id" => $_SESSION ['id'] 
            );
            $table = $fields ['table'];
            $result = $this->db->update ( $table, $data, $where );
            return $result;
        } else {
            return false;
        }
    }
    
    /*
     * retrieveData()
     * This method fetches the data for the Professional Profile.
     * */
    public function retrieveData($id) {
        $table = $this->constructFields ();
        foreach ( $table as $tableKey => $fieldsKey ) {
            $data ['columns'] = array ();
            foreach ( $fieldsKey as $key ) {
                $data ['columns'] [] = "$key";
            }
            $data ['tables'] = "$tableKey";
            $data ['conditions'] = array (
                    "user_id" => $id 
            );
            $temp = $this->db->select ( $data );
            if ($tableKey != "professional_profile") {
                $result [$tableKey] = array ();
                while ( $row = $temp->fetch ( PDO::FETCH_ASSOC ) ) {
                    array_push ( $result [$tableKey], $row );
                }
            } else {
                $result [$tableKey] = $temp->fetch ( PDO::FETCH_ASSOC );
            }
        }
        return $result;
    }
    
    /*
     * insertInto()
     * This method inserts new entries in the qualification,certification and experience tables.
     * */
    public function insertInto($fields) {
        if ($fields) {
            
            foreach ( $fields as $key => $value ) {
                if ($key != 'table' && $key != 'controller' && $key != 'url' && $key != 'PHPSESSID') {
                    $data ["$key"] = strip_tags ( $value );
                }
            }
            $data ['user_id'] = $_SESSION ['id'];
            $result = $this->db->insert ( $fields ['table'], $data );
            return $result;
        } else {
            return false;
        }
    }
    /*
     * deleteFrom()
     * This method deletes entries from the qualification,certification and experience tables.
     */
    public function deleteFrom($arrArgs) {
        if ($arrArgs ['row_id']) {
            $data ['conditions'] = array (
                    "id" => $arrArgs ['row_id'],
                    "user_id" => $_SESSION ['id'] 
            );
            $result = $this->db->delete ( $arrArgs ['table'], $data ['conditions'] );
            return $result;
        } else {
            return false;
        }
    }
    
    /*
     * retrieveFrom()
     * This method fetches data form the qualification,certification and experience tables.
     * */
    public function retrieveFrom($arrArgs) {
        if ($arrArgs) {
            $temp = $this->constructFields ();
            $fields = $temp [$arrArgs ['table']];
            $data ['tables'] = $arrArgs ['table'];
            foreach ( $fields as $key => $value ) {
                $data ['columns'] [] = $value;
            }
            if ($arrArgs ['table'] != "professional_profile") {
                $data ['conditions'] = array (
                        "id" => $arrArgs ['rowId'] 
                );
            } else {
                $data ['conditions'] = array (
                        "user_id" => $_SESSION ['id'] 
                );
            }
            
            $res = $this->db->select ( $data );
            if ($res) {
                return $res;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /*
     * updateInto()
     * This method updates existing entries in the qualification,certification and experience tables.
     * */
    public function updateInto($fields) {
        if ($fields) {
            $data = array ();
            foreach ( $fields as $key => $value ) {
                if ($key != 'table' && $key != 'controller' && $key != 'url' && $key != 'PHPSESSID' && $key != 'rowId') {
                    $data ["$key"] = strip_tags ( "$value" );
                }
            }
            $where = array (
                    "id" => $fields ['rowId'] 
            );
            $table = $fields ['table'];
            $result = $this->db->update ( $table, $data, $where );
            return $result;
        } else {
            return false;
        }
    }
    
    /*
     * processUpload()
     * This method processes the resume upload request. 
     */
    public function processUpload() {
    	$allowedExts = array("doc", "docx", "rtf", "txt","pdf","tif");
		$extension = end(explode(".", $_FILES['resume']['name']));
		
		//return $_FILES["resume"]["name"];
		if (in_array($extension, $allowedExts)) {
		    if ($_FILES['resume']['error'] > 0) {
				return "Error Occured While Uploading";
		    } else {
                if (file_exists(UPLOAD_PATH . $_FILES["resume"]["name"])) {
                    echo $_FILES["resume"]["name"] . " already exists. ";
                } 
				$ok = move_uploaded_file($_FILES["resume"]["tmp_name"],UPLOAD_PATH.$_SESSION['id'].".".$extension);
				if($ok) {
                    
                    $data=array(
                        "user_id"=>$_SESSION['id'],
                        "resume_path"=>UPLOAD_PATH.$_SESSION['id'].".".$extension
                    );
                    $this->db->insert("resume",$data);
                    return "File Successfully Uploaded ";
                }
                else {
                    return "Error Occurred While Uploading File.";
                }
		    }
		}
		else {
		  return " File extension not supported.".
          "<br/>Only .doc, .docx, .rtf, .txt, .pdf and .tif formats allowed.";
		}
	}
}

?>