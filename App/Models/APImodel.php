<?php 
namespace App\models;

abstract class APImodel
{
	protected $connection;


	public function __construct($connection){
		$this->connection = $connection;

	}

}




 ?>