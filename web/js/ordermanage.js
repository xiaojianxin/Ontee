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
        me.sizeArr=["S","M","L","XL","XXL","XXXL"];
        me.size="S";
        me.num=1;
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
        });
        $(".changeUnpaySizeNum").click(function(){
            var id=$(this).parentsUntil(".unpayOrders").parent().find(".orderId").text();

            me.index=id;
            var size=$(this).parent().prev().find(".unpaySize").text();
            var num=$(this).parent().prev().find(".unpayNum").text();
            $(".teeSize span").each(function(){
                if($(this).text()==size)
                {
                    $(this).addClass("active");
                }
                me.size=size;
                me.num=num;
            });
            $("#teeNum").text(num);
        });
        $("#teeSize span").each(function(){
            $(this).click(function(){
                $("#teeSize span").removeClass("active");
                $(this).addClass("active");
                me.size=$(this).text();
            })
        });
        $("#addTeeNum").click(function(){
            me.num=1+parseInt(me.num);
            $("#teeNum").text(me.num);

        });
        $("#cutTeeNum").click(function(){
            if(me.num == 1){ }
            else{  me.num=parseInt(me.num)-1;$("#teeNum").text(me.num);}
        });
        $("#teeNum").click(function(){
            $("#inputTeeNum").show();
            $(this).hide();
            $("#inputTeeNum").val(me.num);
            $("#inputTeeNum").focus();
        });
        $("#inputTeeNum").blur(function(){
            var num=$("#inputTeeNum").val();
            var nInt=parseInt(num);
            console.log(nInt);
            if(!isNaN(nInt))
            {
                me.num=nInt
            }
            $(this).hide();
            $("#teeNum").show();
            $("#teeNum").text(me.num);
        });
        $("#changeSizeConfirm").click(function(){
            $("#changeUnpaySize").modal("hide");
            $("#teeSize span").removeClass("active");
            $(".unpayOrders").each(function(){
                if($(this).find(".orderId").text()==me.index){
                    $(this).find(".orderContent1").find(".orderInfo").find(".unpaySize").html(me.size);
                    $(this).find(".orderContent1").find(".orderInfo").find(".unpayNum").html(me.num);
                    $(this).find(".paynum").find(".payNum").html(parseInt(me.num)*79+"元");
                }
            })
        });
        $(".payButtonFinal").click(function(){
            var id=$(this).parentsUntil(".unpayOrders").parent().find(".orderId").text();
            var addrId=$(this).parentsUntil(".unpayOrders").parent().find(".selectAddrId").text();
            var size=$(this).parentsUntil(".unpayOrders").parent().find(".unpaySize").text();
            var num=$(this).parentsUntil(".unpayOrders").parent().find(".unpayNum").text();
            if(addrId==""||addrId=="-1")
            {
                alertify.error("请选择地址");
            }
            else
            {
                $.ajax({
                    type:"POST",
                    data:{id:id,addressid:addrId,size:size,num:num},
                    url:"../order/orderpay",
                    dataType:"JSON",
                    success:function(data){
                        //alert(data);
                        window.location.href="../site/orderconfirm";
                    },
                    error:function(){

                    }
                })
            }
        })
    }
};