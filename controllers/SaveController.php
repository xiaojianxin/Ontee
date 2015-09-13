<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\User;

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
        $username = Yii::$app->session['username'];
        $user= User::find()->where(['username' => $username])->one();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstanceByName('file')

            if ($model->validate()) {                
                $model->file->saveAs('@web/img/' . $model->file->baseName . '.' . $model->file->extension);
                $user->facepic = "img/".$model->file->baseName.'.'.$model->file->extension;
                $user->save();
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