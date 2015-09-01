<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Tshirts;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Session;

class SaveController extends Controller
{   

    public function init(){
        $this->enableCsrfValidation = false;
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
  				'actions' => [
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
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
}