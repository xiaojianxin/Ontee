/**
 * Created by jiye on 15/9/30.
 */
myshirt=function(){
    me=this;
    this.init=function(){
        me.bindEvent();
    };
    this.bindEvent=function(){
        $(function(){
            $("div.myholder").jPages({
                containerID : "itemContainer",
                perPage: 8,
                delay : 0
            });
        });
        $("#makeTshirt").click(function(){
            window.location.href="../site/choose";
        });
        $(".zoomInIcon").each(function(){
            $(this).click(function(){
                var editSrc=$(this).prev().attr("src");
                var bgSrc=$(this).prev().prev().attr("src");

                $("#backgroundPic").attr("src",bgSrc);
                $("#editPic").attr("src",editSrc);
                $("#showBigTshirt").modal('show');
            })
        });
        $(".deleteOrder").click(function(){
            var id=$(this).prev().text();
            var me=this;
            $.ajax({
                type:"POST",
                data:{id:id},
                url:"/order/deletephoto",
                success:function(data){
                    alertify.alert("删除成功",function(){
                        //$(me).parentsUntil(".tshirtBox").parent().hide();
                        window.location.href=window.location.href;
                    })
                },
                error:function(){
                    alertify.alert("删除失败")
                }
            })
        });
        $(".purchaseOrder").click(function(){
            var id=$(this).prev().prev().prev().text();
            var me=this;
            $.ajax({
                type:"POST",
                url:"/order/buytshirt",
                data:{id:id},
                dataType:"JSON",
                success:function(){
                    window.location.href="../site/confirm";
                },
                error:function(){
                    alertify.alert("购买失败")
                }
            })
        })
    }
};
var shirt=new myshirt();
shirt.init();