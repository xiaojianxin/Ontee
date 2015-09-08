/**
 * Created by jiye on 15/9/8.
 */
var person;
person=function(){
    var me=this;
    this.init=function(){
        me.bindEvent();
    };
    this.bindEvent=function(){
        $("#updateUserInfo").click(function(){
            me.updateInfoAjax();

        });
        $("#uploadPicBtn").click(function(){
            me.uploadUserImg();
        });
    };
    this.uploadUserImg=function(){
        $('#file_pic').uploadify({
            'swf'  : 'uploadify.swf',   //指定上传控件的主体文件，默认‘uploader.swf’
            'uploader'    : '/file',       //指定服务器端上传处理文件，默认‘upload.php’
            'auto'      : true,               //选定文件后是否自动上传，默认false
            'folder'    : '/userphoto'   ,     //要上传到的服务器路径，
            'multi'     : false,               //是否允许同时上传多文件，默认false
            'fileExt'   : '*.jpg;*.bmp;*.png;*.gif',      //控制可上传文件的扩展名，启用本项时需同时声明fileDesc
            fileSizeLimit:'2MB',
            'fileObjName': 'file',
            'onUploadSuccess': function(file, data, response) {
                var data1 = data.substring(1,data.length-1);
                $('#showUploadImg').attr("src",data1);
                $('#imgurl1').attr('value',data);
                $('#showUploadImg').show();
                //$('#photo').attr("value",response);
            },
            'onError'          : function(event, queueID, fileObj)
            {
                alert("文件:" + fileObj.name + " 上传失败");
            }
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