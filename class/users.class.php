<?php
include_once 'class/dbAcess.php';
//session_start();
class users extends DbConnection
{
	private $userName="";
	private $password="";
	private $type="";
	private $firstName="";
	private $lastName="";
	private $email="";

	function __construct() {
		parent::__construct();	
	
	}
	function login($arrData=array())
	{
		$this->userName=$arrData['user_name'];
		$this->password=$arrData['password'];
		$flag=0;
		if(empty($this->userName) && empty($this->password))
			{
				return false; 
			}	
	 		else
		   {	
				$data= array();
				$data['tables']	= 'users';
				$data['columns']= array('users.user_name','users.password','users.type');
				$data['conditions']=array("users.user_name"=>"$this->userName");
				$result=$this->db->select($data);
				$row = $result->fetch(PDO::FETCH_ASSOC);
				if($row['user_name']==$this->userName && $row['password']==$this->password) {
				  	  $this->type=$row["type"];
					  $flag=1;
				}
			}
	       if($flag==1) {
				$_SESSION['id']=$this->getId($this->userName);
				$_SESSION['user_name']=$this->userName;
				$_SESSION['type']=$this->type;
				return true;
			}
			else {
		  		return false;
			}
	}
	function getId($userName="")	{
		if($userName!="") {
		$data['tables']	= 'users';
		$data['columns']= array('users.user_id');
		$data['conditions']=array("users.user_name"=>"$userName");
		$result=$this->db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
 		return $row['user_id'];
		}
	}
	function getUserName($userId="") 	{
		if($userId!="") {
		$data['tables']	= 'users';
		$data['columns']= array('users.user_name');
		$data['conditions']=array("users.user_id"=>"$userId");
		$result=$this->db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
 		return $row['user_name'];
		}
	}
	
