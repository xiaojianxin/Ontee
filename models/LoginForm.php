<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user = false;

    public function rules(){
        return [
            [['username','password'],'required','message'=>'必填'],
        ];

    }

    public function login(){
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(),3600*24*30);
        }else{
            return false;
        }
        
    }


    public function getUser(){
        if($this->_user == false){
            $this->_user = User::find()->where(['username'=>$this->username,'password'=>$this->password])->one();
        }

        return $this->_user;
    }
}
