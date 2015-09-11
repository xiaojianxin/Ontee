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
use yii\helpers\Url;
use yii\web\Session;

class SiteController extends Controller
{   
    public $layout_data;

    public function init(){
        $this->enableCsrfValidation = false;
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['index','login','testcode','register','logout','choose','purchase','confirm','ordermanage','personal','upload'],
                'rules' => [
                    [
                        'actions' => ['login',],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    public function actionIndex()
    {   
        $this->layout_data = Yii::$app->session['username'];
        return $this->render('index');
    }

    public function actionChoose()
    {
        $this->layout_data = Yii::$app->session['username'];
        $username = Yii::$app->session['username'];
        return $this->render('choose',
            [
            "username" => $username,
            ]);
    }
    public function actionConfirm()
    {
        $this->layout_data = Yii::$app->session['username'];
        return $this->render('confirm');
    }
    public function actionOrdermanage()
    {
        $this->layout_data = Yii::$app->session['username'];
        return $this->render('ordermanage');
    }
    public function actionPersonal()
    {
        $this->layout_data = Yii::$app->session['username'];
        return $this->render('personal');
    }
    public function actionLogin()
    {
       $model = new LoginForm();
       $user = new User();
       $post = Yii::$app->request->post();
       if(empty($post['username'])){
            return $this->render('error',[
                    "name" => "wrong",
                    "message" => "You are not allowed to access this page",
            ]);
       }else{
           $model->username = $post['username'];
           $model->password = $post['password'];
           if($model->validate())
           {
                $model->login();
           }
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

    public function actionValidateCode()
    {

        $model = new RegisterForm();
        $post = Yii::$app->request->post();
        $model->telephone = $post['telephone'];
        $model->testcode = $post['confirmCode'];
        $model->ValidateCode();
    }

    public function actionRegister(){
        $model = new RegisterForm();
        $post = Yii::$app->request->post();

        $model->telephone = $post['telephone'];
        $model->password = $post['password'];

        //var_dump($model->password);
        $model->Register();
    }

    public function actionLogout()
    {
        $session = Yii::$app->getSession();
        
        $session->removeall();
        
        $this->redirect(Url::to(['site/index']));
                  
       
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


    public function actionUpload(){

        $model = new UploadForm();
        $pic = new Pictures();
        echo $_FILES;
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {                
                $model->file->saveAs('/img/' . $model->file->baseName . '.' . $model->file->extension);
                $pic->url = '/img/'.$model->file->baseName.'.'.$model->file->extension;
                $pic->save();
            }
        }

        echo "1";
    }
}
