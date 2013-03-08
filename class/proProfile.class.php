<?php
    session_start();
    require_once('dbAcess.php');
    class ProProfile {
        private $userId;
        private $careerObjective;
        private $skills;
        private $proficiency;
        private $designation;
        private $company;
        private $information;
        
        public function __construct() {
            $this->userId=$_SESSION['id'];
        }
        
        public function __set($property, $value) {
           if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        public function show() {
            echo "userId= $this->userId <br/>";
            echo "careerObjective= $this->careerObjective <br/>";
            echo "skills= $this->skills <br/>";
            echo "proficiency= $this->proficiency <br/>";
            echo "designation= $this->designation <br/>";
            echo "company= $this->company <br/>";
            echo "information= $this->information <br/>";
        }
        public function edit() {
            
        }
        public function insert() {
            
        }
        public function insertProfile($table=""){
            if($table=="") {
                echo "No table Supplied";
            } else if($table=="professional_profile") {
                
            } else if($table=='qualifications') {
                
            } else if($table=='resume') {
                
            }
            
        }
        
    }
    
?>