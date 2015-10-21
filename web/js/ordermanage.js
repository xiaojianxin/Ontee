/**
 * Created by jiye on 15/10/12.
 */
ordermanage=function(){
    var me=this;
    this.init=function(){
        setup();
        preselect('北京市');
        promptinfo();
        me.addrHtml="";
        me.receiver="";
        me.code=0;me.phone=0;

        me.addressId=-1;
        me.index=0;
        me.bindEvent();
    };
    this.bindEvent=function(){
        $("div.myOrderHolder").jPages({
            containerID : "userOrderList",
            perPage: 3,
            delay : 0
        });
        $(".deleteButtonFinal").click(function(){
            var id=$(this).parentsUntil(".unpayOrders").parent().find(".orderId").text();
            var me=this;
            $.ajax({
                type:"POST",
                data:{id:id},
                url:"/order/deleteorder",
                dataType:"JSON",
                success:function(){
                    alertify.alert( "删除成功", function () {
                        $(me).parentsUntil(".unpayOrders").parent().remove();
                    });
                },
                error:function(){
                    alertify.error("删除失败");
                }
            })
        });
        $(".chooseUnpayAddr").click(function(){
            var id=$(this).parentsUntil(".unpayOrders").parent().find(".orderId").text();
            me.index=id;
        });
        $(".oneSelfAddr").click(function(){
            var id=$(this).find(".addrId").text();
            me.addrHtml=$(this).find(".address").html();
            me.receiver=$(this).find(".receiver").html();
            me.code=$(this).find(".zipcode").html();
            me.phone=$(this).find(".telephone").html();
            $("#chooseUnpayAddr").modal("hide");
            me.addressId=id;
            $(".unpayOrders").each(function(){
                if($(this).find(".orderId").text()==me.index){
                    $(this).find(".unpayAddrInfo").show();
                    $(this).find(".chooseUnpayAddr").html("修改收货地址");
                    $(this).find(".showUnpayAddress").html(me.addrHtml);
                    $(this).find(".showUnpayReceiver").html(me.receiver);
                    $(this).find(".showUnpaycode").html(me.code);
                    $(this).find(".showUnpayPhone").html(me.phone);
                    $(this).find(".selectAddrId").html(id);
                }
            })
        })
    }
};