<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use app\models\UploadForm;
use app\models\User;
use app\models\Address;

class OrderController extends Controller{

	public function init(){
        $this->enableCsrfValidation = false;
    }

    public function actionCreateorder(){

    	$post =  Yii::$app->request->post();

    	$order = new Order();

    	$username = Yii::$app->session['username'];
    	if(empty($username)){
    		echo "404";
    	}else{
    		 $user= User::find()->where(['username' => $username])->one();
    		 $frontname = md5(Yii::$app->session['userid'].time());
	         $url = Yii::$app->basePath."/web".'/';
	    	 $frontPicUrl = $post['frontPic'];

	    	 //$frontPicUrl = substr(strstr($frontPicUrl,','),1);
	    	 $frontPicUrl = str_replace('data:image/png;base64,', '', $frontPicUrl);

	    	 $frontPicUrl = base64_decode($frontPicUrl);

	    	 $file1 = $url.'orderpic/' . $frontname. '.png';
	    	 $file1 = file_put_contents($file1,$frontPicUrl);

	    	 $backPicUrl = $post['backPic'];

	    	 //$frontPicUrl = substr(strstr($frontPicUrl,','),1);
	    	 $backPicUrl = str_replace('data:image/png;base64,', '', $backPicUrl);

	    	 $backPicUrl = base64_decode($backPicUrl);
	    	 $backname = md5(Yii::$app->session['userid'].(time()+1));
	    	 $file2 = $url.'orderpic/' . $backname. '.png';
	    	 $file2 = file_put_contents($file2,$backPicUrl);
	    	 
    	 	$order->userid = Yii::$app->session['userid'];
	    	$order->frontpic = 'orderpic/' . $frontname. '.png';
	    	$order->backpic = 'orderpic/' . $backname. '.png';
	    	$order->size = $post['size'];
	    	$order->num = (int)$post['num'];
	    	$order->type = (int)$post['type'];
	    	$order->price = $post['price'];
	    	$order->gender = (int)$post['sex'];
	    	$order->status = 0;
	    	$order->createtime = time();
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

    public function actionDeletephoto(){

    	$username = Yii::$app->session['username'];
    	if(empty($username)){
    		echo "404";
    	}else{
	    	$post =  Yii::$app->request->post();
	    	$OrderId = $post['id'];
	    	$Order = Order::find()->where(['id' => $OrderId])->one();
	    	$Order->show = 1;
	    	if($Order->update()){
	    		echo "0";
	    	}else{
	    		echo "-1";
	    	}
    	}


    }
    public function actionBuytshirt(){
    	$username = Yii::$app->session['username'];
    	if(empty($username)){
    		echo "404";
    	}else{
    		$post =  Yii::$app->request->post();
	    	$OrderId = $post['id']; 
		    $oldorder = Order::find()->where(['id' => $OrderId])->one();
		    $order = new Order();


	        $order->userid = $oldorder->userid;
	        $order->frontpic = $oldorder->frontpic;
	        $order->backpic = $oldorder->backpic;
	        $order->size = $oldorder->size;
	        $order->num = $oldorder->num;
	        $order->type = $oldorder->type;
	        $order->price = $oldorder->price;
	        $order->gender = $oldorder->gender;
	        $order->status = 0;
	        $order->createtime = time();
	        $order->show = 1;

	        if ($order->save()){
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


    public function actionDeleteorder(){

    	$username = Yii::$app->session['username'];
    	if(empty($username)){
    		echo "404";
    	}else{
	    	$post =  Yii::$app->request->post();
	    	$OrderId = $post['id']; 
		    $order = Order::find()->where(['id' => $OrderId])->one();
		    $url = Yii::$app->basePath."/web".'/';

		    if($order->delete()){
		    	unlink($url.$order->frontpic);
		    	unlink($url.$order->backpic);
		    	echo "0";
		    }else{
		    	echo "-1";
		    }
		}
    }

    public function actionOrderpay(){
    	$username = Yii::$app->session['username'];
    	if(empty($username)){
    		echo "404";
    	}else{
    		$post =  Yii::$app->request->post();
	    	$OrderId = $post['id'];
	    	$order = Order::find()->where(['id' => $OrderId])->one();
	    	$order->addressid = $post['addressid'];
	    	$order->size = $post['size'];
	    	$order->num = $post['num'];
	    	if($order->update()){
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