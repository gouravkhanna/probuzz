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

 $sql="select p.first_name,p.last_name, b.buzztext,b.update_time ,c.path from personal_profile p join buzz b 
       join photo c on p.user_id=b.user_id and c.user_id=p.user_id and b.user_id='$id'
       order by update_time desc limit 10 ";
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


function friendBuzz(){
	$ob= new DbConnection();	
	$sql="select f.friend_id,b.buzztext from friend as f join buzz 
	      as b on f.friend_id=b.user_id where f.user_id='$id' order by b.update_time desc";
	$arrData=$ob->executeSQL($sql);
	while($res=mysql_fetch_array($arrData))
	{
		
		
		
	}
	
	//return $arrData;
	
}


}


?>