/**
 * Created by jiye on 15/9/7.
 */
var textEdit;
textEdit=function(){
    var me=this;
    this.fontFamily="宋体";
    this.fontArr=["宋体","黑体","微软雅黑","微软正黑体"," 新宋体","新细明体"," 细明体","标楷体","仿宋","楷体","幼圆"];
    this.init=function(){
        me.fontList();
        me.bindEvent();
    };
    this.fontList=function(){
        me.fontArr.map(function(item){
            var str='';
            str +="<option value="+item+">"+item+"</option>";
            $("#fontList").append(str);
        });
    };
    this.bindEvent=function(){
        $("#fontList").change(function(){
            me.fontFamily=$(this).val();

        });
        $("#textColor span").click(function(){
            var color=$(this).css("background-color");
            me.textColor=color;
        });
        $("#confirmText").click(function(){
            var textVal=$("input[name='textAreaValue']").val();
            var draw=SVG("upPic");
            alert(me.fontFamily);
            var text=draw.plain(textVal).fill("white").center(70,30);
            text.font({
                family:   me.fontFamily
                , size:     30
                , anchor:   'middle'
                , leading:  '1.5em',
                color:me.textColor
            })
        })
    };
};
var txtEdit=new textEdit();
txtEdit.init();