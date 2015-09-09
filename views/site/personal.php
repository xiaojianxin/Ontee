<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiye
 * Date: 15/8/31
 * Time: 下午10:42
 */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Ontee';
?>
<div class="container" style="width:960px;">
    <div class="userTitleText">
        <span>基本资料</span>
        <span>安全中心</span>
    </div>
    <div class="userTitle">
        <div class="userPic">
            <div class="img-thumbnail" id="showUserHead">
            </div>
            <div style="height:5px">
            </div>
            <span id="uploadPicBt">点击上传头像</span>
        </div>

        <div class="userItemText">
           <ul>
               <li>用户名:</li>
               <li>昵称:</li>
               <li>邮箱:</li>
               <li>个人说明:</li>
           </ul>

        </div>
        <div class="userItemInput">
            <input class="form-control" type="text" name="userName">
            <input class="form-control" type="text" name="nickName">
            <input class="form-control" type="email" name="userEmail">
            <textarea class="form-control" name="userIntro"></textarea>
            <div id="updateUserInfo">
                <img src="<?=Url::to('@web/img/save.png');?>"/>
            </div>
        </div>
        <div class="userChangeArea">
            <div class="safeIcon" id="safeIcon">

                <img src="<?=Url::to('@web/img/safe.png');?>"/>
                <h5>安全认证</h5>
            </div>
            <div class="thirdShow">
                <div class="editPhoneArea editClass">
                    <div style="margin-left: -80px;color: #858585;">绑定新手机</div>
                    <div class="left-side">
                        <div>手机号码:</div>
                        <div>验证码:</div>
                    </div>
                    <div class="right-side">
                        <input type="text" name="newPhone" class="form-control"/>
                        <input type="text" name="newPhoneCode" class="form-control"/>

                    </div>
                    <div class="confirmBtn"><div class="btn btn-success"> 确定</div> </div>
                </div>
                <div class="editPswArea editClass">
                    <div style="margin-left: -80px;color: #858585;">修改密码</div>
                    <div class="left-side">
                        <div>旧密码:</div>
                        <div>新密码:</div>
                        <div>确认密码:</div>
                    </div>
                    <div class="right-side">
                        <input type="password" name="oldPsw" class="form-control"/>
                        <input type="password" name="newPsw" class="form-control"/>
                        <input type="password" name="confirmPsw" class="form-control"/>
                    </div>
                    <div class="confirmBtn"><div class="btn btn-success"> 确定</div> </div>
                </div>
            </div>
            <div class="secondShow">
                <div class="currentPhone">
                    <div class="left-side">
                        <div>当前手机</div>
                        <div>180XXXX0000</div>
                    </div>
                    <div class="right-side">
                        <div class="btn btn-default">绑定新手机</div>
                    </div>

                </div>
                <div class="editPsw">
                    <div>修改密码</div>

                </div>
            </div>


        </div>
    </div>
    <div class="selfAddManage">
        <h5>收货地址管理</h5>
         <div class="oneSelfAddr">
             <div class="thumbnail">
                 <div style="width: 75%;margin-left: 30px;margin-top: 15px; float:left;">
                     <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                     <span>收货人：</span><span>XXX</span>
                     <span>电话：</span><span>1800000000</span>
                     <span>邮编：</span><span>100876</span>
                 </div>
                 <div class="manageButton" style="float: left;margin-top: 20px;">
                     <span>修改</span><span>｜</span><span>删除</span>
                 </div>

             </div>
         </div>
        <div class="oneSelfAddr">
            <div class="thumbnail">
                <div style="width: 75%;margin-left: 30px;margin-top: 15px; float:left;">
                    <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                    <span>收货人：</span><span>XXX</span>
                    <span>电话：</span><span>1800000000</span>
                    <span>邮编：</span><span>100876</span>
                </div>
                <div class="manageButton" style="float: left;margin-top: 20px;">
                    <span>修改</span><span>｜</span><span>删除</span>
                </div>

            </div>
        </div>
        <div class="oneSelfAddr">
            <div class="thumbnail">
                <div style="width: 75%;margin-left: 30px;margin-top: 10px; float:left;">
                    <div class="orderText">地址：上海市 上海 闵行区 秀文路898号西子国际中心1709</div>
                    <span>收货人：</span><span>XXX</span>
                    <span>电话：</span><span>1800000000</span>
                    <span>邮编：</span><span>100876</span>
                </div>
                <div class="manageButton" style="float: left;margin-top: 15px;">
                    <span>修改</span><span>｜</span><span>删除</span>
                </div>


            </div>
        </div>
        <div class="addAddrButton">
                <span class="glyphicon glyphicon-plus"></span>
                <a href="">添加一个新的收货地址</a>
        </div>
    </div>

</div>
