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
    }
};
var self=new selfInfo();
self.bindEvent();
