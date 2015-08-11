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

