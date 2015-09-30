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
                containerID : "itemContainer"
            });
        });
    }
};
var shirt=new myshirt();
shirt.init();