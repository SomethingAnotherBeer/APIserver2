<?php 
namespace App\Controllers;
use App\Models;
use App\Includes;
use App\Messanger;
class APIarticles extends API
{
	public function __construct(){
		parent::__construct();
		$this->setHeaders(['Content-Type: application/json']);
		$this->model = new Models\APIarticlesmodel(Includes\DB::getConnection());
	}


	public function getArticles(){
		if($this->request_method!=='GET')return 0;
		Messanger\Messanger::getResponse($this->headers,json_encode($this->model->getArticles(),JSON_UNESCAPED_UNICODE));

	}

	public function getArticle(){
		if($this->request_method!=='GET')return 0;
		if(!isset($_GET['id']))return 0;
		$id = $_GET['id'];
		Messanger\Messanger::getResponse($this->headers,json_encode($this->model->getArticle($id),JSON_UNESCAPED_UNICODE));
	}

	public function addArticle(){
		if($this->request_method!=='POST')return 0;
		$bodyrequest = file_get_contents("php://input");
		$bodyrequest = json_decode($bodyrequest,true);

		if(!$this->model->addArticle($bodyrequest)){
			$response = $this->createResponse('Ошибка запроса: Статьи не были добавлены','error','HTTP/1.1 400 Bad Request');
			Messanger\Messanger::getResponse($this->headers,json_encode($response,JSON_UNESCAPED_UNICODE));
		}
		else{
			$response = $this->createResponse('Запрос выполнен успешно: Статьи добавлены','success','HTTP/1.1 201 Created');
			Messanger\Messanger::getResponse($this->headers,json_encode($response,JSON_UNESCAPED_UNICODE));
		}
		
	}

	public function editArticle(){
		if($this->request_method!== 'PUT')return 0;
		$bodyrequest = file_get_contents("php://input");
		$bodyrequest = json_decode($bodyrequest,true);

		if(!$this->model->editArticle($bodyrequest)){
			$response = $this->createResponse('Ошибка запроса: Статья не была изменена','error','HTTP/1.1 400 Bad Request');
			Messanger\Messanger::getResponse($this->headers,json_encode($response,JSON_UNESCAPED_UNICODE));
		}
		else{
			$response = $this->createResponse('Запрос выполнен успешно: Статья изменена','success','HTTP/1.1 200 OK');
			Messanger\Messanger::getResponse($this->headers,json_encode($response,JSON_UNESCAPED_UNICODE));
		}

	}

	public function deleteArticle(){
		if($this->request_method !== 'DELETE')return 0;
		$bodyrequest = file_get_contents("php://input");
		$bodyrequest = json_decode($bodyrequest,true);
		if(!$this->model->deleteArticle($bodyrequest)){
			$response = $this->createResponse('Ошибка запроса: Статья не была удалена','error','HTTP/1.1 400 Bad Request');
		}
		else{
			$response = $this->createResponse('Запрос выполнен успешно: Статья удалена','success','HTTP/1.1 200 OK');
		}
		Messanger\Messanger::getResponse($this->headers,json_encode($response,JSON_UNESCAPED_UNICODE));

	}




	private function createResponse($message,$status,$code){
		$response['message']=$message;
		$response['status']=$status;
		$this->setHeaders([$code]);
		return $response;
	}

}





 ?>