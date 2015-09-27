<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use app\models\UploadForm;

class SaveController extends Controller{

	public function init(){
        $this->enableCsrfValidation = false;
    }

    public function actionCreateorder(){

    	$post =  Yii::$app->request->post();

    	$order = new Order();

    	$username = Yii::$app->session['username'];
        $user= User::find()->where(['username' => $username])->one();

    	$frontPicUrl = $post['frontPic'];

    	$frontPicUrl= substr(strstr($frontPicUrl,','),1);

    	$frontPic = base64_decode($frontPicUrl);

    	$model = new UploadForm();
    	$model->file = $frontPic;
    	$url = Yii::$app->basePath."/web".'/';
    	if ($model->validate()) { 
    		$model->file->saveAs($url.'orderpic/' . $name. '.' . $model->file->extension);
    	}
    }
}