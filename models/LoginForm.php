<?php

namespace app\models;

use Yii;
use yii\base\Model;

use app\models\User;
use yii\web\Session;


/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $telephone;


    private $_user = false;

    public function rules(){
        return [
            [['telephone','password'],'required','message'=>'必填'],
        ];

    }

    public function login(){
        if ($this->validate()) {
            if(!empty($this->getUser())){

              if($this->validatePassword($this->getUser()->password)){
                $lifetime=600;
                session_set_cookie_params($lifetime);
                $session = Yii::$app->session;
                $session->open();    
                //var_dump($session['username']);
                $session['username'] =  $this->getUser()->username;
                $session['userid'] = $this->getUser()->userid;
                $session['password'] = $this->password;               
                echo 0;
              }else{
                echo 2;
              }
            }else{
                echo 1;
            }
        }else{
            return false;
        }
        
    }
    public function validatePassword($password)
    {   
        if($password === md5($this->password)){
            return true;
        }else{

            return false;
        }
    }


    public function getUser(){
        if($this->_user == false){
            $this->_user = User::find()->where(['telephone'=>$this->telephone])->one();

        }

        return $this->_user;
    }


}
