<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\User;
use app\models\Address;
use app\models\ContactForm;
use app\models\UploadForm;
use app\models\Pictures;
use app\models\Order;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Session;

class SiteController extends Controller
{   
    public $layout_data;

    public function init(){
        $this->enableCsrfValidation = false;
    }


    // public function behaviors()
    // {
    //     return [
    //         // 'access' => [
    //         //     'class' => AccessControl::className(),
    //         //     'except' => ['index','login','testcode','register','logout','choose','purchase','confirm','ordermanage','personal','upload'],
    //         //     'rules' => [
    //         //         [
    //         //             'actions' => ['login',],
    //         //             'allow' => true,
    //         //             'roles' => ['@'],
    //         //         ],
    //         //     ],
    //         // ],
    //         // 'verbs' => [
    //         //     'class' => VerbFilter::className(),
    //         //     'actions' => [
    //         //     ],
    //         // ],
    //     ];
    // }

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
        $layout_data =  array(
            'username' => Yii::$app->session['username'],
            'status' => 0
         );
        $this->layout_data = $layout_data;
        return $this->render('index');
    }

    public function actionChoose()
    {
        $layout_data =  array(
            'username' => Yii::$app->session['username'],
            'status' => 1
         );
        $this->layout_data = $layout_data;
        $username = Yii::$app->session['username'];
        $pictures = Pictures:: find()->where(['type' => "0"])->all();
        $svg = pictures::find()->where(['type' => "1"])->all();
        return $this->render('choose',
            [
            "username" => $username,
            'pictures' => $pictures,
            'svg' => $svg
            ]);
    }

    public function actionMytshirts()
    {   

        if(empty(Yii::$app->session['username'])){

            return $this->runAction('choose');
        }else{
           $layout_data =  array(
                'username' => Yii::$app->session['username'],
                'status' => 2
             );
            $this->layout_data = $layout_data;
            $Orders = Order::find()->where(['userid' => Yii::$app->session['userid'],'show' => '0'])->with('address')->OrderBy('createtime')->all();
            return $this->render('myThirts',[
                'orders'=>$Orders,
                ]); 
        }
    }
    public function actionConfirm()
    {
        $layout_data =  array(
            'username' => Yii::$app->session['username'],
            'status' => 2
         );
        $this->layout_data = $layout_data;
  
        $cache = \Yii::$app->cache;
        $response = $cache['response']; 
        $address = Address::find()->where(['userid' => Yii::$app->session['userid'],])->all();
        return $this->render('confirm',[
            'address'=>$address,
            'response'=>$response,
        ]);
        
    }
    public function actionOrdermanage()
    {
        $layout_data =  array(
            'username' => Yii::$app->session['username'],
            'status' => 3
         );
        $this->layout_data = $layout_data;

        $Orders = Order::find()->where(['userid' => Yii::$app->session['userid']])->with('address')->OrderBy(['createtime'=>SORT_DESC])->all();
        $address = Address::find()->where(['userid' => Yii::$app->session['userid']])->all();
        return $this->render('ordermanage',[
                'address' => $address,
                'orders'=>$Orders,
            ]);

    }
    public function actionPersonal()
    {
        $user = User::find()->where(['userid' => Yii::$app->session['userid']])->one();
        $address = Address::find()->where(['userid' => Yii::$app->session['userid']])->all();
        $layout_data =  array(
            'username' => Yii::$app->session['username'],
            'status' => 3
        );
        $this->layout_data = $layout_data;
        return $this->render('personal',[
            'user' => $user,
            'address'=> $address, ]);
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
           $model->telephone = $post['username'];
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
        $url = Yii::$app->basePath."/web/img";
        echo $url;
    }


    public function actionUpload(){

        $model = new UploadForm();
        $pic = new Pictures();
        echo "1";
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {                
                $Name = time();
                $url = Yii::$app->basePath."/web/img/";
                $model->file->saveAs($url . $Name . '.' . $model->file->extension);
                $pic->url = '/img/'.$model->file->baseName.'.'.$model->file->extension;
                $pic->save();
            }
        }

        echo "1";
    }

    public function actionOrdersuccess()
    {

        return $this->render("orderSuccess");
    }



    public function actionPay(){

        $post = Yii::$app->request->post();
        $orderId = $post['orderId'];
        $num = $post['num'];
        $price = $post['price'];
        $addressId = $post['addressId'];

        $Order = Order::find()->where(['id' => $orderId])->one();

        $Order->num = $num;
        $Order->price = $price;
        $Order->addressid = $addressId;
        // $orderId = md5($orderId);
        $name = $orderId.Yii::$app->session['userid'];
        if($Order->update()){
            return $this->redirect(Url::to(['pay/alipay',
                'WIDout_trade_no' => $orderId,
                'WIDsubject' => $name,
               // 'WIDtotal_fee' => $price,
                'WIDtotal_fee' => '0.01',
            ]));
        }else{
            return false;
        }

    }

}
