<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Address;

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
            $model->file = UploadedFile::getInstanceByName('file');
            $name = time();
            $url = Yii::$app->basePath."/web".'/';
            if ($model->validate()) {                
                $model->file->saveAs($url.'images/' . $name. '.' . $model->file->extension);
                $user->facepic = "images/".$model->file->baseName.'.'.$model->file->extension;
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
        $model->email = $post['email'];
        $model->description = $post['userinfo'];
        if($model->update()){
            echo "0";
        }else{
            echo "1";
        }

    }

    public function actionAddaddress(){
        $model = new Address();

        $post = Yii::$app->request->post();

        $model->userid = Yii::$app->session['userid'];

        $model->location = $post['address'];
        $model->address = $post['detail'];
        $model->telephone = $post['phone'];
        $model->receiver = $post['name'];
        $model->code = $post['code'];

        if($model->save()){

            echo "0";
        }

    }

}
