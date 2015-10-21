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
    }
};