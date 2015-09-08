var editTee;
editTee=function(){
   var me=this;
   me.sex=1;
   me.style=1;
   me.color=1;
   me.side=1;
   me.drawFront=SVG('upPicFront');
   me.drawBack=SVG('upPicBack');
   me.textColor="grey";
   this.select={};
   this.fontFamily="宋体";
   this.fontArr=["宋体","黑体","微软雅黑","微软正黑体"," 新宋体","新细明体"," 细明体","标楷体","仿宋","楷体","幼圆"];
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
   this.init=function(){
      me.initEdit();
      me.bindEvent();
      me.bindTextEvent();
      me.bindUploadEvent();
      me.bindPicEvent();
      me.editShirt();
   };
   this.initEdit=function(){
      me.fontList();
      me.appendSvgPics();

   };
   this.bindTextEvent=function(){
      $("#fontList").change(function(){
         me.fontFamily=$(this).val();

      });
      $("#textColor span").click(function(){
         var color=$(this).css("background-color");
         me.textColor=color;
      });
      $("#confirmText").click(function(){
         var textVal=$("input[name='textAreaValue']").val();
         var text={};
         if(me.side==1)
         {
           text=me.drawFront.plain(textVal).fill("grey").center(70,30);
         }
         else
         {
            text=me.drawBack.plain(textVal).fill("grey").center(70,30);
         }
         text.font({
            family:   me.fontFamily
            , size:     30
            , anchor:   'middle'
            , leading:  '1.5em',
            color:me.textColor
         })
      });
   };
   this.bindUploadEvent=function(){

   };
   this.bindPicEvent=function(){
      me.colorArr.map(function(item){
         var str='';
         str +="<span style='background:"+item+"'></span>";
         $("#textColor").append(str);
         $("#picColor").append(str);
      });
      $("#picColor span").click(function(){
         var color=$(this).css("background-color");
         me.select.fill(color);
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
            me.select=select;
         })
      })
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
      });
      $(".style2").click(function(){
         $(this).addClass("active");
         $('.style1').removeClass("active");
         me.style=2;
      });
      $(".black").click(function(){
         $(this).addClass("active");
         $('.grey').removeClass("active");
         $('.white').removeClass("active");
         $('.tShirtPic').attr('src','../img/teebf.png');
         me.color=1;
      });
      $(".grey").click(function(){
         $(this).addClass("active");
         $('.black').removeClass("active");
         $('.white').removeClass("active");
         me.color=2;
      });
      $(".white").click(function(){
         $(this).addClass("active");
         $('.grey').removeClass("active");
         $('.black').removeClass("active");
         $('.tShirtPic').attr('src','../img/teewf.png');

         me.color=3;
      });
      $(".r-Side").click(function(){
         $('.l-Side').removeClass("active");
         $(this).addClass("active");
         me.side=1;
         if(me.color==1){ $('.tShirtPic').attr('src','../img/teebf.png');}
         else if(me.color==2){$('.tShirtPic').attr('src','../img/teebf.png');}
         else{$('.tShirtPic').attr('src','../img/teewf.png');}
         $("#upPicBack").hide();
         $("#upPicFront").show();

      });
      $(".l-Side").click(function(){
         $('.r-Side').removeClass("active");
         $(this).addClass("active");
         me.side=2;
         if(me.color==1){ $('.tShirtPic').attr('src','../img/teebb.png');}
         else if(me.color==2){$('.tShirtPic').attr('src','../img/teebb.png');}
         else{$('.tShirtPic').attr('src','../img/teewb.png');}
         $("#upPicFront").hide();
         $("#upPicBack").show();
      });
      $("#nextStepButton").click(function(){
         $(".chooseContent").hide();
         $(".editContent").show();
      });
      $(".previousBtn").click(function(){
         $(".editContent").hide();
         $(".chooseContent").show();
      });
      $(".uploadPic").click(function(){
         $("#chosenPic").click();
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
            image.select().resize();
            image.draggable();

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
   this.editShirt=function(){
      $(".insertText").click(function(){
         $("#picColor").hide();
         $("#svgIconBox").hide();
         $("#textColor").toggle();
         $("#textEditBox").toggle();
      });
      $(".uploadPic").click(function(){
         $("#textColor").hide();
         $("#textEditBox").hide();
         $("#picColor").hide();
         $("#svgIconBox").hide();
      });
      $("input[name='uploadPic']").change(function(){

         me.previewImage(this);
      });
      $(".insertPic").click(function(){
         $("#textColor").hide();
         $("#textEditBox").hide();
         $("#picColor").toggle();
         $("#svgIconBox").toggle();
      });
      $(".nextBtn").click(function(){
            var svgHtml= $("#upPic").html();
            canvg("printCanvas",svgHtml);
            var imgSrc = document.getElementById("printCanvas").toDataURL("image/png");
            document.getElementById('myImg').src = imgSrc;

      })

   };

};
var edit= new editTee();
edit.init();