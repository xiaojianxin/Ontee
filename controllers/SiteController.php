<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use app\models\ContactForm;
use yii\helpers\Json;

class SiteController extends Controller
{
    public function init(){
        $this->enableCsrfValidation = false;
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChoose()
    {
        return $this->render('choose');
    }
    public function actionPurchase()
    {
        return $this->render('purchase');
    }
    public function actionLogin()
    {
       $model = new LoginForm();
       $user = new User();
       $post = Yii::$app->request->post();
       $model->username = $post['username'];
       $model->password = $post['password'];
       if($model->validate())
       {
            $model->login();
       }

    }

    public function actionTestcode()
    {   
        $model  = new RegisterForm();
        $post = Yii::$app->request->post();
        //var_dump($post);
        $model->telephone = $post['telephone'];
        $model->InsertTestCode();
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
