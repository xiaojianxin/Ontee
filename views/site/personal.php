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
        <?php
        echo '
        <div class="userItemInput">
            <input class="form-control" type="text" name="userName" placeholder= $user->username />
            <input class="form-control" type="text" name="nickName" placeholder=$user->nickname>
            <input class="form-control" type="email" name="userEmail" placeholder=$user->email>
            <textarea class="form-control" name="userIntro" id="userIntro"></textarea>
        </div>
        '


        ?>
        <div id="updateUserInfo">
            <img src="<?=Url::to('@web/img/save.png');?>"/>
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
        <?php
        foreach ($address as $add){
            echo "<div class='oneSelfAddr'>
             <div class='thumbnail'>
                 <div style='width: 75%;margin-left: 30px;margin-top: 15px; float:left;'>
                     <div class='orderText'>地址：$add->location</div>
                     <span>收货人：</span><span class='showForm'>$add->receiver</span>
                     <span>电话：</span><span class='showForm'>$add->telephone</span>
                     <span>邮编：</span><span class='showForm'>$add->code</span>
                 </div>
                 <div class='manageButton' style='float: left;margin-top: 20px;'>
                     <span>修改</span><span>｜</span><span>删除</span>
                 </div>
             </div>
         </div>";
        }
        ?>
        <div class="addAddrButton">
               <a data-toggle="modal" data-target="#addrModal">
                <span class="glyphicon glyphicon-plus"></span>
               </a>
                <a data-toggle="modal" data-target="#addrModal" style="cursor: pointer">添加一个新的收货地址</a>
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
            <div id="cityForm">
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
                        <span class="formAreaHalf"><input type="password" name="receiverPhone"/></span>
                        <span class="formText"> 收货人</span>
                        <span class="formAreaHalf"><input type="text" name="receiverName"/></span>
                    </div>
                    <div class="formItem">
                        <span class="formText"> 邮编</span>
                        <span class="formAreaHalf"><input type="password" name="receiverCode"/></span>
                        <span class="btn btn-success" id="submitNewAddr"> 确认添加</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php $this->beginBlock("personal")?>
 
    $.getScript("<?=Url::to('@web/js/personal.js');?>");
<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['personal'],\yii\web\View::POS_END)?>