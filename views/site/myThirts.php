<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiye
 * Date: 15/9/30
 * Time: 下午5:10
 */
use yii\helpers\Url;
$this->title = 'Ontee';
?>
<div class="container" style="width:980px;margin-top:20px;">
    <div class="tshirtsList" id="itemContainer">
        <div class="row">
            <?php
            foreach ($orders as $order){ ?>
            <div class="col-xs-3">
                <div class="oneTshirt">
                    <img src="<?=Url::to('@web/img/teef'.$order->type.".png");?>">
                    <img class="printSelfTshirt" src="<?=Url::to('@web/'.$order->frontpic);?>">
                    <div class="btnArea">
                        <span>删除</span><span>|</span><span>购买</span>
                    </div>
                </div>
                <div class="productInfo">
                    <div>产品名称</div>
                    <div>创建时间：<?=date('Y-m-d',$order->createtime)?></div>
                </div>
            </div>
          <?php } ?>

        </div>
    </div>
    <div class="row">
        <div class="myholder myshirtHolder">
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
        <div class="doAnotherBtn">
            <img src="<?=Url::to('@web/img/doanother.png');?>">
        </div>
    </div>
    <div class="row" style="height: 40px;">

    </div>

</div>
<?php $this->beginBlock("myshirt")?>
$(function() {
$.getScript("<?=Url::to('@web/js/myshirt.js');?>");
});




<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['myshirt'],\yii\web\View::POS_END)?>
