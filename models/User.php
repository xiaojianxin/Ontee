<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
class User extends ActiveRecord 
{
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    // public function attributeLabels()
    // {
    //     return [
    //         'userid' => 'ID',
    //         'username' => 'Username',
    //         'password' => 'Password',
    //         'email' => 'Email',
    //         'description' => 'Description',
    //     ];
    // }

    /**
     * @inheritdoc
     */
    // public static function findIdentity($id)
    // {
    //     return static::findOne($id);
    //     //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    // }

    /**
     * @inheritdoc
     */
    // public static function findIdentityByAccessToken($token, $type = null)
    // {
    //     return static::findOne(['access_token' => $token]);
    //     foreach (self::$users as $user) {
    //         if ($user['accessToken'] === $token) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    // public static function findByUsername($username)
    // {
    //       $user = User::find()
    //         ->where(['username' => $username])
    //         ->asArray()
    //         ->one();

    //         if($user){
    //         return new static($user);
    //     }

    //     return null;
    //     /*foreach (self::$users as $user) {
    //         if (strcasecmp($user['username'], $username) === 0) {
    //             return new static($user);
    //         }
    //     }

    //     return null;*/
    // }

    /**
     * @inheritdoc
     */
    // public function getId()
    // {
    //     return $this->userid;
    // }





    /**
     * @inheritdoc
     */
    // public function getAuthKey()
    // {
    //     return $this->authKey;
    // }

    /**
     * @inheritdoc
     */
    // public function validateAuthKey($authKey)
    // {
    //     return $this->authKey === $authKey;
    // }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}
