<?php
    require_once('dbAcess.php');
    class professionalprofile {
        public $dbInstance;
        public function __construct() {
        
        }
        public function constructFields() {
            $arr["professional_profile"] = array(
                "career_objective",
                "skills",
                "proficiency",
                "designation",
                "company",
                "information"			
            );
            
            $arr["qualification"] = array(
                "class",
                "qualification_type",
                "institute",
                "university",
                "start_year",
                "end_year",
                "percentage",
                "subject_studied",
            );
            $arr["resume"] = array(
                "resume_path",
                "resume_date"
            );
            return $arr;
        }
        public function updateProfile($fields){
            
            $query="update ".$fields['table'];
            $set=" set ";
            $result;
            foreach($fields as $key => $value) {
                if($key!='table' && $key!='controller' && $key!='url') {
                    $set.="$key = '$value' ,";    
                }
            }
            $set=rtrim($set,",");
            $query.="$set where user_id =".$_SESSION['id']." ;";
            $this->dbInstance=new DbConnection();
            $result=$this->dbInstance->executeSQL($query);
            
            return $result;
        }
        public function retrieveData($table=array()) {
            $result;
            foreach($table as $tableKey =>$fieldsKey) {
                $query="select ";
                $fields="";
                foreach($fieldsKey as $key) {
                    $fields.="$key ,";    
                }
                $fields=rtrim($fields,",");
                $query.="$fields from $tableKey where user_id =".$_SESSION['id']." ;";
                //echo "<br/><br/><br/><br/><br/><br/><br/><br/>" .$query;
                $this->dbInstance=new DbConnection();
                $temp=$this->dbInstance->executeSQL($query);
                $result[$tableKey]=mysql_fetch_array($temp);
            }
            return $result;
        }
      
    }
    
?>