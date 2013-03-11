<?php
include 'class/dbAcess.php';
//session_start();
class users
{
	private $userName="";
	private $password="";
	private $type="";
	private $firstName="";
	private $lastName="";
	private $email="";

	function __construct()
	{
	
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
				$sql="select user_name ,password,type from users where user_name='$this->userName'";
			    $result=$ob->executeSQL($sql);
				$row=mysql_fetch_array($result);
								
				if($row['user_name']==$this->userName) //)&& ($p==$password))
				{
				  	  $this->type=$row["type"];
					  $flag=1;
				}
					
		   }
	       if($flag==1)
	 		{
				$_SESSION['id']=$this->getId($this->userName);
				$_SESSION['user_name']=$this->userName;
				$_SESSION['type']=$this->type;
				return true;
			}
			else
			{
		  		return false;
			}
		 
	 
	
	}
	function getId($userName)
	{
		$ob=new DbConnection();
		$sql="select user_id from users where user_name='$userName'";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return $row['user_id'];
	}
	function getUserName($user_id)
	{
		
		$ob=new DbConnection();
		$sql="select user_name from user where user_name='$user_id'";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return $row['user_name'];
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
	
	/*function validate($first_name,$last_name,$email,$password)
	{
		$ob=new DbConnection();
		if(@$_REQUEST["submit"])
		{
			if ($first_name != "") 
			    {
				$first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
				     if ($first_name == "") 
				    	 {
						echo "Please enter a valid name.<br/><br/>";
				   		  }
		    	} 
		    	else {
				echo "Please enter your name.<br/>";
					}
			
			
			
			
				}
		
		
		
			}	*/
	
}

?>