<?php
	//Connection with database! give username and file yourself
	/*
		Include this code to top of every page
 		<?php require 'dbAcess.php'?>
	*/
	class DbConnection
	{
		private $connection;
		private $hostName;
		private $user;
		private $password;
		public function DbConnection()
		{
			$this->hostName='localhost';
			$this->user='root';
			$this->password='1';
		}
		private function dbConnect()
		{
		//	echo "$this->hostName"."$this->user"."$this->password";
			$this->connection=mysql_connect("$this->hostName","$this->user","$this->password") or die(mysql_error()."1");
			mysql_select_db('probuzz') or die(mysql_error());
		}
		public function executeSQL($sql)
		{
			$ob=new DbConnection();
			$this->dbConnect();
			$result=mysql_query($sql);
			$this->dbDisconnect();
			return $result;
		}
		private function pdoConnect()
		{
			
		}
		private function dbDisconnect()
		{
			//code for Disconnecting with DB	
		}
		
	}
	
	// for testing DataBase
/*	$ob=new DbConnection();
			$ob->executeSQL($sql);
*/	
/*	$res=mysql_query("select * from user");

	while($row=mysql_fetch_array($res)){
	echo  $row['userID']."</br>";
	}
*/
?>
