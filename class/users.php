<?php
include 'class/dbAcess.php';
//session_start();
class users
{
	
	function __construct()
	{
	
	}
	function login($userName,$password)
	{
		$ob=new DbConnection();
		$flag=0;
		if(@$_REQUEST["submit"])
		{
			if(empty($userName) && empty($password))
			{
				echo "<script> alert('*Enter user id/Password'); </script>";	
			}	
	 		else
		   {
				$sql="select user_name ,password,type from users where user_name='$userName'";
			    $result=$ob->executeSQL($sql);
				 while($row=mysql_fetch_array($result))
				{
					$u=$row["user_name"];
					$p=$row["password"];
					
				  if(($u==$userName) && ($p==$password))
				  {
				  	$type=$row["type"];
					  $flag=1;
					  break;
			 	  }
					
		   }
	       if($flag==1)
	 		{
				$_SESSION['id']=$this->getId($userName);
				$_SESSION['user_name']=$userName;
				$_SESSION['type']=$type;
				return true;
			}
		else
		{
	  		 echo "<script> alert('User Does not exist')</script>;";
			 return false;
		}
	 
	 }
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
	function getProfilePic($id)
	{
		
		$ob=new DbConnection();
		$sql="select p.path from photo p join personal_profile pp where pp.user_id='$id' and pp.profile_pic_id=p.id  ";
		$res=$ob->executeSQL($sql);
		$row=mysql_fetch_array($res);
 		return $row['path'];
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
	
	function validate($first_name,$last_name,$email,$password)
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
		    	} else {
				echo "Please enter your name.<br/>";
			}
			
			
			
			
		}
		
		
		
	}
	
}

?>