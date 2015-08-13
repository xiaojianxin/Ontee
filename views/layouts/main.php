<?php

use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
                <img src="./img/logo.png" style="width: 80%;margin-top: -14%;min-width: 100px;"/>
            </div>
            <div class="col-xs-6 nav-item col-xs-offset-2">
                <span><a href="index.php"> 首页</a></span>
                <span><a href="./choose.php"> 认识ONTEE</a></span>
                <span><a href=""> 我的T恤</a></span>
                <span><a data-toggle="modal" data-target="#modalBox" id="signInButton">登录</a>
                    ｜<a data-toggle="modal" data-target="#modalBox"  id="registerButton">注册</a>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalBox" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <span class="formArea"><input type="text" ></span>
                </div>
                <div class="formItem">
                    <span class="formText">验证码</span>
                    <span class="formAreaHalf"><input type="password" ></span>
                    <span class="formAreaHalf"><span>点击收取验证码</span></span>
                </div>
                <button class="btn signIn" id="nextRegister">Next<br/>下一步</button>
                <div class="errorText registerError1"></div>


            </div>
            <div id="registerConfirm">

                <div class="formItem">
                    <span class="formText">设置密码</span>
                    <span class="formArea"><input type="text" ></span>
                </div>
                <div class="formItem">
                    <span class="formText">确认密码</span>
                    <span class="formArea"><input type="password" ></span>
                </div>

                <button class="btn signIn">注册</button>
                <div class="errorText registerError2"></div>

            </div>
        </div>

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $this->beginBody() ?>

            <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
