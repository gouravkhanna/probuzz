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
        /* Will check whether it is request by user or corporate  */
        if (@$arrArg['requestType']=="user"){
        	$sql.= " FROM probuzz.jobs where id='".$arrArg['jobId']."' ";
        }
        else {
        	$sql.= " FROM probuzz.jobs where corp_id="."'".$arrArg['id']."'".$cond;
        }
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
    /*  Search for the people with required qualification,City,Gender
     */
    function searchPeople($arrArg=array()) {
       	/* USer Must Have a valid entry in personal_profile,qualifation,address,photo,experiance  */
$sql = "select 
			p.user_id as id,
			p.first_name,p.last_name,
			photo.path 
		from 
			personal_profile p 
			left join address a on p.user_id=a.user_id
			left join qualification q on q.user_id=p.user_id
			left join photo photo on p.profile_pic_id=photo.id";  
		 	
		$cond=" ";
    	//Based on City
    	if(!empty($arrArg['city'])) {
    		 foreach($arrArg['city'] as $val) {
    			if($val!="") {
       				$cond.=" a.city='$val' OR";
    			}
       		}
       		$cond=rtrim($cond,"OR");
       		$cond.=") AND (";
       		 
    	}
    	//Based On gender
    	 $val=$arrArg['gender'];
    		if($val!="" && $val!="Both" ) {
       				$cond.=" p.gender='$val' OR";
       			  	$cond=rtrim($cond,"OR");
       			  	$cond.=") AND (";
    		}
    	//Based On Degree
    	if(!empty($arrArg['degree'])) {
    		foreach($arrArg['degree'] as $val) {
    			if($val!="") {
    				$cond.=" q.class='$val' OR";
    			}
    		}
    		$cond=rtrim($cond,"OR");
    		$cond.=") AND (";
    	}
    	$cond=rtrim($cond,"AND (");
    	
    	if($cond!="") {
    		$sql.=" where ( ".$cond." group by id";
    	  	$res=mysql_query($sql);
    	 	while($result[]=mysql_fetch_array($res)) {		
    	} 
    	return $result;
    	}
    	
    
    	
    }
        
}