<?php



include 'data/pdo_lib/cxpdo/cxpdo.php';
include 'data/pdo_lib/cxpdo/mysql.php';
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
private $config=array();
public $db;
private function dbConnect()
{
//	echo "$this->hostName"."$this->user"."$this->password";
	$this->connection=mysql_connect("$this->hostName","$this->user","$this->password") or die(mysql_error()."1");
	mysql_select_db('probuzz') or die(mysql_error());
		}

		public function __construct(){
		//old -  Will be Depriciated
			$this->hostName='localhost';
			$this->user='root';
			$this->password='root';
			//New
			$this->config['user'] = 'root';
			$this->config['pass'] = 'root';
			$this->config['name'] = 'probuzz';
			$this->config['host'] = 'localhost';
			$this->config['type'] = 'mysql';
			$this->config['port'] = null;
			$this->config['persistent'] = true;
			$this->db = @db::instance($this->config);

		}
		public function executeSQL($sql)
		{
		$ob=new DbConnection();
		$this->dbConnect();
		$result=mysql_query($sql);
		$this->dbDisconnect();
		return $result;
		}
		public function executeSQLP($sql)
		{
		$result=$this->db->query($sql);
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

		public function __construct(){
		//old -  Will be Depriciated
			$this->hostName='localhost';
			$this->user='root';
			$this->password='root';
			//New
			$this->config['user'] = 'root';
			$this->config['pass'] = '';
			$this->config['name'] = 'probuzz';
			$this->config['host'] = 'localhost';
			$this->config['type'] = 'mysql';
			$this->config['port'] = null;
			$this->config['persistent'] = true;
			$this->db = @db::instance($this->config);

		}
		public function executeSQL($sql)
		{
		$ob=new DbConnection();
		$this->dbConnect();
		$result=mysql_query($sql);
		$this->dbDisconnect();
		return $result;
		}
		public function executeSQLP($sql)
		{
		$result=$this->db->query($sql);
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







	//Connection with database! give username and file yourself
	/*
		Include this code to top of every page
 		<?php require 'dbAcess.php'?>
	*/
/*	class DbConnection
	{
		private $connection;
		private $hostName;
		private $user;
		private $password;
		public function DbConnection()
		{
			$this->hostName='localhost';
			$this->user='root';
			$this->password='root';
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
