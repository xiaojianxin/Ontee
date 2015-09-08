<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiye
 * Date: 15/8/12
 * Time: 下午2:16
 */
use yii\helpers\Url;
$this->title = 'Ontee';
?>
<div class="chooseContent container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-2 teePic">
            <img src="<?=Url::to('@web/img/teebf.png');?>" class="tShirtPic"/>
        </div>
        <div class="col-sm-4 teeArea">
            <div class="chooseItem">
                <span class="chooseText">性别</span>
                <span class="chooseOption">
                    <span class="boyTee active"><img src="<?=Url::to('@web/img/male.png');?>"/></span>
                    <span class="girlTee"><img src="<?=Url::to('@web/img/female.png');?>"/></span>
                </span>
            </div>
            <div class="chooseItem">
                <span class="chooseText">版型</span>
                <span class="chooseOption">
                    <span class="style1 active"><img src="<?=Url::to('@web/img/style1.png');?>"/></span>
                    <span class="style2"><img src="<?=Url::to('@web/img/style2.png');?>"/></span>
                </span>
            </div>
            <div class="chooseItem">
                <span class="chooseText">颜色</span>
                <span class="chooseOption color">
                    <span class="black active"><img src="<?=Url::to('@web/img/trans.png');?>"/></span>
                    <span class="grey"><img src="<?=Url::to('@web/img/trans.png');?>"/></span>
                    <span class="white"><img src="<?=Url::to('@web/img/trans.png');?>"/></span>
                </span>
            </div>
            <div class="nextStepButton" id="nextStepButton">
                <img src="<?=Url::to('@web/img/nextbutton.png');?>"/>
            </div>
        </div>

    </div>
</div>
<div class="editContent container" style="min-width: 720px;">
    <div class="sideSelect">
        <span class="r-Side">正</span>
        <span class="l-Side active">反</span>
    </div>
    <div class="colorPicker">
        <div  id="textColor">

        </div>

    </div>
    <div class="textEditBox" id="textEditBox">
        <div style="height: 10px;"></div>
        <div class="item">
            <span class="lText">字体：</span>
            <span class="fontChoose">
                <select id="fontList">

                </select>
            </span>
        </div>
        <div class="item">
            <span class="lText">加粗：</span>
            <span class="fontBold">
                <label>
                    <input type="checkbox"> 加粗
                </label>
            </span>
        </div>

        <div class="item">
            <span class="lText">倾斜：</span>
             <span class="fontBold">
                <label>
                    <input type="checkbox"> 倾斜
                </label>
            </span>
        </div>
        <div style="font-size: 12px;margin-left: 5px;margin-top: 5px;">
            <span class="lText">输入文字：</span>
            <input class="form-control" placeholder="请输入文字" name="textAreaValue"/>
        </div>
        <div class=" btn btn-success" id="confirmText">修改文字 </div>

    </div>
    <div class="colorPicker">
        <div  id="picColor">

        </div>

    </div>
    <div class="svgIconBox" id="svgIconBox">
        <svg id="svgIcons" xmlns = "http://www.w3.org/2000/svg" class="icon">
<!--            <use xlink:href="--><?//=Url::to('@web/img/capicon.svg#Icon_1_')?><!--"></use>-->
<!--            <image src="--><?//=Url::to('@web/img/capicon.svg#Icon_1_')?><!--" height="800" width="800"></image>-->

        </svg>
    </div>
    <div class="teeEditPic">
        <div id="saveArea">
            <img src="<?=Url::to('@web/img/teebf.png')?>" class="tShirtPic"/>
        </div>
        <div class="printArea" id="printArea">
            <svg id="mySvg" xmlns = "http://www.w3.org/2000/svg">
                <rect x="0" y="0" width="180" height="300" r="0" rx="0" ry="0" fill="#000000" stroke="#ffffff"
                      fill-opacity="0" transform="matrix(1,0,0,1,0,0)" stroke-width="5" style=""></rect>
                <rect x="15" y="15" width="150" height="30" r="0" rx="5" ry="5" fill="#000000" stroke="#ffffff"
                      transform="matrix(1,0,0,1,0,0)" stroke-width="2" style="display: none;" id="text-Area">
                </rect>
                <g id="upPic"></g>

            </svg>
        </div>
    </div>

    <div class="templateBoxes">

    </div>
    <div class="buttonsArea">
        <span class="insertText" id="insertText">
            <i class="">T</i>
        </span>
        <span class="insertPic" id="insertPic">
            <i class="glyphicon glyphicon-picture"></i>
        </span>
        <span class="uploadPic" id="uploadPic">
             <i class="glyphicon glyphicon-upload"></i>
        </span>
    </div>
    <div class="buttonTextArea">
        <span class="insertText" >插入文字</span>
        <span class="insertPic" >插入图形</span>
        <span class="uploadPic" >上传图片</span>
        <input type="file" id="chosenPic" name="uploadPic"/>
    </div>
    <div class="preNextButton">
        <span class="previousBtn"><img src="<?=Url::to('@web/img/backbutton.png');?>"/> </span>
        <span class="nextBtn">

           
        <img src="<?=Url::to('@web/img/nextbutton.png');?>"/></span>
    </div>
    <canvas id="printCanvas" width="180px" height="300px" style="display: none"></canvas>
    <img src="" id="myImg">
</div>
