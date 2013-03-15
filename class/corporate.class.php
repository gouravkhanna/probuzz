<?php
include_once 'dbAcess.php';
class corporate {
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
        $sql="SELECT id,designation,type,status,DATE_FORMAT(created_date, '%M %D, %Y') as createddate, DATE_FORMAT(start_date, ";
        $sql.="'%M %D, %Y'".") as startdate,DATE_FORMAT(last_date, '%M %D, %Y') as lastdate ";
        $sql.=",start_date,last_date, location,role,area_of_work,description,skills_required,responsiblity,";
        $sql.="experience,contact_person,phone_number,keywords,qualification,";
        $sql.="number_of_vacancy,process_details,salary_expected,other_info,criteria,salary_range";
        $sql.= " FROM probuzz.jobs where corp_id="."'".$arrArg['id']."'".$cond;
        
        $result=$ob->executeSQL($sql);
        return $result;
    }  
   function updateSlot($arrData=array()) {
    
    	$sql="update probuzz.jobs SET ";
    	foreach($arrData as $key =>$value)
    	{
    		if($key=="jobId") {
    			$sql=rtrim($sql," ,");
    			$sql.=" where id='$value'";
    		}
    		else {
    			$sql.="$key='$value', ";
    		}
    	}	
    	echo "<br/> <br/> <br/> ".$sql;
    	/* 	$sql="UPDATE probuzz.jobs SET designation='".$arrData['designation']."',";
    		$sql.="type='".$arrData['type']."',location='".$arrData['location']."',role=".$arrData['role']."',start_date='".$arrData['start_date']."',";
    		$sql.="last_date='".$arrData['last_date']."',area_of_work='".$arrData['area_of_work]."'',description='$arrData['description']."'";
    		$sql.="skills_required='".$arrData['skills_required']."',responsiblity=']."'".$arrData['responsiblity']."'";
    		$sql.="experience='".$arrData['experience']."',contact_person='".$arrData['contact_person']."'";
    		$sql.="phone_number='".$arrData['phone_number']."',keywords='".$arrData['keywords']."'";
    		$sql.="qualification='".$arrData['qualification']."',number_of_vacancy='".$arrData['number_of_vacancy']."'";
    		$sql.="process_details='".$arrData['process_details]."'',salary_expected='".$arrData['salary_expected']."'";
    		$sql.="other_info='".$arrData['other_info']."',criteria='".$arrData['criteria']."'";
    		$sql.="salary_range='".$arrData['salary_range']."',status='".$arrData['status']."'"; 
    		$sql.=WHERE id='".$arrData['corp_id']".'";  */
    		$ob=new DbConnection(); 
    		$res=$ob->executeSQL($sql);
    		return $res==true?true:false;

    	 
    } 
    function updateStatusJob($arrArg)
    {
    	$ob=new DbConnection();
    	$status=@$arrArg['status']==0?1:0;
    	$sql="update probuzz.jobs set status='".$status."' where id=".$arrArg['jobId'];
       	$res=$ob->executeSQL($sql);
    }
        
}