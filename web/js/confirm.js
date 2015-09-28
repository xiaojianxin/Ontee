/**
 * Created by jiye on 15/9/26.
 */
orderConfirm=function(){
    var me=this;
    this.init=function(){
        var data=window.localStorage.getItem("orderInfo");
        var obj=JSON.parse(data);
        me.size=obj.size;
        me.num=obj.num;
        me.color=obj.color;
        me.type=obj.type;
        me.initInfo();
        me.bindEvent();
    };
    this.initInfo=function(){
        var time=me.initTime();
        $("#orderTime").html(time);
        $("#orderSizeInit").html(me.size);
        $("#orderNumInit").html(me.num);
    };
    this.initTime=function(){
        var d = new Date();
        var vYear = d.getFullYear();
        var vMon = d.getMonth() + 1;
        var vDay = d.getDate();
        s=vYear+"-"+(vMon<10 ? "0" + vMon : vMon)+"-"+(vDay<10 ? "0"+ vDay : vDay);
        return s;
    };
    this.bindEvent=function(){
        $("#addConfirmNum").click(function(){
            me.num+=1;
            $("#orderNumInit").text(me.num);
        });
        $("#minusConfirmNum").click(function(){
            if(me.num!=1)
            {
                me.num-=1;
                $("#orderNumInit").text(me.num);
            }
        });
        $("#orderNumInit").click(function(){
            $("#inputConfirmTeeNum").show();
            $(this).hide();
            $("#inputConfirmTeeNum").val(me.num);
            $("#inputConfirmTeeNum").focus();
        });
        $("#inputConfirmTeeNum").blur(function(){
            var num=$("#inputConfirmTeeNum").val();
            var nInt=parseInt(num);
            console.log(nInt);
            if(!isNaN(nInt))
            {
                me.num=nInt
            }
            $(this).hide();
            $("#orderNumInit").show();
            $("#orderNumInit").text(me.num);

        });
    }
};