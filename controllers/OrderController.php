<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use app\models\UploadForm;
use app\models\User;

class OrderController extends Controller{

	public function init(){
        $this->enableCsrfValidation = false;
    }

    public function actionCreateorder(){

    	$post =  Yii::$app->request->post();

    	$order = new Order();


    	$username = Yii::$app->session['username'];
    	if(empty($username)){

    	}else{
    		 $user= User::find()->where(['username' => $username])->one();
    		 $name = time();
	         $url = Yii::$app->basePath."/web".'/';
	    	 $frontPicUrl = $post['frontPic'];

	    	 //$frontPicUrl = substr(strstr($frontPicUrl,','),1);
	    	 $frontPicUrl = str_replace('data:image/png;base64,', '', $frontPicUrl);

	    	 $frontPicUrl = base64_decode($frontPicUrl);
	    	 $file = $url.'orderpic/' . $name. '.png';
	    	 $file = file_put_contents($file,$frontPicUrl);
	    	 
    	 	$order->userid = Yii::$app->session['userid'];
	    	$order->frontpic = 'orderpic/' . $name. '.png';
	    	$order->backpic = 'orderpic/' . $name. '.png';
	    	$order->size = $post['size'];
	    	$order->num = (int)$post['num'];
	    	$order->type = (int)$post['type'];
	    	$order->price = $post['price'];
	    	$order->gender = (int)$post['sex'];
	    	$order->status = 0;

	    	
		    if($order->save()){
		    	echo "0";
		    }else{
		    	echo "-1";
	    	}
		}
    }
}