<?php
    require_once('dbAcess.php');
    class professionalprofile extends DbConnection{
        public $dbInstance;
        public function __construct() {
            parent::__construct();
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
            $arr["certifications"] = array(
                "id",
                "certification_name",
                "certification_year",
                "institution",
                "validity"
            );
            $arr["resume"] = array(
                "resume_path",
                "resume_date"
            );
            $arr["experience"] = array(
                "id",
                "company_name",
                "start_date",
                "end_date",
                "current_job",
                "position"
                
            );
            return $arr;
        }
        public function updateProfile($fields) {
            if($fields) {
                $data=array();
                foreach($fields as $key => $value) {
                    if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID') {
                        $data["$key"]=strip_tags("$value");
                    }
                }
                $where=array("user_id"=>$_SESSION['id']);
                print_r($data);
                $table=$fields['table'];
                $result = $this->db->update($table, $data, $where);
                return $result;    
            } else {
                return false;
            }
            
            
        }
        /*  old dbConnection
         *public function updateProfile($fields){
            
            $query="update ".$fields['table'];
            $set=" set ";
            $result;
            foreach($fields as $key => $value) {
                if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID') {
                    $set.="$key = '".strip_tags($value)."' ,";    
                }
            }
            $set=rtrim($set,",");
            $query.="$set where user_id =".$_SESSION['id']." ;";
            //echo $query;
            $this->dbInstance=new DbConnection();
            $result=$this->dbInstance->executeSQL($query);
            return $result;
            return false;
        }*/
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
                $temp=$this->dbInstance->executeSQL($query) or die("nothing in db");
                if($tableKey=="qualification" || $tableKey=="resume" || $tableKey=="certifications" || $tableKey=="experience") {
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
        public function insertInto($fields) {
            if($fields){
                $query="insert into ".$fields['table'];
                $columns="(";
                $values="values (";
                $result;
                foreach($fields as $key => $value) {
                    if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID') {
                        $columns.="$key ,";
                        $values.= " '".strip_tags($value)."' ,";    
                    }
                }
                $columns.="user_id)";
                $values.="'".$_SESSION['id']."');";
                $query.=$columns.$values;
                echo $query;
                $this->dbInstance=new DbConnection();
                $result=$this->dbInstance->executeSQL($query);
                return $result;
            } else {
                return false;
            }
        }
        public function deleteFrom($arrArgs) {
            if($arrArgs['row_id']) {
                $query="delete from ".$arrArgs['table']." where id=".$arrArgs['row_id']." AND user_id=".$_SESSION['id'].";";
                $this->dbInstance=new DbConnection();
                $result=$this->dbInstance->executeSQL($query);
                return $result;
            } else {
                return false;
            }
        }
        public function retrieveFrom($arrArgs) {
            $temp=$this->constructFields();
            $fields=$temp[$arrArgs['table']];
            
        }
        /*public function retrieveFrom($arrArgs) {
            $temp=$this->constructFields();
            $fields=$temp[$arrArgs['table']];
            $query="select ";
            foreach($fields as $key =>$value) {
                $query.=$value." ,";
            }
            $query=rtrim($query,",");
            $query.="from ".$arrArgs['table']." where id=".$arrArgs['rowId'].";";
            $this->dbInstance=new DbConnection();
            $result=$this->dbInstance->executeSQL($query);
            return $result;
        }*/
        public function updateInto($fields) {
            if($fields) {
                $data=array();
                foreach($fields as $key => $value) {
                    if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID' && $key!='rowId') {
                        $data["$key"]=strip_tags("$value");
                    }
                }
                $where=array("id"=>$fields['rowId']);
                print_r($data);
                $table=$fields['table'];
                $result = $this->db->update($table, $data, $where);
                return $result;
            } else {
                return false;
            }
        }
        /*  old updateInto()
         *public function updateInto($fields) {
                if($fields) {
                $query="update ".$fields['table']." set ";
                foreach($fields as $key => $value) {
                    if($key!='table' && $key!='controller' && $key!='url' && $key!='PHPSESSID' && $key!='rowId') {
                        $query.="$key = '".strip_tags($value)."' ,";    
                    }
                }
                $query=chop($query," ,");
                $query.=" where id=".$fields['rowId'].";";
                echo $query;
                $this->dbInstance=new DbConnection();
                $result=$this->dbInstance->executeSQL($query);
                return $result;
            } else {
                return false;
            }
        }*/
    }
    
?>