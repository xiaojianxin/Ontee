/**
 * Created by jiye on 15/8/31.
 */
var selfInfo;
selfInfo=function(){
    this.bindEvent=function(){
        $("#safeIcon").click(function(){
            $("#safeIcon").hide();
            $('.secondShow').show();
        });
        $(".currentPhone").click(function(){
            $(this).hide();
            $(".editPhoneArea").show();
        })
        $(".editPsw").click(function(){
            $(this).hide();
            $(".editPswArea").show();
        })
    }
};
var self=new selfInfo();
self.bindEvent();
