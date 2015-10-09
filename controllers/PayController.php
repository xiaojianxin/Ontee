<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AlipayApi;
use yii\helpers\Url;

use Alipay;

class PayController extends Controller{

		public function actionConfirmpay(){

			$this->redirect(Url::to(['pay/alipay',
                'WIDout_trade_no' => $orderId,
                'WIDsubject' => $name,
                'WIDtotal_fee' => $price,
            ]));
		}
        public function actionAlipay() {
                $request = YII::$app->request;
                $trade_no = $request->get('WIDout_trade_no');
                $subject = $request->get('WIDsubject');
                $fee = $request->get('WIDtotal_fee');
                $alipay = new Alipay();
                $result = $alipay->myPay($trade_no, $subject, $fee);
                echo $result;
        }
}