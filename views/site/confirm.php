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
            <?php
            foreach ($address as $add){?>
                <div class="oneAddr">
                    <div class="oneBox">
                        <div class="addressId" style="display: none;"><?=$add->id?></div>
                        <div class="addressText">地址：</div>
                        <div class="address"><?=$add->location?></div>
                        <div class="addressText">详细地址：</div>
                        <div class="address"><?=$add->address?></div>
                        <div class="telephone">
                            <span>电话：</span>
                            <span><?=$add->telephone?></span>
                        </div>
                        <div class="postcode">
                            <span>邮编：</span>
                            <span><?=$add->code?></span>
                        </div>
                        <div class="receiver">
                            <span>收件人：</span>
                            <span><?=$add->receiver?></span>
                        </div>
                    </div>


                </div>
            <?php }
            ?>
            <div class="oneAddr addAddr">

                    <div class="oneBox">
                        <div class="addPic"><a data-toggle="modal" data-target="#addrModal">
                            <span class="glyphicon glyphicon-plus"></a></span>
                        </div>
                    </div>
                <div class="addText"><a data-toggle="modal" data-target="#addrModal" style="cursor: pointer">添加一个新的收货地址</a></div>

            </div>
        </div>
    </div>
    <div class="modal fade addrModalBox" id="addrModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">
            ×
        </button>
        <div class="modal-dialog">
            <div class="boxHeader">
                <span>收货地址</span>
            </div>
            <div class="boxContent">
                <div id="cityConfirmForm">
                    <select class="select" name="province" id="s1">
                        <option></option>
                    </select>
                    <select class="select" name="city" id="s2">
                        <option></option>
                    </select>
                    <select class="select" name="town" id="s3">
                        <option></option>
                    </select>
                    <input id="address" name="address" type="hidden" value="" />
                    <div style="text-align: center">
                        <div class="formItem">
                            <span class="formText"> 详细地址</span>
                            <span class="formArea"><input type="text" name="addrDetail"/></span>
                        </div>
                        <div class="formItem">
                            <span class="formText"> 电话</span>
                            <span class="formAreaHalf"><input type="text" name="receiverPhone"/></span>
                            <span class="formText"> 收货人</span>
                            <span class="formAreaHalf"><input type="text" name="receiverName"/></span>
                        </div>
                        <div class="formItem">
                            <span class="formText"> 邮编</span>
                            <span class="formAreaHalf"><input type="text" name="receiverCode"/></span>
                            <span class="btn btn-success" id="submitNewAddr"> 确认添加</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="confirmArea">
        <div class="orderTitle">
            <span id="orderTime"><?=date('Y-m-d',time());?></span>
            <span style="margin-left: 10px;">订单号：</span>
            <span id="orderNumber"></span>
        </div>
        <div class="orderContent">
            <div class="orderPic">
                <img id="confirmShirtColor" src="<?=Url::to('@web/img/teef1.png');?>">
                <img src="" id="renderEditPic">
            </div>
            <div class="orderNum">
                <div class="row">
                        <span class="numText">尺寸</span>
                        <div class="numOption">
                            <span class="glyphicon glyphicon-minus" id="minusConfirmSize"></span>
                            <span class="showBuyNum" id="orderSizeInit">L</span>
                            <span class="glyphicon glyphicon-plus" id="addConfirmSize"></span>
                        </div>
                </div>
                <div class="row">
                    <span class="numText">数量</span>
                    <div class="numOption">
                        <span class="glyphicon glyphicon-minus" id="minusConfirmNum"></span>
                        <span class="showBuyNum" id="orderNumInit">1</span>
                        <input class="form-control" id="inputConfirmTeeNum">
                        <span class="glyphicon glyphicon-plus" id="addConfirmNum"></span>
                    </div>
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
        <div class="modal fade addrModalBox" id="payModal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">
                ×
            </button>
            <div class="modal-dialog">
                <div class="boxHeader">
                    <span>支付订单</span>
                </div>
                <div class="boxContent">
                    <div style="height:50px;"></div>
                    <span class="paySuccess"><a href="<?=Url::to(['site/ordersuccess'])?>"> 支付成功<i class="glyphicon glyphicon-ok"></i></a></span>
                    <span class="payError"><a href="<?=Url::to(['site/ordermanage'])?>">支付失败<i class="glyphicon glyphicon-remove"></i></a> </span>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->beginBlock("confirm")?>
$(function() {

$.getScript("<?=Url::to('@web/js/confirm.js');?>");
});
<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['confirm'],\yii\web\View::POS_END)?>
