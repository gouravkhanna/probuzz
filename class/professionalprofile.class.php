<?php
    require_once('dbAcess.php');
    class professionalprofile {
        public $dbInstance;
        public function __construct() {
        
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
        public function retrieveData($table) {
            $query="select career_objective, skills,proficiency,designation,company,information from ";
        }
        
    }
    
?>