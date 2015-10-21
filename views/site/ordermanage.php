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
    <h2 style="font-size: 24px;">订单管理</h2>

   <div id="userOrderList">
    <?php
      foreach ($orders as $order){ if($order->status==0){?>

       <div class="confirmArea unpayOrders">
                     <div class="orderTitle">
                         <span><?=date('Y-m-d',$order->createtime)?></span>
                         <span style="margin-left: 10px;">订单号：</span>
                         <span class="orderId"><?=$order->id?></span>
                     </div>
                     <div class="orderContent1">
                         <div class="orderPic1">
                             <img src="<?=Url::to('@web/img/teebb.png');?>">
                             <img class='showOrderPrintSvg' src="<?=Url::to('@web/'.$order->frontpic);?>">
                         </div>
                         <div class="orderInfo">
                             <span>尺码：</span><span class="unpaySize"><?=$order->size?></span>
                             <span>数量：</span><span class="unpayNum"><?=$order->num?></span>

                             <div class="unpayAddrInfo" style="display:none;">
                                 <div class="orderText showUnpayAddress">地址：</div>
                                 <span class="selectAddrId" style="display:none;"></span>
                                 <span>收货人：</span><span class='showForm showUnpayReceiver'></span>
                                 <span>电话：</span><span class='showForm showUnpayPhone'></span>
                                 <span>邮编：</span><span class='showForm showUnpaycode'></span>
                             </div>



                         </div>

                         <div class="orderNum1">
                             <a class="changeUnpaySizeNum"data-toggle="modal" data-target="#changeUnpaySize" style="cursor: pointer">更改尺寸和数量</a><br/>
                             <a class="chooseUnpayAddr"data-toggle="modal" data-target="#chooseUnpayAddr" style="cursor: pointer">选择收货地址</a>
                         </div>
                         <div class="paynum">
                             <span>支付金额：</span>
                             <span><?=$order->price?>元</span>
                         </div>
                     </div>

                 <div class="choosepay">
                     <span>30分钟内不支付订单将失效</span>
                     <span class="payway">支付宝</span>
                     <span class="payway">微信</span>
                 </div>
                 <div style="height:40px;">
                       <div class="deleteButtonFinal btn btn-warning">取消订单</div>
                       <div class="payButtonFinal btn btn-success">支付</div>
                 </div>
       </div>

      <?php }}
      ?>
    <?php
      foreach ($orders as $order){ if($order->status==1&&!empty($order->address)){?>

              <div class="confirmArea orderList">
                    <div class="orderTitle">
                        <span><?=date('Y-m-d',$order->createtime)?></span>
                        <span style="margin-left: 10px;">订单号：</span>
                        <span><?=$order->id?></span>
                    </div>
                    <div class="orderContent1">
                        <div class="orderPic1">
                            <img src="<?=Url::to('@web/img/teebb.png');?>">
                            <img class='showOrderPrintSvg' src="<?=Url::to('@web/'.$order->frontpic);?>">
                        </div>
                        <div class="orderInfo">
                            <span>尺码：</span><span><?=$order->size?></span>
                            <span>数量：</span><span><?=$order->num?></span>
                            <div class="orderText">地址：<?=$order->address[0]->location.$order->address[0]->address?></div>
                            <span>收货人：</span><span><?=$order->address[0]->receiver?></span>
                            <span>电话：</span><span><?=$order->address[0]->telephone?></span>
                            <span>邮编：</span><span><?=$order->address[0]->code?></span>

                        </div>
                        <div class="showState">
                          <div>已完成订单</div>
                          <div>查看物流</div>
                        </div>
                    </div>
                </div>


      <?php }}
      ?>
   </div>
   <div class="row">
           <div class="myOrderHolder">
               <a class="jp-previous jp-disabled">← previous</a>
               <a class="jp-current">1</a>
               <span class="jp-hidden">...</span>
               <a>2</a>
               <a>3</a>
               <a>4</a>
               <a>5</a>
               <a class="jp-hidden">6</a>
               <a class="jp-hidden">7</a>
               <a class="jp-hidden">8</a>
               <a class="jp-hidden">9</a>
               <span>...</span>
               <a>10</a>
               <a class="jp-next">next →</a>
           </div>
       </div>
       <div class="modal fade addrModalBox" id="chooseUnpayAddr" tabindex="-1" role="dialog"
                       aria-labelledby="myModalLabel" aria-hidden="true">
                      <button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">
                          ×
                      </button>
                      <div class="modal-dialog">
                          <div class="boxHeader">
                              <span>收货地址</span>
                          </div>
                          <div class="boxContent">
                                <div id="addressBox" style="height:120px;overflow-y:scroll;">
                                            <?php
                                            foreach ($address as $add){?>
                                                <div class='oneSelfAddr' style="cursor:pointer;">
                                                    <div class='thumbnail' style="height:50px;">
                                                        <div style='width: 75%;margin-left: 30px; float:left;'>
                                                            <span class="addrId" style="display: none;"><?=$add->id?></span>
                                                            <div class='orderText address'>地址：<?=$add->location?></div>
                                                            <span>收货人：</span><span class='showForm receiver'><?=$add->receiver?></span>
                                                            <span>电话：</span><span class='showForm telephone'><?=$add->telephone?></span>
                                                            <span>邮编：</span><span class='showForm zipcode'><?=$add->code?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>

                          </div>

                      </div>
        </div>
        <div class="modal fade addrModalBox" id="changeUnpaySize" tabindex="-1" role="dialog"
                               aria-labelledby="myModalLabel" aria-hidden="true">
                              <button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">
                                  ×
                              </button>
                              <div class="modal-dialog">
                                  <div class="boxHeader">
                                      <span>修改尺寸和数目</span>
                                  </div>
                                  <div class="boxContent">
                                      <div class="chooseItem1">
                                          <div class="row">
                                              <div class="col-xs-3">
                                                  <span class="chooseText">尺码</span>
                                              </div>
                                              <div class="col-xs-6">
                                               <span class="chooseOption teeSize" id="teeSize">
                                                   <span>S</span>
                                                   <span>M</span>
                                                   <span>L</span>
                                                   <span>XL</span>
                                                   <span>XXL</span>
                                                   <span>XXXL</span>
                                              </span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="chooseItem1">
                                          <div class="row">
                                              <div class="col-xs-3">
                                                  <span class="chooseText">数量</span>
                                              </div>
                                              <div class="col-xs-6">
                                                  <div class="chooseOption">
                                                      <span class="glyphicon glyphicon-minus" id="cutTeeNum"></span>
                                                      <span class="showNum" id="teeNum">1</span>
                                                      <input class="form-control" id="inputTeeNum">
                                                      <span class="glyphicon glyphicon-plus" id="addTeeNum"></span>
                                                  </div>
                                              </div>
                                              <div class="col-xs-3 btn btn-success " id="changeSizeConfirm">确定</div>
                                          </div>
                                      </div>

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
                       <span>新增地址</span>
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
</div>
<?php $this->beginBlock("ordermanage")?>
$(function() {
$.getScript("<?=Url::to('@web/js/ordermanage.js');?>",function(){
var order= new ordermanage();
order.init();


});
});




<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['ordermanage'],\yii\web\View::POS_END)?>