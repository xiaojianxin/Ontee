<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AlipayApi;

use Alipay;

class PayController extends Controller{
        public function actionAlipay() {
                $request = YII::$app->request;
                $trade_no = $request->get('WIDout_trade_no');
                $subject = $request->get('WIDsubject');
                $fee = $request->get('WIDtotal_fee');
                $alipay = new Alipay();
                $result = $alipay->myPay($trade_no, $subject, $fee);
                echo $result;
        }

        public function actionTest(){
        	echo "1";
        }
}