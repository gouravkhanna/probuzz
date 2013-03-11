


<?php
include_once 'dbAcess.php';

//session_start();
class corporate
{
    function __construct() {
    
    }
    function alotSlot($arrArg=array()) {
        //if(!$designation!="")
        
        $sql="INSERT INTO probuzz.jobs (corp_id,designation) VALUES (".$arrArg['id'].",'".$arrArg['designation']."')";
        $ob=new DbConnection();
        $result=$ob->executeSQL($sql);
        if($result=="true") {
            echo "<script> alert(SUCCESSALOTID);</script>";
        }
        else{
            echo "<script> alert(UNSUCCESSFULALOTID);</script>";    
        } 
    }
    function showSlot($arrArg=array()) {
        $cond="";
        if(isset($arrArg['jobId']))
        {
                $cond=" AND id='".$arrArg['jobId']."'";
        }
        $ob=new DbConnection();
        
        $sql="SELECT id,designation,status, DATE_FORMAT(start_date, ";
        $sql.="'%M %D, %Y'".") as startdate,DATE_FORMAT(last_date, '%M %D, %Y') as lastdate ";
        $sql.= "FROM probuzz.jobs where corp_id="."'".$arrArg['id']."'".$cond;
        
        $result=$ob->executeSQL($sql);
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