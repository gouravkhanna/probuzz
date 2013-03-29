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
		$ob=new DbConnection();
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
	function getId($userName)	{
		$data['tables']	= 'users';
		$data['columns']= array('users.user_id');
		$data['conditions']=array("users.user_name"=>"$userName");
		$result=$this->db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
 		return $row['user_id'];
	}
	function getUserName($userId) 	{
		$data['tables']	= 'users';
		$data['columns']= array('users.user_name');
		$data['conditions']=array("users.user_id"=>"$userId");
		$result=$this->db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
 		return $row['user_id'];
	}
	function getData($key,$where,$id)
	{
		$ob=new DbConnection();
		$sql="select $key from users where $where='$id'";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return $row['$key'];
	}
	function getProfilePic($arrArg=array())
	{
		
		$ob=new DbConnection();
		$sql="select p.path from photo p join personal_profile pp where pp.user_id='".$arrArg['id']."' and pp.profile_pic_id=p.id  ";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return ROOTPATH.$row['path'];
	}
	
	
	function getType()
	{
	}
	function addUser()
	{
	}
	function updateUserStatus($status)
	{
		
	}
	function logout($id)
	{
		$_SESSION['id']="";
		unset($_SESSION['id']);
	}
	
	

	function register($arrData=array())
	{
		
		$this->userName=$arrData['userName'];
		$this->password=$arrData['password'];
		$this->firstName=$arrData['firstName'];
		$this->lastName=$arrData['lastName'];
		$this->email=$arrData['email'];
		$ob=new DbConnection();
		
//echo "$this->userName,$this->password,$this->lastName,$this->email,$this->firstName";
			if(empty($this->userName) && empty($this->password) && empty($this->lastName) && empty($this->email) && empty($this->firstName))
			{
				echo "<script> alert('please fill all the values'); </script>";
			}
			else
			{
				$sql="select user_name from users where user_name='$this->userName'";
				$res=$ob->executeSQL($sql);
				$row=mysql_fetch_array($res);
				if($row['user_name']==$this->userName)
				{
					echo "user already exist";		
					return false;		
				}
				else
				{
					//Registration for Corpoarte User will be done by Admin or by a Seprate Registration Page!
					$ob->executeSQL("call insertuser1('$this->userName','$this->password','$this->firstName','$this->lastName','$this->email','0')") or die(mysql_error());	
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
				
				
		// if*/
}
	function search($arrArgs=array()) {
		$ob=new DbConnection();
		
		/*User Search
		 * BAsed on user name
		 *  $arrArgs['user']==true */
		$search=explode(" ",$arrArgs['searcharg']);
		$row=array();
		$row3=array();
		$row2=array();
		$row1=array();	
		$sql="select p.user_id as id,p.first_name,p.last_name,pp.path from personal_profile p join users u join photo pp where p.user_id=u.user_id AND p.profile_pic_id=pp.id AND (";
		foreach ($search as $value) {
			if($value!="")
			$sql.=" u.user_name like '$value%' OR";
		}
		$sql=rtrim($sql,"OR");
		$sql.=" )";
		$result=$ob->executeSQL($sql);
		if($result) {
					while($row1[]=mysql_fetch_array($result)) {}
		}
	
		/*Based on First and Last Name */
		$sql="select p.user_id as id,p.first_name,p.last_name,pp.path from personal_profile p join photo pp where p.profile_pic_id=pp.id AND (";
		foreach ($search as $value) {
			if($value!="")
				$sql.=" p.first_name like '$value%' OR p.last_name like '$value%' OR";
		}
		$sql=rtrim($sql,"OR");
		$sql.=" )";
	
		$result=$ob->executeSQL($sql);
		if($result) {
			while($row2[]=mysql_fetch_array($result)) {}
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
		
		$result=$ob->executeSQL($sql);
		if($result) {
			while($row3[]=mysql_fetch_array($result)) {	}
		}
		$row=array(
				"username"=>$row1,
				"name"=>$row2,
				"company"=>$row3,
				);
		return $row;	 	
	}
	function topjobs() {
		$ob=new DbConnection();
		$sql="select j.id,c.user_id,j.designation,j.location,c.company_name,p.path ";
		$sql.=" from probuzz.jobs j  join corporate_profile c join photo p ";
		$sql.=" where c.user_id=j.corp_id AND c.profile_pic_id=p.id AND j.status='1' ";
		$sql.=" order by created_date desc";
		$result=$ob->executeSQL($sql);
		if($result) {
			return $result;
		}
	}

	/* For search people */
	function showSearchJobs($arrArgs=array()) {
		if(!empty($arrArgs)) {
			$ob=new DbConnection();
			$sql="SELECT j.id as jobid,j.designation, DATE_FORMAT(j.start_date, ";
			$sql.="'%M %D, %Y'".") as startdate,DATE_FORMAT(j.last_date, '%M %D, %Y') as lastdate ";
			$sql.=",j.location, j.experience, c.company_name ";
			$sql.=" from jobs j JOIN corporate_profile c 
				on 
					c.user_id=j.corp_id
				where
					j.status='1' ";
			$cond=" AND (salary>='".$arrArgs['minsal']."' AND salary<='".$arrArgs['maxsal']."') ";
			$cond.= " AND (designation like '%".$arrArgs['designation']."%' ";
			$cond.=" ";
			//echo $sql;
			$res=$ob->executeSQL($sql);
			if($res) {
				while($row[]=mysql_fetch_array($res)) { 
				}
				return $row;
			}
			else {
				return "Can't Fetch Friend Right Now! Please Try Again! ";
			}
			
				
			
		}
	}
	/*to check whether user applied for Job or not(Apply job Button)*/
	function getJobAppStatus($arrArgs=array()) {
		if(!empty($arrArgs)) {
			$id=$arrArgs['id'];
			$jobId=$arrArgs['jobId'];
			$sql="select id from job_applicant where status='1' AND user_id='$id' AND job_id='$jobId'";
			$ob=new DbConnection();
			$result=$ob->executeSQL($sql);
			if($result) {
				$row=mysql_fetch_array($result);
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
			$sql="Insert into probuzz.job_applicant values('','$id','$jobId','1',now(),'','')";
			$ob=new DbConnection();
			$result=$ob->executeSQL($sql);
			if($result) {
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
				$ob=new DbConnection();
				$result=$ob->executeSQL($sql);
				while($row[]=mysql_fetch_array($result)) {}
				return $row;
			}
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