	function getProfilePic($arrArg=array())
	{
	
		$data['tables']	= 'photo';
		$data['columns']= array('photo.path');
		$data['conditions']=array("personal_profile.user_id"=>$arrArg['id']);
		$data['joins'][] = array(
			'table' => 'personal_profile',  
			'type'	=> 'INNER',
			'conditions' => array('photo.id' => 'personal_profile.profile_pic_id')
		);
		$result=$this->db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);		
		//$sql="select p.path from photo p join personal_profile pp where pp.user_id='".."' and pp.profile_pic_id=p.id  ";
		return ROOTPATH.$row['path'];
		
	}
		
	function logout($id)
	{
		$_SESSION['id']="";
		unset($_SESSION['id']);
	}
	
	function register($arrData=array())
	{
		//if(empty($arrData)) {
		$this->userName=$arrData['userName'];
		$this->password=$arrData['password'];
		$this->firstName=$arrData['firstName'];
		$this->lastName=$arrData['lastName'];
		$this->email=$arrData['email'];
				
//echo "$this->userName,$this->password,$this->lastName,$this->email,$this->firstName";
			if(empty($this->userName) && empty($this->password) && empty($this->lastName) && empty($this->email) && empty($this->firstName))
			{
				echo "<script> alert('please fill all the values'); </script>";
			}
			else
			{
			///	$sql="select user_name from users where user_name='$this->userName'";
				$data=array();
				$data['tables']='users';
				$data['columns']=array('user_name');
				$data['conditions']=array('user_name'=>"$this->userName");
				$res=$this->db->select($data);
				$row=$res->fetch(PDO::FETCH_ASSOC);
				if($row['user_name']==$this->userName)
				{
					echo "user already exist";		
					return false;		
				}
				else
				{
					//Registration for Corpoarte User will be done by Admin or by a Seprate Registration Page!
				$this->executeSQLP("call insertuser1('$this->userName','$this->password','$this->firstName','$this->lastName','$this->email','0')") or die(mysql_error());	
				/*$sql="insert into users (user_name,password) values ('$this->userName','$this->password')" or die("ssss");
				$ob->executeSQL($sql);
				$iid=$this->getId($this->userName);	
				$s2="insert into professional_profile (user_id) values ('$iid')";
				$ob->executeSQL($s2);
			   $s1="insert into personal_profile(user_id,first_name,last_name,email) values('$iid','$this->firstName','$this->lastName','$this->email')" or die("error on page");
				$ob->executeSQL($s1);*/
				$arrArgs= array(
					'user_name' =>$arrData['userName'],
					'password' =>$arrData['password'],
				);
				$this->login($arrArgs);	
				return true;
				} //else
			}
		//}
				
				
		// if*/
}
	function search($arrArgs=array()) {
		
		/*User Search
		 * BAsed on user name
		 *  $arrArgs['user']==true */
		$search=explode(" ",$arrArgs['searcharg']);
		$row=array();
		$row3=array();
		$row2=array();
		$row1=array();	
		$sql="select p.user_id as id,p.first_name,p.last_name,pp.path 
				from 
				personal_profile p 
				join users u 
				on p.user_id=u.user_id
		        join photo pp 
				on p.profile_pic_id=pp.id
		        where
				 u.type=1 AND (";
		/*
		$data['tables']	= 'personal_profile p';
		$data['columns']= array('p.user_id as id','p.first_name','p.last_name','pp.path');
		$data['joins'][] = array(
				'table' => 'users u',
				'type'	=> 'INNER',
				'conditions' => array('p.user_id' => 'u.user_id')
		);
		$data['joins'][] = array(
				'table' => 'photo pp',
				'type'	=> 'INNER',
				'conditions' => array('p.profile_pic_id' => 'pp.id')
		);
		$data['conditions'][]=array("personal_profile.user_id"=>$arrArg['id']);
		//$data['conditions'][]=array("u.user_name like"=>$value%);
		*/
		foreach ($search as $value) {
			if($value!="")
			$sql.=" u.user_name like '$value%' OR";
		}
		$sql=rtrim($sql,"OR");
		$sql.=" )";
		$result=$this->executeSQLP($sql);
		if($result) {
					while($row1[]=$result->fetch(PDO::FETCH_ASSOC)) {}
		}
	
		/*Based on First and Last Name */
		$sql="select p.user_id as id,p.first_name,p.last_name,pp.path from personal_profile p join photo pp where p.profile_pic_id=pp.id AND (";
		foreach ($search as $value) {
			if($value!="")
				$sql.=" p.first_name like '$value%' OR p.last_name like '$value%' OR";
		}
		$sql=rtrim($sql,"OR");
		$sql.=" )";
	
		$result=$this->executeSQLP($sql);
		if($result) {
			while($row2[]=$result->fetch(PDO::FETCH_ASSOC)) {}
		}
		/*Based on Company Name */
		$sql="select c.user_id as id,c.company_alias,c.company_name,pp.path from corporate_profile c join photo pp where c.profile_pic_id=pp.id AND ( ";
		
		foreach ($search as $value) {
			if($value!="") {
				$sql.=" c.company_name like '$value%' OR";
			}
		}
		$sql=rtrim($sql,"OR");
		$sql.=" )";
		
		$result=$this->executeSQLP($sql);
		if($result) {
			while($row3[]=$result->fetch(PDO::FETCH_ASSOC)) {	}
		}
		$row=array(
				"username"=>$row1,
				"name"=>$row2,
				"company"=>$row3,
				);
		return $row;	 	
	}
	function topjobs() {
		
		$data['tables']	= 'jobs j';
		$data['columns']= array(
				'j.id','c.user_id','j.designation',
				'j.location','c.company_name','pp.path'
				);
		$data['joins'][] = array(
				'table' => 'corporate_profile c',
				'type'	=> 'INNER',
				'conditions' => array('j.corp_id' => 'c.user_id')
		);
		$data['joins'][] = array(
				'table' => 'photo pp',
				'type'	=> 'INNER',
				'conditions' => array('c.profile_pic_id' => 'pp.id')
		);
		$data['conditions']=array('j.status'=>'1');
		$data['order']="created_date desc";
		/*$sql="select j.id,c.user_id,j.designation,j.location,c.company_name,p.path ";
		$sql.=" from probuzz.jobs j  join corporate_profile c join photo p ";
		$sql.=" where c.user_id=j.corp_id AND c.profile_pic_id=p.id AND j.status='1' ";
		$sql.=" order by created_date desc";
		//$result=$ob->executeSQL($sql);
		echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";
		*/
		$result=$this->db->select($data);
		if($result) {
			return $result;
		}
	}

	/* For search Search Jobs */
	function showSearchJobs($arrArgs=array()) {
		if(!empty($arrArgs)) {
			$sql="SELECT j.id as jobid,j.designation, DATE_FORMAT(j.start_date, ";
			$sql.="'%M %D, %Y'".") as startdate,DATE_FORMAT(j.last_date, '%M %D, %Y') as lastdate ";
			$sql.=",j.location, j.experience, c.company_name ";
			$sql.=" from jobs j JOIN corporate_profile c 
				on 
					c.user_id=j.corp_id
				where
					j.status='1' ";
			$cond="";
			if ($arrArgs['minsal']!="") {
				$cond.=" AND ( j.salary_expected>='".$arrArgs['minsal']."' ) "; 
			}	
			if ($arrArgs['maxsal']!="") {
				$cond.=" AND ( j.salary_expected<='".$arrArgs['maxsal']."' ) ";
			}
			if($arrArgs['designation']!="") {
				$cond.= " AND (designation like '%".$arrArgs['designation']."%' ) ";
			}
			$cond.=" ";
			if(!empty($arrArgs['location'])) {
				$cond.=" AND (";
				foreach ($arrArgs['location'] as $val) {
					$cond.=" j.location like '%$val%' OR ";	
				}
				$cond=rtrim($cond,"OR ");
				$cond.=" ) ";
			}
			if($arrArgs['experiance']=="") {
				
			}
			else if($arrArgs['experiance']=="Fresher") {
				$cond.= "AND ( j.experience like 'fresher' OR 
				  		j.experience like '0%' ) ";
			}
			else if($arrArgs['experiance']=="12+ years") {
				$cond.= "AND ( j.experience > '12' ) ";  
			}
			else {
				$cond.= "AND ( j.experience like '%".$arrArgs['experiance']."%' ) ";
			}
			$sql=$sql.$cond;
			$res=$this->executeSQLP($sql);
			if($res) {
				while($row[]=$res->fetch(PDO::FETCH_ASSOC)) { 
				}
				return $row;
			}
			else {
				return "Can't Search! TryAgain! ";
			}
			
				
			
		}
	}
	/*to check whether user applied for Job or not(Apply job Button)*/
	function getJobAppStatus($arrArgs=array()) {
		if(!empty($arrArgs)) {
			$id=$arrArgs['id'];
			$jobId=$arrArgs['jobId'];
		/*	$sql="select id from job_applicant 
			where status='1' 
			AND
			user_id='$id' AND job_id='$jobId'";
			*/
			$data['tables']	= 'job_applicant';
			$data['columns']= array('id');
			$data['conditions']=array("status"=>'1',
					"user_id"=>$id,
					"job_id"=>$jobId,					
					);
			$result=$this->db->select($data);
			
			
			if($result) {
				$row=$result->fetch(PDO::FETCH_ASSOC);
				if(!empty($row)) { //if applcant is registred
					return true;
				}
				else { //if applicant is not registered					
					return false;
				}
				
			} else {
				//if there is error in query 
				echo "oops Error PLease Try Again Later";
				return false;
			}
		}
	}
	/* Apply for job  */
	function applyJob($arrArgs=array()) {
		if(!empty($arrArgs)) {
			$id=$arrArgs['id'];
			$jobId=$arrArgs['jobId'];
	//		$sql="Insert into probuzz.job_applicant values('','$id','$jobId','1',now(),'','')";
		//	`user_id`, `job_id`, `status`, `appliying_date`, `remarks`, `applcaition_review`
			$data=array(
					"user_id"=>$id,
					"job_id"=>$jobId,
					"status"=>'1',
					"appliying_date"=>"now()",
					"remarks"=>'',
					"applcaition_review"=>''
					);
			$result=$this->db->insert("job_applicant",$data);
				
				
			if($result && $result->rowCount()>0) {
				return true;
			}
			else {
				return false;
			}
		}		
	}
	/*SHow all the Jobs Applied  */
	function displayApplication($arrArgs=array()) {
			if(!empty($arrArgs)) {
				$id=$arrArgs['id'];
				$sql="select c.company_name, j.id , ja.appliying_date,j.designation,j.location
 				from job_applicant ja join jobs j 
					on ja.job_id=j.id 
					join corporate_profile c 
					on c.user_id=j.corp_id 
				where ja.user_id='$id'";
				$data['tables']	= 'job_applicant ja';
				$data['columns']= array('c.company_name','j.id','ja.appliying_date','j.designation','j.location');
				$data['conditions']=array("ja.user_id"=>$id,
										 );
				$data['joins'][] = array(
						'table' => 'jobs j',
						'type'	=> 'INNER',
						'conditions' => array('ja.job_id' => 'j.id')
				);
				$data['joins'][] = array(
						'table' => 'corporate_profile c',
						'type'	=> 'INNER',
						'conditions' => array('c.user_id'=>'j.corp_id')
				);
				$result=$this->db->select($data);
								
				if($result) {
					while ($row[]=$result->fetch(PDO::FETCH_ASSOC)) {}
					return $row;
				}
				else {
					return false;
				}
					 
			}
	}
	
	/**/
	function PDOChecker() {
		echo $this->getProfilePic(array("id"=>'2'));
		echo "<br/>";
		echo $this->getUserName('2');
		echo $this->getId('g');
		
	}
	// Function for server side validation
	function validate($arrData=array())
	{
		$ob=new DbConnection();
		$this->firstName=$arrData['firstName'];
		$this->lastName=$arrData['lastName'];
		$this->password=$arrData['password'];
		$this->userName=$arrData['userName'];
		$this->email=$arrData['email'];
		
			if (eregi('^[A-Za-z0-9 ]{2,20}$',$this->firstName))
			{
				$valid_firstname=$this->firstName;
			}
			else
			{
				$error_firstname='Enter valid Name.';
			}
			

			if (eregi('^[A-Za-z0-9 ]{2,20}$',$this->lastName))
			{
				$valid_lastname=$this->lastName;
			}
			else
			{
				$error_lastname='Enter valid Name.';
			}
			if (eregi('^[A-Za-z0-9_]{3,20}$',$this->userName))
			{
				$valid_username=$this->userName;
			}
			else
			{
				$error_username='Enter valid Username min 3 Chars.';
			}
			if (eregi('^[A-Za-z0-9!@#$%^&*()_]{6,20}$',$this->password))
			{
				$valid_password=$this->password;
			}
			else
			{
				$error_password='Enter valid Password min 6 Chars.';
			}
				
			if (eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$', $this->email))
			{
				$valid_email=$this->email;
			}
			else
			{
				$error_email='Enter valid Email.';
			}
			if((strlen($valid_firstname)>0)&&(strlen($valid_email)>0)
			&&(strlen($valid_username)>0)&&(strlen($valid_password)>0))
			{
				return true;
			}
			else{ 
				
				return false;
			}
			
			
			
			
			
		
		
		
	}
	
	
}

?>