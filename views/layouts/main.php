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
            <div class="col-sm-4 col-sm-offset-2">
                <img src="/Ontee/web/img/logo.png" style="margin-top:-20px;width:35%;"/>
            </div>
            <div class="col-sm-6 nav-item">
                <span>首页</span>
                <span>认识ONTEE</span>
                <span>我的T恤</span>
                <span><a data-toggle="modal" data-target="#register">登录</a>｜<a href="">注册</a>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    This Modal title
                </h4>
            </div>
            <div class="modal-body">
                Add some text here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Close
                </button>
                <button type="button" class="btn btn-primary">
                    Submit changes
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $this->beginBody() ?>

            <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
