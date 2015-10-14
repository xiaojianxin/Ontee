/**
 * Created by jiye on 15/10/12.
 */
ordermanage=function(){
    var me=this;
    this.init=function(){
        me.bindEvent();
    };
    this.bindEvent=function(){
        $("div.myOrderHolder").jPages({
            containerID : "userOrderList",
            perPage: 3,
            delay : 0
        });
    }
};