$(function() {
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
    });
    $("#signInItem").click(function(){
        $("#registerItem").removeClass("active");
        $("#signInItem").addClass("active");
        $("#registerContent").hide();
        $("#registerConfirm").hide();
        $("#successContent").hide();
        $("#signInContent").show();
    });
    $("#nextRegister").click(function(){
        $("#signInItem").removeClass("active");
        $("#registerItem").addClass("active");
        $("#registerContent").hide();
        $("#successContent").hide();
        $("#signInContent").hide();
        $("#registerConfirm").show();

    });
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
                 data:{username:username,password:psw},
                 dataType:"Json",
                 success:function(data){
                    //alert(data);
                     if(data==0)
                     {
                         $("#signInContent").hide();
                         $("#successContent").show();
                         setTimeout("$('#modalBox').fadeOut();",3000);
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
    $("#testCode").click(function(){
        $(".registerError1").html("");
        var telephone = $("#telephone").val();
        if(telephone=="")
        {
           $(".registerError1").html("手机号码不能为空");
        }
        else
        {
            var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
            if (reg.test(telephone)) {
                $.ajax({
                    type:"POST",
                    url:"index.php?r=site/testcode",
                    data:{telephone:telephone},
                    dataType:"Json",
                    success:function(data){
                        if(data==0)
                        {
                            $(".registerError1").html("手机号码已存在");
                        }
                        else{
                            var wait = 60;
                            function time(btn) {
                                if (wait == 0) {
                                    btn.removeAttribute("disabled");
                                    btn.html("点击获取获取验证码");
                                    wait = 60;
                                } else {
                                    btn.setAttribute("disabled", true);
                                    btn.html(wait + "秒后重新获取验证码");
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
});