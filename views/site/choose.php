<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiye
 * Date: 15/8/12
 * Time: 下午2:16
 */
$this->title = 'Ontee';
?>
<div class="chooseContent container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-2 teePic">
            <img src="./img/teebf.png" class="tShirtPic"/>
        </div>
        <div class="col-sm-4 teeArea">
            <div class="chooseItem">
                <span class="chooseText">性别</span>
                <span class="chooseOption">
                    <span class="boyTee active"><img src="./img/male.png"/></span>
                    <span class="girlTee"><img src="./img/female.png"/></span>
                </span>
            </div>
            <div class="chooseItem">
                <span class="chooseText">版型</span>
                <span class="chooseOption">
                    <span class="style1 active"><img src="./img/style1.png"/></span>
                    <span class="style2"><img src="./img/style2.png"/></span>
                </span>
            </div>
            <div class="chooseItem">
                <span class="chooseText">颜色</span>
                <span class="chooseOption color">
                    <span class="black active"><img src="./img/trans.png"/></span>
                    <span class="grey"><img src="./img/trans.png"/></span>
                    <span class="white"><img src="./img/trans.png"/></span>
                </span>
            </div>
            <div class="nextStepButton" id="nextStepButton">
                <img src="./img/nextbutton.png"/>
            </div>
        </div>

    </div>
</div>
<div class="editContent container" style="min-width: 720px;">
    <div class="sideSelect">
        <span class="r-Side">正</span>
        <span class="l-Side active">反</span>
    </div>
    <div class="teeEditPic">
        <img src="./img/teebf.png" class="tShirtPic"/>
    </div>
    <div class="templateBoxes">

    </div>
    <div class="buttonsArea">
        <span class="" id="insertText"><a href="">插入文字</a> </span>
        <span class="" id="insertPic"><a href="">插入图形</a> </span>
        <span class="" id="uploadPic"><a href="">上传图片</a> </span>
    </div>
    <div class="preNextButton">
        <span class="previousBtn"><img src="./img/backbutton.png"/> </span>
        <span class="nextBtn"><img src="./img/nextbutton.png"/> </span>
    </div>
</div>