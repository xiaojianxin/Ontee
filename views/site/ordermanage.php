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

    <div class="confirmArea">
        <div class="orderTitle">
            <span>2015-05-02</span>
            <span style="margin-left: 10px;">订单号：</span>
            <span>87342993</span>
        </div>
        <div class="orderContent1">
            <div class="orderPic1">
                <img src="<?=Url::to('@web/img/teebb.png');?>">
            </div>
            <div class="orderInfo">
                <span>尺码：</span><span>M</span>
                <span>数量：</span><span>1</span>
                <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                <span>收货人：</span><span>XXX</span>
                <span>电话：</span><span>1800000000</span>
                <span>邮编：</span><span>100876</span>
            </div>
            <div class="orderNum1">
                <a>更改尺寸和数量</a><br/>
                <a>更换收货地址</a>
            </div>
            <div class="paynum">
                <span>支付金额：</span>
                <span>79元</span>
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

     <div class="confirmArea ordersList">
         <div class="orderTitle">
             <span>2015-05-02</span>
             <span style="margin-left: 10px;">订单号：</span>
             <span>87342993</span>
         </div>
         <div class="orderContent1">
             <div class="orderPic1">
                 <img src="<?=Url::to('@web/img/teebb.png');?>">
             </div>
             <div class="orderInfo">
                 <span>尺码：</span><span>M</span>
                 <span>数量：</span><span>1</span>
                 <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                 <span>收货人：</span><span>XXX</span>
                 <span>电话：</span><span>1800000000</span>
                 <span>邮编：</span><span>100876</span>
             </div>
             <div class="showState">
                 <div>已完成订单</div>
                 <div>查看物流</div>
             </div>
         </div>
     </div>
     <div class="confirmArea ordersList">
              <div class="orderTitle">
                  <span>2015-05-02</span>
                  <span style="margin-left: 10px;">订单号：</span>
                  <span>87342993</span>
              </div>
              <div class="orderContent1">
                  <div class="orderPic1">
                      <img src="<?=Url::to('@web/img/teebb.png');?>">
                  </div>
                  <div class="orderInfo">
                      <span>尺码：</span><span>M</span>
                      <span>数量：</span><span>1</span>
                      <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                      <span>收货人：</span><span>XXX</span>
                      <span>电话：</span><span>1800000000</span>
                      <span>邮编：</span><span>100876</span>
                  </div>
                  <div class="showState">
                      <div>已完成订单</div>
                      <div>查看物流</div>
                  </div>
              </div>
          </div>
          <div class="confirmArea ordersList">
                   <div class="orderTitle">
                       <span>2015-05-02</span>
                       <span style="margin-left: 10px;">订单号：</span>
                       <span>87342993</span>
                   </div>
                   <div class="orderContent1">
                       <div class="orderPic1">
                           <img src="<?=Url::to('@web/img/teebb.png');?>">
                       </div>
                       <div class="orderInfo">
                           <span>尺码：</span><span>M</span>
                           <span>数量：</span><span>1</span>
                           <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                           <span>收货人：</span><span>XXX</span>
                           <span>电话：</span><span>1800000000</span>
                           <span>邮编：</span><span>100876</span>
                       </div>
                       <div class="showState">
                           <div>已完成订单</div>
                           <div>查看物流</div>
                       </div>
                   </div>
               </div>



</div>
