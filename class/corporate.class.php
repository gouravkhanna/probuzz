<?php
include_once 'dbAcess.php';
class corporate extends DbConnection{
    function __construct() {
    	parent::__construct();
    }
    function alotSlot($arrArg=array()) {
        //if(!$designation!="")
        $data=array(
        		'corp_id'=>$arrArg['id'],
        		'designation'=>$arrArg['designation'],
        		);
      //  $sql="INSERT INTO probuzz.jobs (corp_id,designation) VALUES (".$arrArg['id'].",'".$arrArg['designation']."')";
    	   $result=$this->db->insert("jobs",$data);
							
			if($result && $result->rowCount()>0) {
				return true;
			}
			else {
				return false;
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
        $result=$this->executeSQLP($sql);
        return $result;
    }  
   function updateSlot($arrData=array()) {
    $data=array();
    	$sql="update probuzz.jobs SET ";
    	foreach($arrData as $key =>$value)
    	{
    		if($key=="jobId") {
    		$jobId=$value;
    		}
    		else {
    	//		$sql.="$key='$value', ";
    			$data["$key"]="$value";
    		}
    	}	
    	
    	$where = array('id' =>"$jobId" );
    	$result = $this->db->update('jobs', $data, $where);
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
   	
			if($result && $result->rowCount()>0) {
				return true;
			}
			else {
				return false;
			}

    	 
    } 
    function updateStatusJob($arrArg)
    {
    	
    	$status=@$arrArg['status']==0?1:0;
    	$jobId=$arrArg['jobId'];
    	$data=array("status"=>"$status");
    	$where = array('id' =>"$jobId" );

    	$result = $this->db->update('jobs', $data, $where);
    	if($result && $result->rowCount()>0) {
    		return true;
    	}
    	else {
    		return false;
    	}
    	//$sql="update probuzz.jobs set status='".$status."' where id=".$arrArg['jobId'];
       	//$res=$ob->executeSQL($sql);
    }
    
    
    
    /*Show the Applciant for the jobs*/ 
    function getApplicant($arrArgs=array()) {
    	if(!empty($arrArgs)) {
    	//	print_r($_REQUEST);
    		$jobId=@$arrArgs['jobId'];
    		$ob=new DbConnection();
    		$sql= "SELECT p.first_name, p.last_name, p.user_id AS id,photo.path
			FROM personal_profile p
				JOIN job_applicant ja 
				ON ja.user_id = p.user_id
				JOIN photo 
				on photo.id=p.profile_pic_id
			WHERE ja.job_id='$jobId' ";
    		$data['tables']="personal_profile p";
    		$data['columns']=array('p.first_name','p.last_name', 'p.user_id AS id','pp.path');
    		$data['joins'][] = array(
    				'table' => 'job_applicant ja ',
    				'type'	=> 'INNER',
    				'conditions' => array('p.user_id' => 'ja.user_id')
    		);
    		$data['joins'][] = array(
    				'table' => 'photo pp',
    				'type'	=> 'INNER',
    				'conditions' => array('p.profile_pic_id' => 'pp.id')
    		);
    		$data['conditions']=array('ja.job_id'=>"$jobId");
    		
    		$result=$this->db->select($data);
    		//$result=$ob->executeSQL($sql);
    		if($result) {
    			while ($row[]=$result->fetch(PDO::FETCH_ASSOC)) {
    			}
    			return $row;   			
    		}
    		else {
    			echo "Error!!";
    		}
    		
    	}
    }
    
    /* Get the Stats of the company and particular job */
    function getAppStats($arrArg=array()) {
    	if(isset($arrArg['jobId'])) {
    		$result=$this->db->count("job_applicant",array("job_id"=>$arrArg['jobId']));
    		$row1=$result->fetch(PDO::FETCH_ASSOC);
    		$arrData=array(
    				"total_candidate"=>$row1['COUNT(*)'],
      		);
    		return ($arrData);
    	}
		else {
			$result=$this->db->count("jobs",array("corp_id"=>@$_SESSION['id']));
			  $row1=$result->fetch(PDO::FETCH_ASSOC);
			  $result=$this->db->count("jobs",array(
		  									"corp_id"=>@$_SESSION['id'],
		  									"status"=>'1',
		  									));
			  $row2=$result->fetch(PDO::FETCH_ASSOC);
			  $arrData=array(
		  		"total_jobs"=>$row1['COUNT(*)'],
		  		"total_active_jobs"=>$row2['COUNT(*)'],
		  		);
		 return ($arrData);
		}
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
       				$cond.=" a.city='$val' OR ";
    			}
       		}
       		$cond=rtrim($cond,"OR ");
       		$cond.=") AND (";
       		 
    	}
    	//Based On gender
    	 $val=$arrArg['gender'];
    		if($val!="" && $val!="Both" ) {
       				$cond.=" p.gender='$val' ";
       				$cond.=") AND (";
    		}
    	//Based On Degree
    	if(!empty($arrArg['degree'])) {
    		foreach($arrArg['degree'] as $val) {
    			if($val!="") {
    				$cond.=" q.class='$val' OR ";
    			}
    		}
    		$cond=rtrim($cond,"OR ");
    		$cond.=") AND (";
    	}
    	$cond=rtrim($cond,"AND (");
    	
    	if($cond!="") {
    		$sql.=" where ( ".$cond." group by id";
    		echo $sql;
    	  	$res=$this->executeSQLP($sql);
    	  	if($res) {
    	  		while($result[]=$res->fetch(PDO::FETCH_ASSOC)) {
    	  		}	
    	  		return $result;
    	  	}else {
    	  		echo "Error!!";
    	  		return false;
    	  	}
    	}
    }
	function getProfilePic($arrArg=array())	{
		$ob=new DbConnection();
		$sql="select p.path from photo p join personal_profile pp where pp.user_id='";
		$sql.=$arrArg['id']."' and pp.profile_pic_id=p.id  ";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return ROOTPATH.$row['path'];
	}
	function fetchName($arrArg=array()) {
		
		if($arrArg) {
			$ob=new DbConnection();
			$sql="select p.first_name,p.last_name from personal_profile as p join users as u on u.user_id=p.user_id where u.user_id=".$arrArg['id'].";";
			$res=$ob->executeSQL($sql);
			$row=mysql_fetch_array($res);
			$result=@$row['first_name']." ".@$row['last_name'];
			return $result;
		} else {
			//echo "No Id Passed..";
			return false;
		}
	}
}