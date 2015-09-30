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
        })
    }
};
var shirt=new myshirt();
shirt.init();