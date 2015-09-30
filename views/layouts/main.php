<?php
use app\assets\AppAsset;
use yii\web\Session;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$username = $this->context->layout_data;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ONTEE</title>
    <?php $this->head()?>

</head>
<body>


<div class="nav-head">
    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-xs-offset-2">
                <img src="<?=Url::to('@web/img/logo.png');?>" style="width: 80%;margin-top: -14%;min-width: 100px;"/>
            </div>
            <div class="col-xs-6 nav-item col-xs-offset-2">
                <span><a href="<?=Url::to(['site/index'])?>"> 首页</a></span>

                <span><a href="<?=Url::to(['site/choose'])?>"> 认识ONTEE</a></span>
                <span><a href="<?=Url::to(['site/Mytshirts'])?>"> 我的T恤</a></span>
                

                <?php 
                if(empty($username)){
                    ?>
                    <span>
                        <a data-toggle="modal" data-target="#modalBox" id="signInButton">登录</a>
                    ｜<a data-toggle="modal" data-target="#modalBox"  id="registerButton">注册</a>
                    </span>

                <?PHP
                }
                else{
                    ?>
                    <span class="user-nav">
                        <a class="dropdown-toggle operator-name" data-toggle="dropdown"><img src="<?=Url::to('@web/img/head.png');?>" alt=""/><?PHP echo $username?></a>
                        <ul class="dropdown-menu self-menu">
                            <li>
                                <a href="<?=Url::to(['site/personal'])?>"><span class="glyphicon glyphicon-envelope"></span>个人资料&收货地址</a>
                            </li>
                            <li>
                                <a href="<?=Url::to(['site/ordermanage'])?>"><span class="glyphicon glyphicon-envelope"></span>订单管理</a>
                            </li>
                            <li>
                                <a href="<?=Url::to(['site/logout'])?>"><span class="glyphicon glyphicon-envelope"></span>退出登录</a>
                            </li>
                        </ul>
                    </span>
                    <?PHP
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalBox" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <div class="modal-dialog">
        <div class="boxHeader">
            <span id="signInItem">登录</span>
            <span id="registerItem">注册</span>
        </div>
        <div class="boxContent">
            <div id="signInContent">

                <div class="formItem">
                    <span class="formText">用户名/手机号码</span>
                    <span class="formArea"><input type="text" id="signUrn" ></span>
                </div>
                <div class="formItem">
                    <span class="formText">密码</span>
                    <span class="formArea"><input type="password" id="signPsw"></span>
                </div>


                <button class="btn signIn" id="signIn">登录</button>
                <div class="errorText signInError"></div>
            </div>
            <div id="successContent">

                <div class="signInSuccess">
                    <h2>登录成功</h2>
                </div>
            </div>
            <div id="registerContent">

                <div class="formItem">
                    <span class="formText">手机号码</span>
                    <span class="formArea"><input id="telephone" type="text" ></span>
                </div>
                <div class="formItem">
                    <span class="formText">验证码</span>
                    <span class="formAreaHalf"><input type="text" id="confirmCode"></span>
                    <span class="formAreaHalf"><span id="testCode">点击收取验证码</span></span>
                </div>
                <button class="btn signIn" id="nextRegister">Next<br/>下一步</button>
                <div class="errorText registerError1"></div>


            </div>
            <div id="registerConfirm">

                <div class="formItem">
                    <span class="formText">设置密码</span>
                    <span class="formArea"><input type="password" id="inputPsw" ></span>
                </div>
                <div class="formItem">
                    <span class="formText">确认密码</span>
                    <span class="formArea"><input type="password" id="confirmPsw" ></span>
                </div>

                <button class="btn signIn" id="registerBtn">注册</button>
                <div class="errorText registerError2"></div>

            </div>
        </div>

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $this->beginBlock("sign")?>
$.getScript("<?=Url::to('@web/js/sign.js');?>");
<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['sign'],\yii\web\View::POS_END)?>
<?php $this->beginBody() ?>

            <?= $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
