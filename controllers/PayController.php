<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AlipayApi;

use yii\helpers\Url;
use app\models\Order;

use Alipay;
use AlipayNotify;

class PayController extends Controller{

        public $alipay_config;
        public function init(){

            $this->alipay_config['partner']        = '2088021811676105';

            //收款支付宝账号
            $this->alipay_config['seller_email']  = 'ot@ontee.cn';

            //安全检验码，以数字和字母组成的32位字符
            $this->alipay_config['key']           = '84v8foymt7w60ph3hqjs81c4fr7t7fm9';


            //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


            //签名方式 不需修改
            $this->alipay_config['sign_type']    = strtoupper('MD5');

            //字符编码格式 目前支持 gbk 或 utf-8
            $this->alipay_config['input_charset']= strtolower('utf-8');

            //ca证书路径地址，用于curl中ssl校验
            //请保证cacert.pem文件在当前文件夹目录中
            $this->alipay_config['cacert']    = getcwd().'\\cacert.pem';

            //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
            $this->alipay_config['transport']    = 'http'; 
        }

		public function actionConfirmpay(){
            

            $alipayNotify = new AlipayNotify($this->alipay_config);
            $verify_result = $alipayNotify->verifyNotify();

            if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代

    
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
            
            //商户订单号

            logResult("test");
            $out_trade_no = $_POST['out_trade_no'];
            //logResult("out_trade_no:  ".$out_trade_no);
            //支付宝交易号

            $trade_no = $_POST['trade_no'];
            logResult("trade_no: ".$trade_no);

            //交易状态
            $trade_status = $_POST['trade_status'];


            if($_POST['trade_status'] == 'TRADE_FINISHED') {
        //判断该笔订单是否在商户网站中已经做过处理
            //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
            //如果有做过处理，不执行商户的业务程序
                
        //注意：
        //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
        //判断该笔订单是否在商户网站中已经做过处理
            //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
            //如果有做过处理，不执行商户的业务程序
                
        //注意：
        //付款完成后，支付宝系统发送该交易状态通知

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
                $Order = Order::find()->where(['id' => $out_trade_no])->one();

                $Order->status = 1;
                $Order->tradeno = $trade_no;
                $Order->update();
            }

    //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
                echo "success";     //请不要修改或删除
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            }
            else{
    //验证失败
                echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            }
		}

        public function actionPaysuccess(){

            $alipayNotify = new AlipayNotify($this->alipay_config);
            $verify_result = $alipayNotify->verifyReturn();
            if($verify_result) {//验证成功
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //请在这里加上商户的业务逻辑程序代码
                
                //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
                //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

                //商户订单号

                $out_trade_no = $_GET['out_trade_no'];
                //logResult("out_trade_no: ".$out_trade_no);
                //支付宝交易号

                $trade_no = $_GET['trade_no'];
                //logResult("trade_no: ".$trade_no);
                //交易状态
                $trade_status = $_GET['trade_status'];
                //logResult("trade_status: ".$trade_status);

                if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                    //判断该笔订单是否在商户网站中已经做过处理
                        //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                        //如果有做过处理，不执行商户的业务程序

                    $Order = Order::find()->where(['id' => $out_trade_no])->one();

                    $Order->status = 1;
                    $Order->tradeno = $trade_no;
                    if($Order->update()){
                        return $this->redirect(Url::to(['site/ordersuccess']));
                    }


                }
                else {
                    echo "trade_status=".$_GET['trade_status'];
                }
                    
                echo "验证成功<br />";

                //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
                
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            }
            else {
                //验证失败
                //如要调试，请看alipay_notify.php页面的verifyReturn函数
                echo "验证失败";
            }
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