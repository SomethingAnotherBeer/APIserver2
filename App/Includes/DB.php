<?php 
namespace App\Includes;

class DB
{
	private static $connection;
	private static $couter = 0;

	public static function setConnection($host,$dbname,$user,$password){
		if(self::$couter>0)return 0;

		self::$connection = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password);
		self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		self::$couter++;
	}

	public static function getConnection(){
		return self::$connection;
	}
}



 ?>