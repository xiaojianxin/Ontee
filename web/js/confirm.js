/**
 * Created by jiye on 15/9/26.
 */
orderConfirm=function(){
    this.init=function(){
        var data=window.localStorage.getItem("orderInfo");
        var obj=JSON.parse(data);
        console.log(obj.size);
        //me.size=obj.size;
    }
};