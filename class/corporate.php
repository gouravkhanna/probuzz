


<?php
//include_once 'dbAcess.php';

//session_start();
class corporate
{
	function __construct() {
	
	}
    function alotSlot($designation="") {
    	//if(!$designation!="")
        $ob=new DbConnection();
        $sql="INSERT INTO probuzz.jobs (corp_id,designation) VALUES (".$_SESSION['id'].",'$designation')";
        $result=$ob->executeSQL($sql);
        if($result=="true") {
        	echo "<script> alert(SUCCESSALOTID);</script>";
        }
        else{
			echo "<script> alert(UNSUCCESSFULALOTID);</script>";	
        } 
   	}
    function showSlot($corp_id) {
    	$ob=new DbConnection();	
    	$result=$ob->executeSQL("SELECT id,designation,status, DATE_FORMAT(start_date, '%M %D, %Y') as startdate,DATE_FORMAT(last_date, '%M %D, %Y') as lastdate FROM probuzz.jobs where corp_id='$corp_id'");
    	return $result;
    }    
   /*  function updateSlot() {
    	
    		$sql="UPDATE probuzz.jobs SET designation='$designation'";
    		$sql.="type='$type',location='$location',role=$role,start_date='$start_date'";
    		$sql.="last_date='$last_date',area_of_work='$area_of_work',description='$description'";
    		$sql.="skills_required='$skills_required',responsiblity='$responsiblity'";
    		$sql.="experience='$experience',contact_person='$contact_person'";
    		$sql.="phone_number='$phone_number',keywords='$keywords'";
    		$sql.="qualification='$qualification',number_of_vacancy='$number_of_vacancy'";
    		$sql.="process_details='$process_details',salary_expected='$salary_expected'";
    		$sql.="other_info='$other_info',criteria='$criteria'";
    		$sql.="salary_range='$salary_range',status='$status'"; 
    		$sql.=WHERE id='$corp_id'"; 
    		$ob=new DbConnection();
    		$ob->executeSQL($sql);
    	 
    } */
        
}