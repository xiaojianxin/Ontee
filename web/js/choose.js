
editTee=function(){
   Array.prototype.indexOf = function(val) {
      for (var i = 0; i < this.length; i++) {
         if (this[i] == val) return i;
      }
      return -1;
   };
   Array.prototype.remove = function(val) {
      var index = this.indexOf(val);
      if (index > -1) {
         this.splice(index, 1);
      }
   };
   var me=this;
   me.sex=1;
   me.type=1;
   me.style=1;
   me.color=1;
   me.side=1;
   me.price=79;
   me.svgElementArr=[];
   me.drawFront=SVG('upPicFront');
   me.drawBack=SVG('upPicBack');
   me.drawBack.width(180);me.drawFront.width(180);me.drawBack.height(300);me.drawFront.height(300);
   me.text={
      color:"grey",
      bold:false,
      bend:false,
      fontSize:14,
      fontFamily:"宋体"
   };
   me.size="S";
   me.num=1;
   me.picData=["",""];
   this.select={};
   this.hasSelected=me.drawBack.circle(0);
   this.fontArr=["STHeiti","STKaiti","STSong","STFangsong","LiHei Pro Medium","LiSong Pro Light","BiauKai",
   "PMingLiU","MingLiU","DFKai-SB","SimHei","SimSun","NSimSun","FangSong",
      "KaiTi","Microsoft YaHei"];
   this.colorArr=["#F0F8FF","#FAEBD7","#00FFFF","#7FFFD4","#F0FFFF","#F5F5DC", "#FFE4C4","#000000",
      "#FFEBCD","#0000FF","#8A2BE2", "#A52A2A","#DEB887","#5F9EA0","#D2691E","#FF7F50","#6495ED",
      "#7FFF00","#6495ED","#FFF8DC", "#DC143C","#00FFFF","#00008B","#008B8B","#B8860B","#A9A9A9",
      "#006400","#BDB76B","#8B008B", "#556B2F","#FF8C00","#9932CC","#8B0000","#E9967A","#8FBC8F",
      "#483D8B","#2F4F4F","#00CED1", "#9400D3","#FF1493","#696969","#1E90FF","#B22222","#FFFAF0",
      "#228B22","#FF00FF","#DCDCDC", "#F8F8FF","#FFD700","#DAA520","#808080","#008000","#ADFF2F",
      "#F0FFF0","#FF69B4","#CD5C5C","#4B0082","#FFFFF0","#7CFC00", "#F08080", "#20B2AA"];
   this.polyString=["78,50.829 96.851,25.114 95.927,56.272 127.351,45.824 107.007,70.525 139,79.333 107.007,88.143 127.351,112.844 95.927,102.395 96.851,133.553 78,107.838 59.15,133.553 60.072,102.395 28.65,112.844 48.993,88.143 17,79.333 48.993,70.525 28.65,45.824 60.072,56.272 59.15,25.114 ",
      "81.834,54.21 97.748,32.447 96.969,58.816 123.498,49.974 106.323,70.878 133.333,78.334 106.323,85.789 123.498,106.693 96.969,97.851 97.748,124.22 81.834,102.457 65.919,124.22 66.698,97.851 40.169,106.693 57.344,85.789 30.333,78.334 57.344,70.878 40.169,49.974 66.698,58.816 65.919,32.447 "];
   this.pathString= [
      'M88.006,61.994c3.203,0,6.216-1.248,8.481-3.514C98.752,56.215,100,53.203,100,50c0-3.204-1.248-6.216-3.513-8.481 c-2.266-2.265-5.278-3.513-8.481-3.513c-2.687,0-5.237,0.877-7.327,2.496h-7.746l5.479-5.479 c5.891-0.757,10.457-5.803,10.457-11.896c0-6.614-5.381-11.995-11.994-11.995c-6.093,0-11.14,4.567-11.896,10.457l-5.479,5.479 v-7.747c1.618-2.089,2.495-4.641,2.495-7.327c0-3.204-1.247-6.216-3.513-8.481C56.216,1.248,53.204,0,50,0 c-3.204,0-6.216,1.248-8.481,3.513c-2.265,2.265-3.513,5.277-3.513,8.481c0,2.686,0.877,5.237,2.495,7.327v7.747l-5.479-5.479 c-0.757-5.89-5.803-10.457-11.896-10.457c-6.614,0-11.995,5.381-11.995,11.995c0,6.093,4.567,11.139,10.458,11.896l5.479,5.479 h-7.747c-2.089-1.619-4.641-2.496-7.327-2.496c-3.204,0-6.216,1.248-8.481,3.513C1.248,43.784,0,46.796,0,50 c0,3.203,1.248,6.216,3.513,8.48c2.265,2.266,5.277,3.514,8.481,3.514c2.686,0,5.237-0.877,7.327-2.496h7.747l-5.479,5.479 c-5.891,0.757-10.458,5.804-10.458,11.896c0,6.614,5.381,11.994,11.995,11.994c6.093,0,11.139-4.566,11.896-10.457l5.479-5.479 v7.749c-3.63,4.7-3.291,11.497,1.018,15.806C43.784,98.752,46.796,100,50,100c3.204,0,6.216-1.248,8.481-3.514 c4.309-4.309,4.647-11.105,1.018-15.806v-7.749l5.479,5.479c0.757,5.891,5.804,10.457,11.896,10.457 c6.613,0,11.994-5.38,11.994-11.994c0-6.093-4.566-11.14-10.457-11.896l-5.479-5.479h7.746 C82.769,61.117,85.319,61.994,88.006,61.994z M76.874,68.354c4.705,0,8.52,3.814,8.52,8.521c0,4.705-3.814,8.52-8.52,8.52 s-8.52-3.814-8.52-8.52l-12.33-12.33V81.98c3.327,3.328,3.327,8.723,0,12.049c-3.327,3.328-8.722,3.328-12.049,0 c-3.327-3.326-3.327-8.721,0-12.049V64.544l-12.33,12.33c0,4.705-3.814,8.52-8.52,8.52s-8.52-3.814-8.52-8.52 c0-4.706,3.814-8.521,8.52-8.521l12.33-12.33H18.019c-3.327,3.328-8.722,3.328-12.049,0c-3.327-3.326-3.327-8.721,0-12.048 s8.722-3.327,12.049,0h17.438l-12.33-12.33c-4.706,0-8.52-3.814-8.52-8.52c0-4.706,3.814-8.52,8.52-8.52s8.52,3.814,8.52,8.52 l12.33,12.33V18.019c-3.327-3.327-3.327-8.722,0-12.049s8.722-3.327,12.049,0s3.327,8.722,0,12.049v17.438l12.33-12.33 c0-4.706,3.814-8.52,8.52-8.52s8.52,3.814,8.52,8.52c0,4.705-3.814,8.52-8.52,8.52l-12.33,12.33h17.438 c3.327-3.327,8.722-3.327,12.049,0s3.327,8.722,0,12.048c-3.327,3.328-8.722,3.328-12.049,0H64.544L76.874,68.354z',
      'M88.006,61.994c3.203,0,6.216-1.248,8.481-3.514C98.752,56.215,100,53.203,100,50c0-3.204-1.248-6.216-3.513-8.481 c-2.266-2.265-5.278-3.513-8.481-3.513c-2.687,0-5.237,0.877-7.327,2.496h-7.746l5.479-5.479 c5.891-0.757,10.457-5.803,10.457-11.896c0-6.614-5.381-11.995-11.994-11.995c-6.093,0-11.14,4.567-11.896,10.457l-5.479,5.479 v-7.747c1.618-2.089,2.495-4.641,2.495-7.327c0-3.204-1.247-6.216-3.513-8.481C56.216,1.248,53.204,0,50,0 c-3.204,0-6.216,1.248-8.481,3.513c-2.265,2.265-3.513,5.277-3.513,8.481c0,2.686,0.877,5.237,2.495,7.327v7.747l-5.479-5.479 c-0.757-5.89-5.803-10.457-11.896-10.457c-6.614,0-11.995,5.381-11.995,11.995c0,6.093,4.567,11.139,10.458,11.896l5.479,5.479 h-7.747c-2.089-1.619-4.641-2.496-7.327-2.496c-3.204,0-6.216,1.248-8.481,3.513C1.248,43.784,0,46.796,0,50 c0,3.203,1.248,6.216,3.513,8.48c2.265,2.266,5.277,3.514,8.481,3.514c2.686,0,5.237-0.877,7.327-2.496h7.747l-5.479,5.479 c-5.891,0.757-10.458,5.804-10.458,11.896c0,6.614,5.381,11.994,11.995,11.994c6.093,0,11.139-4.566,11.896-10.457l5.479-5.479 v7.749c-3.63,4.7-3.291,11.497,1.018,15.806C43.784,98.752,46.796,100,50,100c3.204,0,6.216-1.248,8.481-3.514 c4.309-4.309,4.647-11.105,1.018-15.806v-7.749l5.479,5.479c0.757,5.891,5.804,10.457,11.896,10.457 c6.613,0,11.994-5.38,11.994-11.994c0-6.093-4.566-11.14-10.457-11.896l-5.479-5.479h7.746 C82.769,61.117,85.319,61.994,88.006,61.994z M76.874,68.354c4.705,0,8.52,3.814,8.52,8.521c0,4.705-3.814,8.52-8.52,8.52 s-8.52-3.814-8.52-8.52l-12.33-12.33V81.98c3.327,3.328,3.327,8.723,0,12.049c-3.327,3.328-8.722,3.328-12.049,0 c-3.327-3.326-3.327-8.721,0-12.049V64.544l-12.33,12.33c0,4.705-3.814,8.52-8.52,8.52s-8.52-3.814-8.52-8.52 c0-4.706,3.814-8.521,8.52-8.521l12.33-12.33H18.019c-3.327,3.328-8.722,3.328-12.049,0c-3.327-3.326-3.327-8.721,0-12.048 s8.722-3.327,12.049,0h17.438l-12.33-12.33c-4.706,0-8.52-3.814-8.52-8.52c0-4.706,3.814-8.52,8.52-8.52s8.52,3.814,8.52,8.52 l12.33,12.33V18.019c-3.327-3.327-3.327-8.722,0-12.049s8.722-3.327,12.049,0s3.327,8.722,0,12.049v17.438l12.33-12.33 c0-4.706,3.814-8.52,8.52-8.52s8.52,3.814,8.52,8.52c0,4.705-3.814,8.52-8.52,8.52l-12.33,12.33h17.438 c3.327-3.327,8.722-3.327,12.049,0s3.327,8.722,0,12.048c-3.327,3.328-8.722,3.328-12.049,0H64.544L76.874,68.354z',
      'M88.006,61.994c3.203,0,6.216-1.248,8.481-3.514C98.752,56.215,100,53.203,100,50c0-3.204-1.248-6.216-3.513-8.481 c-2.266-2.265-5.278-3.513-8.481-3.513c-2.687,0-5.237,0.877-7.327,2.496h-7.746l5.479-5.479 c5.891-0.757,10.457-5.803,10.457-11.896c0-6.614-5.381-11.995-11.994-11.995c-6.093,0-11.14,4.567-11.896,10.457l-5.479,5.479 v-7.747c1.618-2.089,2.495-4.641,2.495-7.327c0-3.204-1.247-6.216-3.513-8.481C56.216,1.248,53.204,0,50,0 c-3.204,0-6.216,1.248-8.481,3.513c-2.265,2.265-3.513,5.277-3.513,8.481c0,2.686,0.877,5.237,2.495,7.327v7.747l-5.479-5.479 c-0.757-5.89-5.803-10.457-11.896-10.457c-6.614,0-11.995,5.381-11.995,11.995c0,6.093,4.567,11.139,10.458,11.896l5.479,5.479 h-7.747c-2.089-1.619-4.641-2.496-7.327-2.496c-3.204,0-6.216,1.248-8.481,3.513C1.248,43.784,0,46.796,0,50 c0,3.203,1.248,6.216,3.513,8.48c2.265,2.266,5.277,3.514,8.481,3.514c2.686,0,5.237-0.877,7.327-2.496h7.747l-5.479,5.479 c-5.891,0.757-10.458,5.804-10.458,11.896c0,6.614,5.381,11.994,11.995,11.994c6.093,0,11.139-4.566,11.896-10.457l5.479-5.479 v7.749c-3.63,4.7-3.291,11.497,1.018,15.806C43.784,98.752,46.796,100,50,100c3.204,0,6.216-1.248,8.481-3.514 c4.309-4.309,4.647-11.105,1.018-15.806v-7.749l5.479,5.479c0.757,5.891,5.804,10.457,11.896,10.457 c6.613,0,11.994-5.38,11.994-11.994c0-6.093-4.566-11.14-10.457-11.896l-5.479-5.479h7.746 C82.769,61.117,85.319,61.994,88.006,61.994z M76.874,68.354c4.705,0,8.52,3.814,8.52,8.521c0,4.705-3.814,8.52-8.52,8.52 s-8.52-3.814-8.52-8.52l-12.33-12.33V81.98c3.327,3.328,3.327,8.723,0,12.049c-3.327,3.328-8.722,3.328-12.049,0 c-3.327-3.326-3.327-8.721,0-12.049V64.544l-12.33,12.33c0,4.705-3.814,8.52-8.52,8.52s-8.52-3.814-8.52-8.52 c0-4.706,3.814-8.521,8.52-8.521l12.33-12.33H18.019c-3.327,3.328-8.722,3.328-12.049,0c-3.327-3.326-3.327-8.721,0-12.048 s8.722-3.327,12.049,0h17.438l-12.33-12.33c-4.706,0-8.52-3.814-8.52-8.52c0-4.706,3.814-8.52,8.52-8.52s8.52,3.814,8.52,8.52 l12.33,12.33V18.019c-3.327-3.327-3.327-8.722,0-12.049s8.722-3.327,12.049,0s3.327,8.722,0,12.049v17.438l12.33-12.33 c0-4.706,3.814-8.52,8.52-8.52s8.52,3.814,8.52,8.52c0,4.705-3.814,8.52-8.52,8.52l-12.33,12.33h17.438 c3.327-3.327,8.722-3.327,12.049,0s3.327,8.722,0,12.048c-3.327,3.328-8.722,3.328-12.049,0H64.544L76.874,68.354z'
   ];
   this.selectFunc=function(item){
      me.hasSelected.select(false);
      me.select=item;
      me.hasSelected=item;
      me.select.select().resize();
      me.select.draggable();
   };
   this.init=function(){
      me.initEdit();
      me.bindEvent();
      me.bindTextEvent();
      me.bindPicEvent();
      me.bindTemplatePicEvent();

   };
   this.initEdit=function(){
      me.fontList();
      me.appendSvgPics();

   };
   this.svgElementEvent=function(){
      me.svgElementArr.map(function(item){
         item.mousedown(function(){
            me.hasSelected.select(false);
            me.select=item;
            me.hasSelected=item;
            me.select.select().resize();
         });
         //$(item).keydown(function(){
         //   if(event.keyCode==13)
         //   {
         //       me.svgElementArr.remove(this);
         //      this.hide();
         //   }
         //});
      })
   };
   this.bindTextEvent=function(){


      $("#fontList").change(function(){
         me.text.fontFamily=$(this).val();

      });
      $("#confirmText").click(function(){
         var textVal=$("input[name='textAreaValue']").val();
         if(textVal!="")
         {
            var text={};
            if(me.side==1)
            {
               text=me.drawFront.plain(textVal).fill(me.text.color).center(70,30);
            }
            else
            {
               text=me.drawBack.plain(textVal).fill(me.text.color).center(70,30);
            }

            text.font({
               family:   me.text.fontFamily
               , size:     me.text.fontSize
               , anchor:   'middle'
               , leading:  '1.5em'
            });
            console.log($("input:radio[name='textBold']").attr("check"));
            if($("input[name='textBold']").attr("checked"))
            {
               alert("yes");
               text.attr("font-weight","bold");
            }
            if($("input[name='textBend']").attr("checked"))
            {
               text.attr("font-style","italic ");
            }
            me.svgElementArr.push(text);
            me.svgElementEvent();
            me.selectFunc(text);
         }

      });
   };

   this.bindPicEvent=function(){
      me.colorArr.map(function(item){
         var str='';
         str +="<span style='background:"+item+"'></span>";
         $(".colorPick").append(str);
      });
      $(".colorPick span").click(function(){
         var color=$(this).css("background-color");
         console.log(me.select);
            me.select.fill(color);
            me.textColor=color;
      });
      $("#svgIcons").children().each(function(){
         $(this).click(function(){
            var pointer=$(this).attr("points");
            var line={};
            if(me.side==1)
            {
               line=me.drawFront.polygon(pointer);
            }
            else
            {
               line=me.drawBack.polygon(pointer);
            }

            var select=line.center(30,30).size(120,120).fill("grey");
            console.log(select);
            me.svgElementArr.push(select);
            me.svgElementEvent();
           me.selectFunc(select);
         })
      })
   };
   this.bindTemplatePicEvent=function(){
      $("#onePicContainer li").each(function(){
         var self=$(this);
         var img=self.children().get(0);
         var MAXWIDTH  = 150;
         var MAXHEIGHT = 300;
         self.click(function(){
            var image={};
            if(me.side==1)
            {
               image=me.drawFront.image(img.src).loaded(
                   function(){
                      var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT, image.width(), image.height());
                      this.size(rect.width, rect.height);
                   }
               );
            }
            else
            {
               image=me.drawBack.image(img.src).loaded(
                   function(){
                      var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT, image.width(), image.height());
                      this.size(rect.width, rect.height);
                   }
               );
            }

            image.center(10,10);
            me.svgElementArr.push(image);
            me.svgElementEvent();
            me.selectFunc(image);

         })


      })
   };
   this.judgeType=function(){
      if(me.style==1&&me.color==1){me.type=1}
      else if(me.style==2&&me.color==1){me.type=2}
      else if(me.style==1&&me.color==2){me.type=3}
      else{me.type=4}
      $('.tShirtPic').attr('src','../img/teef'+me.type+".png");
   };
   this.bindEvent=function(){
      $(".boyTee").click(function(){
         $(this).addClass("active");
         $('.girlTee').removeClass("active");
         me.sex=1;
      });
      $(".girlTee").click(function(){
         $(this).addClass("active");
         $('.boyTee').removeClass("active");
         me.sex=2;
      });
      $(".style1").click(function(){
         $(this).addClass("active");
         $('.style2').removeClass("active");
         me.style=1;
         me.judgeType();
      });
      $(".style2").click(function(){
         $(this).addClass("active");
         $('.style1').removeClass("active");
         me.style=2;
         me.judgeType();
      });
      $(".black").click(function(){
         $(this).addClass("active");
         $('.white').removeClass("active");
         me.color=1;
         me.judgeType();
      });
      $(".white").click(function(){
         $(this).addClass("active");
         $('.black').removeClass("active");
         me.color=2;
         me.judgeType();
      });
      $(".r-Side").click(function(){
         $('.l-Side').removeClass("active");
         $(this).addClass("active");
         me.side=1;

         $("#upPicBack").hide();
         $("#upPicFront").show();
         var svg=$("#upPicFront").prev().attr("id");
         if(svg.indexOf("Svg")+1){
            $("#upPicFront").prev().remove();
         }

         $('.tShirtPic').attr('src','../img/teef'+me.type+".png");

      });
      $(".l-Side").click(function(){
         $('.r-Side').removeClass("active");
         $(this).addClass("active");
         me.side=2;
         if(me.color==1){ $('.tShirtPic').attr('src','../img/teebb.png');}
         else{$('.tShirtPic').attr('src','../img/teewb.png');}
         $("#upPicFront").hide();
         $("#upPicBack").show();
         var svg=$("#upPicFront").prev().attr("id");
         if(svg.indexOf("Svg")+1){
            $("#upPicFront").prev().remove();
         }
      });
      $(".insertText").click(function(){
         $("#svgIconBox").hide();
         $("#textEditBox").toggle();
         $(".colorPicker").show();
      });
      $(".uploadPic").click(function(){
         $("#textEditBox").hide();
         $(".colorPicker").hide();
         $("#svgIconBox").hide();
      });
      $("input[name='uploadPic']").change(function(){

         me.previewImage(this);
      });
      $(".insertPic").click(function(){

         $("#textEditBox").hide();
         $("#svgIconBox").toggle();
         $(".colorPicker").show();
      });
      $(".uploadPic").click(function(){
         $("#chosenPic").click();
      });
      $(".nextBtn").click(function(){
         var svgHtmlBack= me.drawBack.svg();
         var sBack = svgHtmlBack.replace("NS1","xlink");
         canvg("printCanvasBack",sBack,{renderCallback:function(){  //var imgSrcFront = document.getElementById("printCanvasFront").toDataURL("image/png");
            var imgSrcBack = document.getElementById("printCanvasBack").toDataURL("image/png");
            me.picData[1]=imgSrcBack;

         }});
         var svgHtmlFront= me.drawFront.svg();
         var sFront = svgHtmlFront.replace("NS1","xlink");
         canvg("printCanvasFront",sFront,{renderCallback:function(){
            var imgSrcFront = document.getElementById("printCanvasFront").toDataURL("image/png");
            me.picData[0]=imgSrcFront;
            $(".editContent").hide();
            $("#confirmContent").show();
            $("#printTeeColor").attr("src","../img/teef"+me.type+".png");
            $("#printEditTee").attr("src",me.picData[0]);
         }});
      });
      $("#nextStepButton").click(function(){
         $(".chooseContent").hide();
         $(".editContent").show();
         $("div.holder").jPages({
            containerID : "onePicContainer",
            previous: '←',
            next : '→',
            perPage : 10//每页显示数据为多少行

         });

      });
      $(".previousBtn").click(function(){
         $(".editContent").hide();
         $(".chooseContent").show();
      });
      $("#teeSize span").each(function(){
         $(this).click(function(){
            $("#teeSize span").removeClass("active");
            $(this).addClass("active");
            me.size=$(this).text();
         })
      });
      $("#addTeeNum").click(function(){
         me.num+=1;
         $("#teeNum").text(me.num);
         me.price=79*me.num;
         $("#totalPrice").text(me.price+"元");
      });
      $("#cutTeeNum").click(function(){
         if(me.num == 1){ }
         else{  me.num-=1;$("#teeNum").text(me.num); me.price=79*me.num;
            $("#totalPrice").text(me.price+"元");}
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
         me.price=79*me.num;
         $("#totalPrice").text(me.price+"元");

      });
      $("#buyBtn").click(function(){
         var postData={sex:me.sex,type:me.type,
            frontPic:me.picData[0],backPic:me.picData[1],size:me.size,num:me.num,price:me.price};
         //var storge=JSON.stringify(postData);
         //window.localStorage.setItem("orderInfo",storge);
         $.ajax({
            type:"POST",
            url:"/order/createorder",
            data:postData,
            dataType:"JSON",
            success:function(data){
               if(data=="1")
               {
                  alert("请先登录");
               }
               else if(data=="0")
               {
                  window.location.href="../site/confirm";
                  var store={type:me.type,size:me.size,num:me.num,price:me.price};
                  var storge=JSON.stringify(store);
                  window.localStorage.setItem("orderInfo",storge);
               }
               else
               {
                  alert("保存失败");
               }

            },
            error:function(){
               alert("wrong");
               console.log("生成订单失败");
            }
         })

      })


   };
   this.fontList=function(){
      me.fontArr.map(function(item){
         var str='';
         str +="<option value="+item+">"+item+"</option>";
         $("#fontList").append(str);
      });
   };
   this.appendSvgPics=function(){
      for(var i=0;i<2;i++)
      {
         var draw=SVG("svgIcons");
         var line= draw.size(160, 160).polygon(me.polyString[i]);
         var s=line.size(40,40).fill("#fff");
         if(i%3==0)
         {

            s.dx(5);
            //s.dy(i/2*65+5);
         }
         else if(i%3==1)
         {
            s.dx(50);
            //s.dy(i/2*65+5);

         }
         else
         {
            s.dx(100);
            //s.dy(i/2*65+5);
         }

      }
   };
   this.previewImage=function(file){
      var MAXWIDTH  = 150;
      var MAXHEIGHT = 300;
      if (file.files && file.files[0])
      {
         var reader = new FileReader();
         reader.onload = function(evt){
            var image={};
            if(me.side==1)
            {
               image=me.drawFront.image(evt.target.result).loaded(
                   function(){
                      var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT, image.width(), image.height());
                      this.size(rect.width, rect.height);
                   }
               );
            }
            else
            {
               image=me.drawBack.image(evt.target.result).loaded(
                   function(){
                      var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT, image.width(), image.height());
                      this.size(rect.width, rect.height);
                   }
               );
            }

            image.center(10,10);
            me.svgElementArr.push(image);
            me.svgElementEvent();
            me.selectFunc(image);


         };
         reader.readAsDataURL(file.files[0]);

      }
      else{
         alert("error");
      }
   };
   this.clacImgZoomParam=function( maxWidth, maxHeight, width, height ){
      var param = {top:0, left:0, width:width, height:height};
      if( width>maxWidth || height>maxHeight )
      {
         rateWidth = width / maxWidth;
         rateHeight = height / maxHeight;

         if( rateWidth > rateHeight )
         {
            param.width =  maxWidth;
            param.height = Math.round(height / rateWidth);
         }else
         {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
         }
      }
      param.left = Math.round((maxWidth - param.width) / 2);
      param.top = Math.round((maxHeight - param.height) / 2);
      return param;
   };

};
