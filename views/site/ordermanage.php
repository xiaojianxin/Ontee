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

    <?php
   foreach ($orders as $order){ if($order->status==0){?>

    <div class="confirmArea">
           <div class="orderTitle">
               <span><?=$order->createtime?></span>
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

               </div>
               <div class="orderNum1">
                   <a>更改尺寸和数量</a><br/>
                   <a>选择收货地址</a>
               </div>
               <div class="paynum">
                   <span>支付金额：</span>
                   <span><?=$order->price?>元</span>
               </div>
           </div>
       </div>
       <div class="choosepay">
           <span>30分钟内不支付订单将失效</span>
           <span class="payway">支付宝</span>
           <span class="payway">微信</span>
       </div>
       <div style="height:40px;">
             <div class="payButton1 btn btn-success">支付</div>
       </div>
   <?php }}
   ?>
 <?php
   foreach ($orders as $order){ if($order->status==1){?>

    <div class="confirmArea orderList">
           <div class="orderTitle">
               <span><?=$order->createtime?></span>
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
