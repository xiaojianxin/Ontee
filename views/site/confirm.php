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
    <div class="row">
        <div class="col-xs-12">
            <div class="confirmText">
                选择你的收货地址
            </div>
        </div>
    </div>
    <div class="addressContainer">
        <div class="row">
            <div class="oneAddr  active">

                    <div class="oneBox">
                        <div class="addressText">地址：</div>
                        <div class="address">上海市 上海 闵行区 秀文路898号
                            西子国际中心1709</div>
                        <div class="telephone">
                            <span>电话：</span>
                            <span>1800000000</span>
                        </div>
                        <div class="postcode">
                            <span>邮编：</span>
                            <span>100876</span>
                        </div>
                        <div class="receiver">
                            <span>收件人：</span>
                            <span>XXX</span>
                        </div>
                    </div>


            </div>
            <div class="oneAddr">

                    <div class="oneBox">
                        <div class="addressText">地址：</div>
                        <div class="address">上海市 上海 闵行区 秀文路898号
                            西子国际中心1709</div>
                        <div class="telephone">
                            <span>电话：</span>
                            <span>1800000000</span>
                        </div>
                        <div class="postcode">
                            <span>邮编：</span>
                            <span>100876</span>
                        </div>
                        <div class="receiver">
                            <span>收件人：</span>
                            <span>XXX</span>
                        </div>
                    </div>


            </div>
            <div class="oneAddr addAddr">

                    <div class="oneBox">
                        <div class="addPic">
                            <span class="glyphicon glyphicon-plus"></span>
                        </div>
                    </div>
                <div class="addText">点击添加一个新的地址</div>

            </div>
        </div>
    </div>
    <div class="addAddrArea" >

    </div>
    <div class="confirmArea">
        <div class="orderTitle">
            <span id="orderTime">2015-05-02</span>
            <span style="margin-left: 10px;">订单号：</span>
            <span id="orderNumber">87342993</span>
        </div>
        <div class="orderContent">
            <div class="orderPic">
                <img src="<?=Url::to('@web/img/teebb.png');?>">
            </div>
            <div class="orderNum">
                <div class="row">
                        <span class="numText">尺寸</span>
                        <div class="numOption">
                            <span class="glyphicon glyphicon-minus"></span>
                            <span class="showBuyNum" id="orderSizeInit">L</span>
                            <span class="glyphicon glyphicon-plus"></span>
                        </div>
                </div>
                <div class="row">
                    <span class="numText">数量</span>
                    <div class="numOption">
                        <span class="glyphicon glyphicon-minus"></span>
                        <span class="showBuyNum" id="orderNumInit">1</span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </div>
                </div>
            </div>
            <div class="paynum">
                <span>支付金额：</span>
                <span>79元</span>
            </div>

        </div>
        <div class="payButton btn btn-success">支付
        </div>
    </div>
</div>
<?php $this->beginBlock("confirm")?>
$(function() {
$.getScript("<?=Url::to('@web/js/confirm.js');?>",function(){
var confirm= new orderConfirm();
confirm.init();
});
});
<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['confirm'],\yii\web\View::POS_END)?>
