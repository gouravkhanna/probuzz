<?php
    require_once('dbAcess.php');
    class professionalprofile {
        public $dbInstance;
        public function __construct() {
        
        }
        private function constructFields() {
            $arr["professional_profile"] = array(
                "career_objective",
                "skills",
                "proficiency",
                "designation",
                "company",
                "information"			
            );
            
            $arr["qualification"] = array(
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
                if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID') {
                    $set.="$key = '$value' ,";    
                }
            }
            $set=rtrim($set,",");
            $query.="$set where user_id =".$_SESSION['id']." ;";
            echo $query;
            $this->dbInstance=new DbConnection();
            $result=$this->dbInstance->executeSQL($query);
            
            return $result;
        }
        public function retrieveData($id) {
            $result;
            $table=$this->constructFields();
            foreach($table as $tableKey =>$fieldsKey) {
                $query="select ";
                $fields="";
                foreach($fieldsKey as $key) {
                    $fields.="$key ,";
                }
                $fields=rtrim($fields,",");
                $query.="$fields from $tableKey where user_id =".$id." ;";
                $this->dbInstance=new DbConnection();
                $temp=$this->dbInstance->executeSQL($query) or die("<br/><br/><br/><br/><br/><br/><br/><br/><br/>nothing");
                if($tableKey=="qualification" || $tableKey=="resume") {
                    $result[$tableKey]=array();
                    while($row=mysql_fetch_assoc($temp)) {
                        array_push($result[$tableKey],$row);
                    }
                } else {
                    $result[$tableKey]=mysql_fetch_assoc($temp);
                }
            }
            return $result;
        }
        public function insertQualification($fields) {
            //print_r($fields);
            $query="insert into ".$fields['table'];
            $columns="(";
            $values="values (";
            $result;
            foreach($fields as $key => $value) {
                if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID') {
                    $columns.="$key ,";
                    $values.= " '$value' ,";    
                }
            }
            $columns.="user_id)";
            $values.="'".$_SESSION['id']."');";
            $query.=$columns.$values;
            echo $query ;
            $this->dbInstance=new DbConnection();
            $result=$this->dbInstance->executeSQL($query);
            return $result;
        }
        public function deleteQualification($rowId) {
            if($rowId) {
                $query="delete from qualification where id=".$rowId." AND user_id=".$_SESSION['id'].";";
                $this->dbInstance=new DbConnection();
                $result=$this->dbInstance->executeSQL($query);
                return $result;
            } else {
                return false;
            }
        }
        public function retrieveQual($rowId) {
            $temp=$this->constructFields();
            $fields=$temp['qualification'];
            $query="select ";
            foreach($fields as $key =>$value) {
                //echo $value ."=>";
                $query.=$value." ,";
            }
            $query=rtrim($query,",");
            $query.="from qualification where id=".$rowId.";";
            echo $query;
            $this->dbInstance=new DbConnection();
            $result=$this->dbInstance->executeSQL($query);
            return $result;
        }
    }
?>