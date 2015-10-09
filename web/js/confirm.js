/**
 * Created by jiye on 15/9/26.
 */
orderConfirm=function(){
    var me=this;
    me.sizeArr=["S","M","L","XL","XXL","XXXL"];
    this.init=function(){
        var data=window.localStorage.getItem("orderInfo");
        var obj=JSON.parse(data);
        me.size=obj.size;
        me.num=obj.num;
        me.type=obj.type;
        me.price=obj.price;
        me.initInfo();
        me.bindEvent();
        setup();
        preselect('北京市');
        promptinfo();

        me.addressId=0;
    };
    this.initInfo=function(){
        var time=me.initTime();
        $("#orderTime").html(time);
        $("#orderSizeInit").html(me.size);
        $("#orderNumInit").html(me.num);
        $("#showConfirmPrice").html(me.price+"元");
        $("#confirmShirtColor").attr("src","../img/teef"+me.type+".png");
    };
    this.initTime=function(){
        var d = new Date();
        var vYear = d.getFullYear();
        var vMon = d.getMonth() + 1;
        var vDay = d.getDate();
        time=vYear+"-"+(vMon<10 ? "0" + vMon : vMon)+"-"+(vDay<10 ? "0"+ vDay : vDay);
        return time;
    };
    this.bindEvent=function(){
        $("#addConfirmSize").click(function(){
            var size=$("#orderSizeInit").text();
            var index=0;
            me.sizeArr.map(function(item,e){

                if(item==size)
                {
                    index=e;
                }
            });
            if(index<5){
                $("#orderSizeInit").text(me.sizeArr[index+1]);
            }
        });
        $("#minusConfirmSize").click(function(){
            var size=$("#orderSizeInit").text();
            var index=0;
            me.sizeArr.map(function(item,e){

                if(item==size)
                {
                    index=e;
                }
            });
            if(index>0){
                $("#orderSizeInit").text(me.sizeArr[index-1]);
            }
        });
        $("#addConfirmNum").click(function(){
            me.num+=1;
            $("#orderNumInit").text(me.num);
            me.price=79*me.num;
            $("#showConfirmPrice").html(me.price+"元");
        });
        $("#minusConfirmNum").click(function(){
            if(me.num!=1)
            {
                me.num-=1;
                $("#orderNumInit").text(me.num);
                me.price=79*me.num;
                $("#showConfirmPrice").html(me.price+"元");
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
            if(!isNaN(nInt))
            {
                me.num=nInt
            }
            $(this).hide();
            $("#orderNumInit").show();
            $("#orderNumInit").text(me.num);
            me.price=79*me.num;
            $("#showConfirmPrice").html(me.price+"元");

        });
        $("#submitNewAddr").click(function(){
            var address=document.getElementById('address').value;
            var detail=$("input[name='addrDetail']").val();
            var phone=$("input[name='receiverPhone']").val();
            var receiver=$("input[name='receiverName']").val();
            var zipCode=$("input[name='receiverCode']").val();
            $.ajax({
                type:"POST",
                url:"/save/addaddress",
                dataType:"Json",
                data:{address:address,detail:detail,phone:phone,name:receiver,code:zipCode},
                success:function(data){
                    alert('success');
                    $("#addrModal").fadeOut()
                },
                error:function(){

                }
            })
        });
        $(".addressContainer .oneAddr").each(function(){
            $(this).click(function(){
                $(".addressContainer .oneAddr").removeClass("active");
                $(this).addClass("active");
                me.addressId=parseInt($(this).first().first().text());
            })
        });
        $("#confirmPayBtn").click(function(){ 
            $("input[name='orderId']").value='111';
            $("input[name='num']").value=me.num;
            $("input[name='price']").value=me.price;
            $("input[name='addressId']").value=me.addressId;
            
        
            
        })
    };
    
};
var confirm= new orderConfirm();
confirm.init();