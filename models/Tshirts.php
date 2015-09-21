<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
class User extends ActiveRecord 
{

    public static function tableName()
    {
        return 'Tshirts';
    }

    public function rules()
    {
        return [
            [['gender', 'plate','color'], 'required'],
        ];

    }

    /**
     * @inheritdoc
     */

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
}