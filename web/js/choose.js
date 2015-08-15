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
         //$(".teePic").addClass("animated fadeOutLeft");
         //setTimeout("$('.tShirtPic').attr('src','./img/teewf.png')",3000);
         //$(".teePic").removeClass("animated fadeOutLeft");
         //$(".tShirtPic").removeClass("animated fadeInLeft");
         //setTimeout("$('.tShirtPic').removeClass('animated fadeInLeft')",3000);
         $('.tShirtPic').attr('src','./img/teewf.png');
         me.color=3;
      });
      $("#nextStepButton").click(function(){
         $(".chooseContent").hide();
         $(".editContent").show();
      })
   };
   me.editShirt=function(){

   }

};
var editTee= new editTee();
editTee.init();