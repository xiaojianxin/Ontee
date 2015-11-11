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
            var flag = 1;
            if(flag == 1){
                var id=$(this).prev().prev().prev().text();
                var me=this;
                $.ajax({
                    type:"POST",
                    url:"/order/buytshirt",
                    data:{id:id},
                    dataType:"JSON",
                    success:function(data){
                        if(data=="404"){
                            alertify.alert('请重新登录');
                        }else if(data.status == "200"){
                            flag = 0;
                            var id = data.id;
                            var store={id:id,type:data.type,size:data.size,num:1,price:79,frontpic:data.frontpic};
                            var storge=JSON.stringify(store);
                            window.localStorage.setItem("orderInfo",storge);
                            window.location.href="../site/confirm";
                        }else if(data.status == "500"){
                             alertify.alert("购买失败,请再试一次");
                        }

                    },
                    error:function(){
                        alertify.alert("购买失败")
                    }
                })
            }
        })
    }
};
var shirt=new myshirt();
shirt.init();