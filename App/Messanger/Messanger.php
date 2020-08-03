<?php 
namespace App\Messanger;

class Messanger
{
	public static function getResponse(array $headers = null,$bodyparams){
		if(!empty($headers)){
			foreach($headers as $head){
				header($head);
			}
		}
		echo $bodyparams;
	}
}


 ?>