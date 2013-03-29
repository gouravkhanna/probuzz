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


  $sql="select b.user_id as id,b.id as buzz_id,b.buzztext,p.first_name,p.last_name,photo.path, b.buzz_time
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
		$result=$ob->executeSQL($sql);
		 while($row=mysql_fetch_assoc($result)) {
		 	$row2=array(); 	
			$buzzId=$row['buzz_id'];
			$sql1="select comment_text from probuzz.comment where buzz_id='$buzzId'";
			$res=$ob->executeSQL($sql1);
			while($row2[]=mysql_fetch_assoc($res)) {	
				
			}
			$buzz[]=array(
					"buzz"=>$row,
					"comment"=>$row2,
					
			);
		//	echo "<pre>";
	//	print_r($buzz);
		
		}
		
		
		
		return $buzz;


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
function insertComment($arrArgs=array()) {
	$ob= new DbConnection();
	if(!empty($arrArgs)) {
	
		$id=$arrArgs['id'];
		$comment_text=$arrArgs['comment_text'];
		$buzz_id=$arrArgs['buzz_id'];
		
		 $sql="INSERT INTO probuzz.comment ( user_id,buzz_id,comment_time, comment_text) 
		VALUES ( '$id', '$buzz_id', now(),'$comment_text')";
		  if($ob->executeSQL($sql)){
		 
		 
		 	return true;
		 
		 }
		 else {
		 	return false;
		 }
		 	
		
		
	}
	
}


}


?>