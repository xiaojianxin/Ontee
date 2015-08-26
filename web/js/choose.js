var editTee;
editTee=function(){
   var me=this;
   me.sex=1;
   me.style=1;
   me.color=1;
   me.init=function(){

      me.bindEvent();
      me.editShirt();
   };
   me.bindEvent=function(){
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
         $('.tShirtPic').attr('src','./img/teebf.png');
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
         $('.tShirtPic').attr('src','./img/teewf.png');
         me.color=3;
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
   me.previewImage=function(file){
      var MAXWIDTH  = 260;
      var MAXHEIGHT = 180;
      $("#upPic svg").remove();
      if (file.files && file.files[0])
      {
         var draw=SVG('upPic');
         var reader = new FileReader();
         reader.onload = function(evt){
            var image=draw.image(evt.target.result).loaded(
                function(){
                   var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT, image.width, image.height);
                   image.width  =  rect.width;
                   image.height =  rect.height;
                   image.style.marginTop = rect.top+'px';
                   }
            );
            var text = draw.text('SVG.JS').move(100, 200);
            text.font({
               family: 'Source Sans Pro'
               , size: 18
               , anchor: 'middle'
               , leading: 1
            });
            text.select().resize();
            text.draggable();
            image.select().resize();
            image.draggable();
            //var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT,image.width, image.height);
            //alert(rect.width);
            //image.width  =  rect.width;
            //
            //image.height =  rect.height;
            //image.style.marginTop = rect.top+'px';
         };
         reader.readAsDataURL(file.files[0]);

      }
      else{
         alert("error");
      }
   };
   me.clacImgZoomParam=function( maxWidth, maxHeight, width, height ){
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
   me.editShirt=function(){
      $(".insertText").click(function(){
         $("#text-Area").toggle();
      });
      $("input[name='uploadPic']").change(function(){
         me.previewImage(this);
      });

   };

};
var edit= new editTee();
edit.init();