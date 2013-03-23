<?php
include_once 'class/dbAcess.php';

class personalprofile {


function __construct()
	{
	
	}
function loadProfile($arrArgs=array()) {
 $ob=new DbConnection();
	$arrData=array("bhanu"=>"yello");
	$id=$arrArgs['id'];
	
	$sql=" SELECT first_name,last_name,DOB,contact_no,gender,email,about_myself,relationship_status,intersted_in,favourite_book,favourite_movies,favourite_food FROM personal_profile WHERE user_id='$id' ";
	$res=$ob->executeSQL($sql);
	$row=mysql_fetch_array($res);
	
	$sql1="SELECT company_Name,current_job,position  FROM experience WHERE user_id='$id'";
	$res1=$ob->executeSQL($sql1);
	$row1[]=mysql_fetch_array($res1);
	/* while($row1[]=mysql_fetch_array($res1))
	{
	
	
	} */
	$sql2="SELECT house_number,street_number,street_name,city,state,country FROM address WHERE user_id='$id'";
	$res2=$ob->executeSQL($sql2);
	$row2=mysql_fetch_array($res2);
	/* while($row2[]=mysql_fetch_array($res2))
	{
	
	
	} */
	$arrData=array(
			  'personal'=>$row,	
			  'experience'=>$row1,
			  'address'=>$row2,
	);
	
	//print_r($arrData);
		return $arrData;
}



}




?>