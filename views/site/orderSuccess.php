<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiye
 * Date: 15/10/7
 * Time: 上午11:25
 */
use yii\helpers\Url;
$this->title = 'Ontee';
?>
<div class="container">
    <div id="orderSuccess" style="text-align: center;margin-top: 80px;">
        <h2>支付成功，<span id="mes">5</span>秒后跳转到订单页面</h2>
    </div>
</div>
<?php $this->beginBlock("ordersuccess")?>
$(function() {
    var i = 5;
    var intervalid;
    intervalid = setInterval("fun()", 1000);
    fun=function() {
        if (i == 0) {
            window.location.href = "./ordermanage";
            clearInterval(intervalid);
        }
        document.getElementById("mes").innerHTML = i;
        i--;
    }
});

<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['ordersuccess'],\yii\web\View::POS_END)?>
