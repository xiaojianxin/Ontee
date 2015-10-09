<?php
require_once("alipay_core.function.php");
require_once("alipay_submit.class.php");

 require_once("Liu.php");


class Alipay{
        private $alipay_config;
        public function init()
        {
            require_once("alipay.config.php");
            $this->alipay_config = $alipay_config;
        }
        function myPay($trade_no, $subject, $fee) {
                $this->init();
        		/**************************请求参数**************************/

        		//支付类型
        		$payment_type = "1";
        		//必填，不能修改
        		//服务器异步通知页面路径
        		$notify_url = "http://www.ontee.cn/pay/confirmpay";
        		//需http://格式的完整路径，不能加?id=123这类自定义参数

        		//页面跳转同步通知页面路径
        		$return_url = "http://www.ontee.cn/pay/paysuccess";
        		//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        		//商户订单号
        		$out_trade_no = $trade_no;
        		//商户网站订单系统中唯一订单号，必填

        		//订单名称
        		$subject = $subject;
        		//必填

        		//付款金额
        		$total_fee = $fee;
        		//必填
        		//订单描述

        		//$body = $_POST['WIDbody'];
                $body = '';

        		//商品展示地址
        		//$show_url = $_POST['WIDshow_url'];
                $show_url = '';
        		//需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html

        		//防钓鱼时间戳
        		$anti_phishing_key = "";
        		//若要使用请调用类文件submit中的query_timestamp函数

        		//客户端的IP地址
        		$exter_invoke_ip = "";
        		//非局域网的外网IP地址，如：221.0.0.1


				/************************************************************/

				//构造要请求的参数数组，无需改动
				$parameter = array(
					"service" => "create_direct_pay_by_user",
					"partner" => trim($this->alipay_config['partner']),
					"seller_email" => trim($this->alipay_config['seller_email']),
					"payment_type"	=> $payment_type,
					"notify_url"	=> $notify_url,
					"return_url"	=> $return_url,
					"out_trade_no"	=> $out_trade_no,
					"subject"	=> $subject,
					"total_fee"	=> $total_fee,
					"body"	=> $body,
					"show_url"	=> $show_url,
					"anti_phishing_key"	=> $anti_phishing_key,
					"exter_invoke_ip"	=> $exter_invoke_ip,
					"_input_charset"	=> trim(strtolower($this->alipay_config['input_charset']))
				);

				//建立请求
				$alipaySubmit = new Alipaysubmit($this->alipay_config);
				$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
				echo $html_text;
        }
}

?>