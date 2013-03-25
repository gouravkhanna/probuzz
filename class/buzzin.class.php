<?php
include_once 'class/dbAcess.php';
class buzzin
{


function __construct()
	{
	
	}
	function loadBuzz(){
  $ob= new DbConnection();





	}

function buzzUpdate($arrArgs=array()) {

$ob= new DbConnection();
$buzztext=$arrArgs['buzztext'];
$id=$arrArgs['id'];

$sql="insert into probuzz.buzz (user_id,buzztext) values('$id','$buzztext')";
echo $sql;
if($ob->executeSQL($sql))
{
 return true;

}
else {
	return false;
	} 

	
}

function buzzData() {
 $ob= new DbConnection();
 $id=1;
 $sql1="select p.first_name,p.last_name, b.buzztext ,c.path from personal_profile p join buzz b join photo c on p.user_id=b.user_id and c.user_id=p.user_id and b.user_id='$id'";
//echo $sql1;	
 $r1=$ob->executeSQL($sql1);
 //$p="/var/www/probuzz/trunk/";
	while($res=mysql_fetch_array($r1)){
 $pa=$res['path'];
// echo $pa;
      echo $pa."<img src='$pa' height='50px' width='50px'>";
		echo $res['first_name']." ". $res['last_name'];
		echo $res['buzztext']."<br>";
		
	}

	
 	
	
	
} 


}


?>