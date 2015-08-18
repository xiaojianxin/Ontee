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

		$isExist = User::find()->where(['telephone' => $user->telephone])->one();

		if(!empty($isExist)){
			echo "0";
		}else{
			if($user->insert('user',['testcode','telephone'],[$user->testcode,$user->telephone])){

			$password = md5("ontee123ontee");
			$content = urlencode("欢迎您注册ONTEE，您的验证码".$user->testcode."，请在10分钟之内输入。【ONTEE】");
			
			$time = $this->getMillisecond();
			echo $time;
			$remote_server = "http://api.sms.cn/mt/?uid=ontee&pwd=".$password."&mobile=".$user->telephone."&mobileids=".$user->telephone.$time."&content=".$content."&encode=utf8";
			echo $remote_server;
			$data = $this->request_by_curl($remote_server);
			echo $data;
			

			}
		}
	
	}


	public function Register(){



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


	public function getMillisecond() {

	  list($s1,$s2)=explode(' ',microtime()); 
      return (float)sprintf('%.0f',(floatval($s1)+floatval($s2))*1000); 
	}	
 

	public function request_by_curl($remote_server)
	{
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$remote_server);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
	}
}
?>
