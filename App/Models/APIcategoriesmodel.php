<?php 
namespace App\Models;

class APIcategoriesmodel extends APImodel
{
	public function getCategories($articlecount = null){
		if(!isset($articlecount)){
			return $this->fetchCategories($this->queryCategories());
		}
		else{
			return $this->fetchCategories($this->queryCategories($articlecount));
		}
	}

	private function queryCategories($articlecount = null){
		if(!isset($articlecount)){
			return $query = $this->connection->query("SELECT * FROM categories");
		}
		else{
			return $query = $this->connection->query("SELECT categories.name, COUNT(articles.cat_id) AS 'articles_count' FROM articles INNER JOIN categories ON categories.id = articles.cat_id GROUP BY articles.cat_id HAVING COUNT(articles.cat_id)> '$articlecount'");
		}

	}

	private function fetchCategories($query){
		$arr = [];
		while($row = $query->fetch(\PDO::FETCH_ASSOC)){
			$arr[] = $row;
		}
		return $arr;
	}

	public function getCategory($cat_id){
		return $this->fetchCategory($this->queryCategory($cat_id));
	}

	private function queryCategory($cat_id){
		return $query = $this->connection->query("SELECT name FROM categories WHERE id = '$cat_id'");
	}
	private function fetchCategory($query){
		return $category = $query->fetchColumn();
	}
}



 ?>