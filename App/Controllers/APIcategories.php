<?php 
namespace App\Controllers;
use App\Models;
use App\Includes;
use App\Messanger;
class APIcategories extends API
{
	public function __construct(){
		parent::__construct();
		$this->setHeaders(['Content-Type: application/json']);
		$this->model = new Models\APIcategoriesmodel(Includes\DB::getConnection());
	}

	public function getCategories(){
		if($this->request_method !=='GET')return 0;
		if(isset($_GET['articlecount'])){
			$param = $_GET['articlecount'];
			Messanger\Messanger::getResponse($this->headers,json_encode($this->model->getCategories($param),JSON_UNESCAPED_UNICODE));
		}
		else{
			Messanger\Messanger::getResponse($this->headers,json_encode($this->model->getCategories(),JSON_UNESCAPED_UNICODE));
		}

	}

	public function getCategory(){
		if($this->request_method!=='GET')return 0;
		if(!isset($_GET['id']))return 0;
		$cat_id = $_GET['id'];
		Messanger\Messanger::getResponse($this->headers,json_encode($this->model->getCategory($cat_id),JSON_UNESCAPED_UNICODE));
	}
}



 ?>