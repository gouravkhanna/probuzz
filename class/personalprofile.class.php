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
	
	$sql=" SELECT first_name,last_name,DOB,contact_no,gender,email,
	      about_myself,relationship_status,intersted_in,
	      favourite_book,favourite_movies,favourite_food 
	      FROM personal_profile WHERE user_id='$id' ";
	$res=$ob->executeSQL($sql);
	$row=mysql_fetch_array($res);
	
	$sql1="SELECT company_Name,current_job,position  FROM 
	       experience WHERE user_id='$id'";
	$res1=$ob->executeSQL($sql1);
	$row1=mysql_fetch_array($res1);
	
	$sql2="SELECT house_number,street_number,street_name,
	       city,state,district,country FROM address 
	        WHERE user_id='$id'";
	$res2=$ob->executeSQL($sql2);
	$row2=mysql_fetch_array($res2);
	
	$sql3="SELECT institute ,university from qualification
	        WHERE user_id='$id' ";

	$res3=$ob->executeSQL($sql3);
	$row3=mysql_fetch_array($res3);        
	$arrData=array(
			  'personal'=>$row,	
			  'experience'=>$row1,
			  'address'=>$row2,
			  'education'=>$row3,
	);
	
	
		return $arrData;
}

function updateCon($arrArgs=array()){
	$ob=new DbConnection();

 $id=$_SESSION['id'];
 $house_number=$arrArgs['house_number'];
 $street_number=$arrArgs['street_number'];
 $street_name=$arrArgs['street_name'];
 $city=$arrArgs['city'];
 $state=$arrArgs['state'];
 $country=$arrArgs['country'];
  if($_GET['subCon']){

   $sql = "UPDATE probuzz.address SET
           house_number='$house_number', 
           street_number = '$street_number',
           street_name='$street_name',
           state='$state',
           city='$city',
           country='$country'
           WHERE user_id='$id'";
    if( $ob->executeSQL($sql)){
    	echo "updated sucessfully";
    	return true;
    }
    else{


    	echo "some problem is occured please contact gourav";
    	return  false;
    }






  }




}

}




?>