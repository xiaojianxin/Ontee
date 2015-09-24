<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Address;

class SaveController extends Controller
{   

    public function init(){
        $this->enableCsrfValidation = false;
    }

    public function actionTshirts(){
    	$Tshirts = new Tshirts;

    	$post = Yii::$app->request->post();
    	$Tshirts->gender = $post['gender'];
    	$Tshirts->plate = $post['plate'];
    	$Tshirts->color = $post['color'];
    	//图片的储存

    	$Tshirts->save();

    }


    public function actionUpload(){

        $model = new UploadForm();
        $username = Yii::$app->session['username'];
        $user= User::find()->where(['username' => $username])->one();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstanceByName('file');
            $name = time();
            $url = Yii::$app->basePath."/web".'/';
            if ($model->validate()) {                
                $model->file->saveAs($url.'images/' . $name. '.' . $model->file->extension);
                $user->facepic = "images/".$name.'.'.$model->file->extension;
                $user->save();
            }
        }

        echo "1";
    }


    public function actionEdit(){

        $model =  User::find()->where(['userid' => Yii::$app->session['userid']])->one();
        $post = Yii::$app->request->post();
        $model->username = $post['username'];
        $model->nickname = $post['nickname'];
        $model->email = $post['email'];
        $model->description = $post['userinfo'];
        if($model->update()){
            echo "0";
        }else{
            echo "1";
        }

    }

    public function actionAddaddress(){
        $model = new Address();

        $post = Yii::$app->request->post();

        $model->userid = Yii::$app->session['userid'];

        $model->location = $post['address'];
        $model->address = $post['detail'];
        $model->telephone = $post['phone'];
        $model->receiver = $post['name'];
        $model->code = $post['code'];

        if($model->save()){

            echo "0";
        }

    }

    public function actionUpdatecode(){

        //$model =  User::find()->where(['userid' => Yii::$app->session['userid']])->one();
        $post = Yii::$app->request->post();

        $cache = \Yii::$app->cache;
        $cache['telephone'] = $post['telephone'];

        $testcode = $this->GetTestCode(4);
        $cache['testcode'] = $testcode;
        $password = md5("ontee123ontee");
        $content = urlencode("欢迎您注册ONTEE，您的验证码".$testcode."，请在10分钟之内输入。【ONTEE】");
            
        $time = $this->getMillisecond();
        $remote_server = "http://api.sms.cn/mt/?uid=ontee&pwd=".$password."&mobile=".$post['telephone']."&mobileids=".$post['telephone'].$time."&content=".$content."&encode=utf8";
        $data = $this->request_by_curl($remote_server);
        echo $testcode;
    }

    public function actionUpdatetelephone(){
        $post = Yii::$app->request->post();
        $cache = \Yii::$app->cache;
        $telephone = $post['telephone'];
        $testcode = $post['testcode'];

        if($telephone != $cache['telephone']){
            echo "1";
        }elseif ($testcode != $cache['testcode']) {
            echo "2";
        }else{
            $model =  User::find()->where(['userid' => Yii::$app->session['userid']])->one();
            $model->testcode = $testcode;
            $model->telephone = $telephone;
            if($model->update()){
                echo "0";
            }else{
               echo "-1"; 
            }
            
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


    public function actionUpdateaddress(){

        $post = Yii::$app->request->post();
        $address =  Address::find()->where(['id' => $post['id']])->one();

        $address->location = $post['address'];
        $address->address = $post['detail'];
        $address->telephone = $post['phone'];
        $address->receiver = $post['name'];
        $address->code = $post['code'];

        if($address->update()){
            echo "0";
        }
    }

    public function actionDeladdress(){
        $post = Yii::$app->request->post();

        $address =  Address::find()->where(['id' => $post['id']])->one();

        if($address->delete()){

            echo "0";
        }
    }


    public function actionChangepassword(){
        $post = Yii::$app->request->post();

        $user = User::find()->where(['userid' => Yii::$app->session['userid']])->one();

        $user->password = md5($post['password']);

        if($user->update()){
            echo "0";
        }
    }

}
