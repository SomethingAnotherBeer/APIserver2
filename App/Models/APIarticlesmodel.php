<?php 
namespace App\Models;

class APIarticlesmodel extends APImodel
{

	public function getArticles(){
		return $this->fetchArticles($this->queryArticles());
	}

	private function queryArticles(){
		return $query = $this->connection->query("SELECT * FROM articles");
	} 

	private function fetchArticles($query){
		$arr = [];

		while($row = $query->fetch(\PDO::FETCH_ASSOC)){
			$arr[] = $row;
		}

		return $arr;
	}

	public function addArticle($article){
		return $this->queryAddArticle($article);
	}

	private function queryAddArticle($article){
		try{
			$this->connection->exec("INSERT INTO articles (cat_id,title,description,text) VALUES ('{$article['cat_id']}','{$article['title']}','{$article['description']}','{$article['text']}')");
			return true;
		}
		catch(\PDOException $error){
			return false;
		}
	}

	public function editArticle($article){
		return $this->queryEditArticle($article);
	}

	private function queryEditArticle($article){
		try{
			$this->connection->exec("UPDATE articles SET title = '{$article['title']}',description = '{$article['description']}',text = '{$article['text']}' WHERE id = '{$article['id']}'");
			return true;
		}
		catch(\PDOException $error){
			echo $error->getMessage() . "\n";
			return false;
		}
	}

	public function getArticle($id){
		return $this->fetchArticle($this->queryArticle($id));
	}

	private function queryArticle($id){
		return $this->connection->query("SELECT title,description,text FROM articles WHERE id = '$id'");
	}
	private function fetchArticle($query){
		return $article = $query->fetchColumn();
	}

	public function deleteArticle($request){
		try{
			$this->connection->exec("DELETE FROM articles WHERE id = '{$request['id']}'");
			return true;
		}
		catch(PDOException $error){
			return false;
		}
	}





}




 ?>