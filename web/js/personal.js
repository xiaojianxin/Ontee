/**
 * Created by jiye on 15/9/8.
 */
var person;
person=function(){
    var me=this;
    this.init=function(){
        me.bindEvent();
    };
    this.uploader = WebUploader.create({
        // 选完文件后，是否自动上传。
        auto: true,
        // swf文件路径
        swf: '/img/Uploader.swf',
        // 文件接收服务端。
        server: '/save/upload',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#uploadPicBt',
        // 只允许选择图片文件。
        accept: {
            title: 'uploadform[file]',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });
    this.bindEvent=function(){
        $("#updateUserInfo").click(function(){
            me.updateInfoAjax();
        });
        me.uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                    '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                    '<div class="info">' + file.name + '</div>' +
                    '</div>'
                ),
                $img = $li.find('img');
            // $list为容器jQuery实例
            $("#showUserHead").append( $li );
            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            me.uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }
                $img.attr( 'src', src );
            }, 200,175);
        });
        me.uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress span');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
            }

            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        me.uploader.on( 'uploadSuccess', function( file ) {
            $( '#'+file.id ).addClass('upload-state-done');
        });

        // 文件上传失败，显示上传出错。
        me.uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                $error = $li.find('div.error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });
        // 完成上传完了，成功或者失败，先删除进度条。
        me.uploader.on( 'uploadComplete', function( file ) {
                $( '#'+file.id ).find('.progress').remove();
            });
        $("#cityForm").ready(function(){
            setup();
            preselect('北京市');
            promptinfo();
        });
        $("#submitNewAddr").click(function(){
            var address=document.getElementById('address').value;
            var detail=$("input[name='addrDetail']").val();
            var phone=$("input[name='receiverPhone']").val();
            var receiver=$("input[name='receiverName']").val();
            var zipCode=$("input[name='receiverCode']").val();
            $.ajax({
                type:"POST",
                url:"",
                dataType:"Json",
                data:{address:address,detail:detail,phone:phone,name:receiver,code:zipCode},
                success:function(){

                },
                error:function(){

                }
            })
        });
        $("#safeIcon").click(function(){
            $("#safeIcon").hide();
            $('.secondShow').show();
        });
        $(".currentPhone").click(function(){
            $(this).hide();
            $(".editPhoneArea").show();
        });
        $(".editPsw").click(function(){
            $(this).hide();
            $(".editPswArea").show();
        });

    };
    this.updateInfoAjax=function(){
        var userName=$("input[name='userName']").val();
        var nickName=$("input[name='nickName']").val();
        var userEmail=$("input[name='userEmail']").val();
        var userIntro=$("input[name='userIntro']").val();
        if(userName!=""&&nickName!="")
        {
            $.ajax({
                type:"POST",
                url:"",
                dataType:"Json",
                data:{username:userName,nickname:nickName,email:userEmail,userinfo:userIntro},
                success:function(){

                },
                error:function(){

                }
            })
        }
        else
        {
            alert("用户名或昵称不能为空");
        }

    }
};
var personal=new person();
personal.init();