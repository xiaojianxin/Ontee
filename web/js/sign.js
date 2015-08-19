var sign;
sign=function(){
    var me=this;
    me.telephone="";
    me.code=1;
    me.init=function(){

        me.bindSignEvent();
        me.logInAjax();
        me.registerAjax();
        me.sendCodeAjax();
        me

    };
    me.bindSignEvent=function(){
        $("#signInButton").click(function(){
            $("#registerItem").removeClass("active");
            $("#signInItem").addClass("active");
            $("#registerContent").hide();
            $("#registerConfirm").hide();
            $("#successContent").hide();
            $("#signInContent").show();
        });
        $("#registerButton").click(function(){
            $("#signInItem").removeClass("active");
            $("#registerItem").addClass("active");
            $("#signInContent").hide();
            $("#registerConfirm").hide();
            $("#successContent").hide();
            $("#registerContent").show();
        });
        $("#registerItem").click(function(){
            $("#signInItem").removeClass("active");
            $("#registerItem").addClass("active");
            $("#signInContent").hide();
            $("#registerConfirm").hide();
            $("#successContent").hide();
            $("#registerContent").show();
            $(".signInError").html("");
            $(".registerError1").html("");
            $(".registerError2").html("");
        });
        $("#signInItem").click(function(){
            $("#registerItem").removeClass("active");
            $("#signInItem").addClass("active");
            $("#registerContent").hide();
            $("#registerConfirm").hide();
            $("#successContent").hide();
            $("#signInContent").show();
            $(".signInError").html("");
            $(".registerError1").html("");
            $(".registerError2").html("");
        });

        $("#telephone").focus(function(){
            $(".registerError1").html("");
        });
        $("#confirmCode").focus(function(){
            $(".registerError1").html("");
        });
        $("#modalBox").on('hide.bs.modal', function () {
            $("#signUrn").val("");
            $("#signPsw").val("");
            $("#telephone").val("");
            $("#confirmCode").val("");
            $("#inputPsw").val("");
            $("#confirmPsw").val("");
            $(".signInError").html("");
            $(".registerError1").html("");
            $(".registerError2").html("");
            me.telephone="";
            me.code=1;
        });
        $("#inputPsw").focus(function(){
            $(".registerError2").html("");
        });
        $("#confirmPsw").focus(function(){
            $(".registerError2").html("");
        });
        $("#inputPsw").blur(function(){
            var psw=$("#inputPsw").val();
            if(psw.length<6||psw.length>12)
            {
                $(".registerError2").html("密码不能少于六位或大于12位");

            }
        });
        $("#confirmPsw").blur(function(){
            var psw=$("#inputPsw").val();
            var cfmPsw=$("#confirmPsw").val();
            if(psw!=cfmPsw)
            {
                $(".registerError2").html("两次密码输入不一致");
            }
        });
        $("#nextRegister").click(function(){
            var code=$("#confirmCode").val();
            if(code==me.code)
            {
                $(".registerError1").html("");
                $("#registerContent").hide();
                $("#registerConfirm").show();
            }
            else
            {
                if(code=="")
                {
                    $(".registerError1").html("验证码不能为空");
                }
                else{
                    $(".registerError1").html("验证码输入错误，请重新输入");
                }

            }
        })

    };
    me.logInAjax=function(){
        $("#signIn").click(function(){
            var username=$("#signUrn").val();
            var psw=$("#signPsw").val();
            if(username=="")
            {
                $(".signInError").html("用户名不能为空");
            }
            else if(psw=="")
            {
                $(".signInError").html("密码不能为空");
            }
            else
            {

                $.ajax({
                    type:"POST",
                    url:"index.php?r=site/login",
                    data:{username:username,password: $.md5(psw)},
                    dataType:"Json",
                    success:function(data){
                        //alert(data);
                        if(data==0)
                        {
                            $(".signInError").html("");
                            $("#signInContent").hide();
                            $("#successContent").show();
                            setTimeout(function () {
                                $('#modalBox').fadeOut();
                            },3000);
                            window.location.href=window.location.href;

                        }
                        else if(data==1)
                        {
                            $(".signInError").html("用户名不存在");
                        }
                        else if(data==2)
                        {
                            $(".signInError").html("密码错误");
                        }
                        else
                        {
                            $(".signInError").html("未知错误");
                        }
                    },
                    error:function(data){
                        //alert(data);
                        alert("登录失败");
                    }
                });
            }
        });
    };
    me.sendCodeAjax=function(){
        $("#testCode").click(function(){
            $(".registerError1").html("");
            var telephone = $("#telephone").val();
            me.telephone=telephone;
            if(me.telephone=="")
            {
                $(".registerError1").html("手机号码不能为空");
            }
            else
            {
                var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
                if (reg.test(me.telephone)) {
                    $.ajax({
                        type:"POST",
                        url:"index.php?r=site/testcode",
                        data:{telephone:me.telephone},
                        dataType:"Json",
                        success:function(data){
                            if(data==0)
                            {
                                $(".registerError1").html("手机号码已存在");
                            }
                            else{
                                me.code=data;
                                var wait = 60;
                                function time(btn) {
                                    if (wait == 0) {
                                        btn.attr("disabled",'false');
                                        btn.html("点击获取验证码");
                                        wait = 60;
                                    } else {
                                        btn.attr("disabled", true);
                                        btn.html(wait + "秒后重新获取");
                                        wait--;

                                        $(".registerError1").html("验证码已发送");
                                        setTimeout(function () {
                                                time(btn);
                                            },
                                            1000);
                                    }
                                }
                                time($("#testCode"));
                            }

                        },
                        error:function(data){
                            alert("注册失败");
                        }
                    });
                } else {
                    $(".registerError1").html("手机号码格式错误");
                }
            }

        });
    };

    me.registerAjax=function(){
        $("#registerBtn").click(function(){
            var psw = $("#inputPsw").val();
            var cfmPsw=$("#confirmPsw").val();
            if(psw.length<6||psw.length>12)
            {
                $(".registerError2").html("密码不能少于六位或大于12位");

            }
            else{
                if(psw==cfmPsw)
                {
                    $(".registerError2").html("");
                    $.ajax({
                        type:"POST",
                        url:"index.php?r=site/register",
                        data:{telephone:me.telephone,password: $.md5(psw)},
                        dataType:"Json",
                        success:function(data) {
                            if(data==0)
                            {
                                $("#registerConfirm").hide();
                                var str="<h2 class='registerSuccess'>注册成功，请登录</h2>";
                                $(".boxContent").append(str);
                                setTimeout(function () {
                                        $(".registerSuccess").remove();
                                        $("#modalBox").close();
                                    },
                                    2000);
                                $("#signUrn").val(me.telephone);
                                $("#telephone").val("");
                                $("#confirmCode").val("");
                                $("#inputPsw").val("");
                                $("#confirmPsw").val("");

                            }
                            else
                            {
                                $(".registerError2").html("注册失败");
                            }
                        },
                        error:function(data){
                            $(".registerError2").html("注册系统错误");
                        }
                    })
                }

            }


        })
    };


};
var signJs=new sign;
signJs.init();