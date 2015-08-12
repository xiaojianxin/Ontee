<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="flexslider">
    <ul class="slides">
        <li>
            <img src="/Ontee/web/img/slide.jpg"/>
        </li>
        <li>
            <img src="/Ontee/web/img/slide.jpg"/>
        </li>
        <li>
            <img src="/Ontee/web/img/slide.jpg"/>
        </li>
    </ul>
</div>
<div class="fixBox">
    <h1>JUST 3 STEPS</h1>
    <h3>只需要三步你就能拥有只属于自己T恤</h3>
</div>
<div class="fixButton">
    <span class="circleButton"> <a href=""> 认识<br/>Ontee</a></span>
    <span class="circleButton"> <a href=""> 立即<br/>制作</a></span>
</div>
<?php $this->beginBlock("slide")?>

$(function() {
    $(".flexslider").flexslider({
        animation:"slide",
        slideshowSpeed:2000,
        directionNav:false
    });
});
<?php $this->endBlock()?>
<?php $this->registerJs($this->blocks['slide'],\yii\web\View::POS_END)?>
