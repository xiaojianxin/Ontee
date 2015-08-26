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
         $('.tShirtPic').attr('src','/img/teebf.png');
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
         //$(".teePic").addClass("animated fadeOutLeft");
         //setTimeout("$('.tShirtPic').attr('src','./img/teewf.png')",3000);
         //$(".teePic").removeClass("animated fadeOutLeft");
         //$(".tShirtPic").removeClass("animated fadeInLeft");
         //setTimeout("$('.tShirtPic').removeClass('animated fadeInLeft')",3000);
         $('.tShirtPic').attr('src','/Ontee/web/img/teewf.png');
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
      var div1=document.getElementById("upPic");
      if (file.files && file.files[0])
      {

         div1.innerHTML ="<g id='upPic'></g>";
         var xmlns = "http://www.w3.org/2000/svg";
         var tsvg_obj = document.getElementById("upPic");
         var svg_img = document.createElementNS(xmlns, "image");
         svg_img.setAttributeNS(null, "height", "180px");
         svg_img.setAttributeNS(null, "width", "180px");
         //$("#mySvg image").remove();
         tsvg_obj.appendChild(svg_img);
         var point = document.createElementNS(xmlns, "g");
         point.setAttributeNS(null, "height", "10px");
         point.setAttributeNS(null, "width", "10px");
         tsvg_obj.onload=function(){
            var rect = me.clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            svg_img.width  =  rect.width;
            svg_img.height =  rect.height;
            svg_img.style.marginTop = rect.top+'px';
         };
         var reader = new FileReader();
         reader.onload = function(evt){svg_img.href.baseVal = evt.target.result;};
         reader.readAsDataURL(file.files[0]);


      }
      else{
         alert("error");
      }
      //else //兼容IE
      //{
      //
      //   var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
      //   file.select();
      //   var src = document.selection.createRange().text;
      //   div.innerHTML = "<img id='upLoadPic'>";
      //   var img = document.getElementById('upLoadPic');
      //   img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
      //   var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
      //   status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
      //   div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
      //};
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
var editTee= new editTee();
editTee.init();