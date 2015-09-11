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
        $pic = new Pictures();

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