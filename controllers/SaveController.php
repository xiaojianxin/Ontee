<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Tshirts;
use app\models\User;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Session;
use app\models\UploadForm;
use yii\web\UploadedFile;

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


    public function actionUpload(){

        $model = new UploadForm();

        if ($model->load(Yii::$app->request->post())) 
        {

            $model->file= UploadedFile::getInstance($model, 'file');

            //图片插入数据库时的路径，在Uploads下以当天日期为文件名，前提是在basic/web/下新建images/Uploads文件夹
            $insert_path ='Uploads/'. date('Y-m-d' , time()) . '/';

            // 图片保存在本地的路径：images/Uploads/当天日期/文件名，默认放置在basic/web/下
            $base_path = 'images/'. $insert_path;
             
            if ($model->file&& $model->validate()) 
            {  

                // 如果路径中的文件夹不存在，则新建这一文件夹
                if(!is_dir($base_path)) {
                    mkdir($base_path , 0777);
                }  

                // 将图片上传到本地
                $model->file->saveAs($base_path . $model->file->baseName . '.' . $model->file->extension);

                // 为了方便在view中遍历出来，在数据库以“当天日期/文件名”形式保存
                $model->file= $insert_path . $model->file->baseName . '.' . $model->file->extension;
            }
            // 保存数据
            $model->save();
        }

        return $this->render('create', ['model' => $model]);
    }


    public function actionEdit(){

        $model =  User::find()->where(['userid' => Yii::$app->session['userid']])->one();
        $post = Yii::$app->request->post();
        $model->username = $post['username'];
        $model->nickname = $post['nickname'];
        $model->password = $post['password'];
        $model->telephone = $post['telephone'];
        $model->description = $post['description'];
        $model->update();

    }

}