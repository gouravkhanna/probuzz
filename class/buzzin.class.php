<?php
include_once 'class/dbAcess.php';
class buzzin
{


function __construct()
	{
	
	}
	function loadBuzz($arrArg){
		$id=$arrArg['id'];
  $ob= new DbConnection();
 // $id=$_SESSION['id'];


  $sql="select b.user_id as id,b.buzztext,p.first_name,p.last_name,photo.path, b.buzz_time
         from 
         buzz b 
         join personal_profile p 
         on p.user_id=b.user_id 
         join photo 
         on photo.id=p.profile_pic_id 
         where 
         ( b.user_id='$id' 
         OR 
         b.user_id in 
	     (select f.friend_id from friend f where f.user_id='$id') )
       	 order by buzz_time desc";
  $arrData=$ob->executeSQL($sql);


return $arrData;


	}

function buzzUpdate($arrArgs=array()) {

$ob= new DbConnection();
$buzztext=$arrArgs['buzztext'];
$id=$arrArgs['id'];

$sql="insert into probuzz.buzz (user_id,buzztext) values($id,'$buzztext')";

if($ob->executeSQL($sql)){
	
	echo "updated successfully";
 return true;

}
else {
	return false;
	} 

	
}



}


?>