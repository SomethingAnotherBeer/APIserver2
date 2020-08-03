<?php 
namespace App\Route;

class Route
{		
	private static $uri;

	private static $APIroutes = [
		'/api/articles/getarticles'=>['controller'=>'articles','action'=>'getArticles'],
		'/api/categories/getcategories'=>['controller'=>'categories','action'=>'getCategories'],
		'/api/articles/addarticle'=>['controller'=>'articles','action'=>'addArticle'],
		'/api/articles/editarticle'=>['controller'=>'articles','action'=>'editArticle'],
		'/api/articles/getarticle'=>['controller'=>'articles','action'=>'getArticle'],
		'/api/categories/getcategory'=>['controller'=>'categories','action'=>'getCategory'],
		'/api/articles/deletearticle'=>['controller'=>'articles','action'=>'deleteArticle']
	];

	public static function setRoute($uri){
		self::$uri = strtolower($uri);

		if(self::checkUri(self::prepareUri(self::$uri))){
			self::setApiRoute(self::prepareUri(self::$uri));
		}
		else{
			
		}


	}

	private static function checkUri($uri){
		$check = explode('/',$uri);
		if($check[1] === 'api') return 1;
		return 0;
	}

	private static function setApiRoute($uri){
		$APIcontroller = null;

		if(isset(self::$APIroutes[$uri])){
			$APIcontroller = 'App\\Controllers\\'."API".self::$APIroutes[$uri]['controller'];
			$APIcontroller = new $APIcontroller;

			$APIcontroller->{self::$APIroutes[$uri]['action']}();
		}
		
	}

	private static function prepareUri($uri){
		$preparedUri = '';
		for($i = 0;$i<strlen($uri);$i++){
			if($uri[$i]!=='?'){
				$preparedUri.=$uri[$i];
			}
			else{
				break;
			}
		}
		return $preparedUri;
	}


}



 ?>