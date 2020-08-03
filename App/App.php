<?php 
namespace App;

class App
{
	public static function main(){
		Includes\DB::setConnection('localhost','test10','root','12345qqqwww');

		$uri = $_SERVER['REQUEST_URI'];
		Route\Route::setRoute($uri);
	}
}


 ?>