<?php
    session_start();
    require_once('dbAcess.php');
    class ProProfile {
        public $dbInstance;
        private $userId;
        public function __construct() {
            $this->userId=$_SESSION['id'];
        }
        
        public function __set($property, $value) {
           if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        
        public function edit() {
            
        }
        public function updateProfile($inputFields,$table){
            $query="update $table set ";
            $set="";
            foreach($inputFields as $key => $value) {
                $set.="$key = '$value' ,";
            }
            $set=rtrim($set,",");
            $query.="$set where user_id = $this->userId ;";
            echo $query;
            $this->dbInstance=new DbConnection();
            $this->dbInstance->executeSQL();
        }
        
    }
    
?>