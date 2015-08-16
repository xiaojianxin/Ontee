<?php

namespace app\models;

use Yii;
use yii\base\Model;

use app\models\User;


/**
 * LoginForm is the model behind the login form.
 */
class RegisterForm extends Model
{
	public $username;
	public $password;
	public $telephone;
	public $testcode;

	public function InsertTestCode(){
		$user = new User;
		$user->testcode = $this->GetTestCode(4);
		$user->telephone = $this->telephone;

		if($user->insert('user',['testcode','telephone'],[$user->testcode,$user->telephone])){
			echo 0;
		}	
	}
	public function GetTestCode($len) 
	{ 
  		$chars_array = array( 
    		"0", "1", "2", "3", "4", "5", "6", "7", "8", "9", 
  		); 
  		$charsLen = count($chars_array) - 1; 
  
  		$outputstr = ""; 
  		for ($i=0; $i<$len; $i++) 
 		{ 
    		$outputstr .= $chars_array[mt_rand(0, $charsLen)]; 
  		} 
 		 return $outputstr; 
	} 
}
?>
