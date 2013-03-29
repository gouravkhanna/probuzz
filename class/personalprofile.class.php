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

function upCon($arrArgs=array()){
	$ob=new DbConnection();

 $id=$_SESSION['id'];
 $house_number=$arrArgs['houseNumber'];
 $street_number=$arrArgs['street_number'];
 $street_name=$arrArgs['street_name'];
 $city=$arrArgs['city'];
 $state=$arrArgs['state'];
 $country=$arrArgs['country'];
   $sql = "UPDATE probuzz.address SET
           house_number='$house_number', 
           street_number = '$street_number',
           street_name='$street_name',
           state='$state',
           city='$city',
           country='$country'
           WHERE user_id='$id'";
   
   echo $sql;
    if( $ob->executeSQL($sql)){
    	echo "updated sucessfully";
    	return true;
    }
    else{


    	echo "some problem is occured please contact gourav";
    	return  false;
    }
}



function upInfo($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$favourite_book=@$arrArgs['fav_book'];
$favourite_movies=@$arrArgs['fav_movies'];
$favourite_food=@$arrArgs['fav_food'];
echo "xxx";
echo $favourite_food. $favourite_book .$favourite_movies;
$sql="update probuzz.personal_profile set 
      favourite_book='$favourite_book',
      favourite_movies='$favourite_movies',
      favourite_food ='$favourite_food'
      where user_id='$id'";
      if( $ob->executeSQL($sql)){
    	echo "updated sucessfully";
    	return true;
    }
    else{


    	echo "some problem is occured please contact gourav";
    	return  false;
    }


}

function upbInfo($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$gender=$arrArgs['gender'];
$relationship_status=$arrArgs['relationship_status'];
$dob =$arrArgs['dob'];
$intersted_in=$arrArgs['i_in'];
$sql="update probuzz.personal_profile set
      DOB='$dob',
      gender='$gender',
      relationship_status='$relationship_status',
      intersted_in='$intersted_in'
      where user_id='$id' ";
  if( $ob->executeSQL($sql)){
    	echo "updated sucessfully";
    	return true;
    }
    else{


    	echo "some problem is occured please contact gourav";
    	return  false;
    } 




}

function up_Work($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$company_Name=$arrArgs['company'];
$start_date=$arrArgs['start_date'];
$end_date=$arrArgs['end_date'];
$position=$arrArgs['position'];
$sql="update probuzz.experience set
      company_Name='$company_Name',
      start_date='$start_date',
      end_date='$end_date',
      position='$position'
      where user_id='$id' ";
      echo $sql;
if( $ob->executeSQL($sql)){
    	echo "updated sucessfully";
    	return true;
    }
    else{


    	echo "some problem is occured please contact gourav";
    	return  false;
    } 



}


function up_E($arrArgs=array()){
$ob=new DbConnection();
$id=$_SESSION['id'];
$institute=$arrArgs['institute'];
$start_year=$arrArgs['start_year'];
$end_year=$arrArgs['end_year'];
$university=$arrArgs['university'];
$sql="update probuzz.qualification set
       institute='$institute',
       start_year='$start_year',
        end_year='$end_year',
        university='$university'
        where user_id='$id'";
        echo $sql;
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




?>