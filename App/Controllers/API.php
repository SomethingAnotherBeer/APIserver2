<?php 
namespace App\Controllers;


abstract class API
{
	protected $request_method;
	protected $headers = [];
	protected $model;

	public function __construct(){
		$this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	protected function setHeaders(array $params){
		foreach($params as $param){
			$this->headers[]=$param;
		}
	}

	
	
}



 ?>