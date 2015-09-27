<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $addressid
 * @property string $frontpic
 * @property string $backpic
 * @property integer $gender
 * @property integer $type
 * @property string $size
 * @property integer $num
 * @property integer $price
 * @property integer $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'addressid', 'frontpic', 'backpic', 'gender', 'type', 'size', 'num', 'price', 'status'], 'required'],
            [['id', 'userid', 'addressid', 'gender', 'type', 'num', 'price', 'status'], 'integer'],
            [['frontpic', 'backpic'], 'string', 'max' => 1000],
            [['size'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'addressid' => 'Addressid',
            'frontpic' => 'Frontpic',
            'backpic' => 'Backpic',
            'gender' => 'Gender',
            'type' => 'Type',
            'size' => 'Size',
            'num' => 'Num',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }
}
