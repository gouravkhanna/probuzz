


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
        
}