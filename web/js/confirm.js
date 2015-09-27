/**
 * Created by jiye on 15/9/26.
 */
orderConfirm=function(){
    var me=this;
    this.init=function(){
        //var data=window.localStorage.getItem("orderInfo");
        //var obj=JSON.parse(data);
        //console.log(obj.size);
        //me.size=obj.size;
        //me.num=obj.num;
        //me.pic=obj.frontPic;
        me.initInfo();
    };
    this.initInfo=function(){
        var time=me.initTime();
        $("#orderTime").html(time);
        //$("#orderSizeInit").html(me.size);
        //$("#orderNumInit").html(me.num);
    };
    this.initTime=function(){
        var d = new Date();
        var vYear = d.getFullYear();
        var vMon = d.getMonth() + 1;
        var vDay = d.getDate();
        s=vYear+"-"+(vMon<10 ? "0" + vMon : vMon)+"-"+(vDay<10 ? "0"+ vDay : vDay);
        return s;
    }
};