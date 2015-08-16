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
        alert(0);
         var telephone=$("#telephone").val();
         alert(telephone);
         if(telephone=="")
         {
             $(".signInError").html("手机号不能为空");
         }
         else
         {

             $.ajax({
                 type:"POST",
                 url:"index.php?r=site/testcode",
                 data:{telephone:telephone,},
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
});