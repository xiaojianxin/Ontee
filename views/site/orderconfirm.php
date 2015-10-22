<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiye
 * Date: 15/8/12
 * Time: 下午2:16
 */
use yii\helpers\Url;
$this->title = 'Ontee';
?>
<div class="container" style="width:960px;">
    <h2 style="font-size: 24px;">订单确认</h2>
    <div class="confirmArea">
        <div class="orderTitle">
            <span id="orderTime"><?=date('Y-m-d',time());?></span>
            <span style="margin-left: 10px;">订单号：</span>
            <span id="orderNumber"><?=$order['id']?></span>
        </div>
        <div class="orderContent">
            <div class="orderPic">
                <img id="confirmShirtColor" src="<?=Url::to('@web/img/teef1.png');?>">
                <img src="<?=Url::to('@web/'.$order->frontpic);?>" id="renderEditPic">
            </div>

            <div class="orderInfo">
	             <span>尺码：</span><span class="unpaySize"><?=$order->size?></span>
	             <span>数量：</span><span class="unpayNum"><?=$order->num?></span>

	             <div class="unpayAddrInfo" style="">
             		 <div id="addressId" style="display: none;"><?=$address->id?></div>
	                 <div class="orderText showUnpayAddress">地址：<?=$address->location.$address->address?></div>
	                 <span class="selectAddrId" style="display:none;"></span>
	                 <span>收货人：<?=$address->receiver?></span><span class='showForm showUnpayReceiver'></span>
	                 <span>电话：<?=$address->telephone?></span><span class='showForm showUnpayPhone'></span>
	                 <span>邮编：<?=$address->code?></span><span class='showForm showUnpaycode'></span>
	             </div>
            </div>
            <div class="paynum">
                <span>支付金额：</span>
                <span id="showConfirmPrice">79元</span>
            </div>

        </div>
        <form action="/site/pay" target="_blank" method="post">
            <input name="orderId" style="display:none;" value=''>
            <input name="num" style="display:none;">
            <input name="price" style="display:none;">
            <input name="addressId" style="display:none;">
            <input id='submit' style="display:none;" type="submit" />
        </form> 
        
        <div id="confirmPayBtn" class="btn btn-success payButton">支付</div>
    </div>
</div>
<?php $this->beginBlock("confirm")?>
$(function() {

$.getScript("<?=Url::to('@web/js/confirm.js');?>");
});
<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['confirm'],\yii\web\View::POS_END)?>
