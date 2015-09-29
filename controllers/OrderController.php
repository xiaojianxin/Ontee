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
    		echo "1";
    	}else{
    		 $user= User::find()->where(['username' => $username])->one();
    		 $frontname = time();
	         $url = Yii::$app->basePath."/web".'/';
	    	 $frontPicUrl = $post['frontPic'];

	    	 //$frontPicUrl = substr(strstr($frontPicUrl,','),1);
	    	 $frontPicUrl = str_replace('data:image/png;base64,', '', $frontPicUrl);

	    	 $frontPicUrl = base64_decode($frontPicUrl);

	    	 $file = $url.'orderpic/' . $frontname. '.png';
	    	 $file = file_put_contents($file,$frontPicUrl);

	    	 // $backPicUrl = $post['backPic'];

	    	 // //$frontPicUrl = substr(strstr($frontPicUrl,','),1);
	    	 // $backPicUrl = str_replace('data:image/png;base64,', '', $backPicUrl);

	    	 // $backPicUrl = base64_decode($backPicUrl);
	    	  $backname = time();
	    	 // $file = $url.'orderpic/' . $backname. '.png';
	    	 // $file = file_put_contents($file,$backPicUrl);
	    	 
    	 	$order->userid = Yii::$app->session['userid'];
	    	$order->frontpic = 'orderpic/' . $frontname. '.png';
	    	$order->backpic = 'orderpic/' . $backname. '.png';
	    	$order->size = $post['size'];
	    	$order->num = (int)$post['num'];
	    	$order->type = (int)$post['type'];
	    	$order->price = $post['price'];
	    	$order->gender = (int)$post['sex'];
	    	$order->status = 0;
		    if($order->save()){
		    	$response =  array(
		    		'id' => $order->id , 
		    		'frontPicUrl'=> $order->frontpic,
		    		);
		    	$cache = \Yii::$app->cache;
		    	$cache['response'] = $response;
		    	echo "0";
		    }else{
		    	echo "-1";
	    	}
		}
    }
}