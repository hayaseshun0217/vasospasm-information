(function($){


  $(function () {
      var ua = navigator.userAgent;
      if((ua.indexOf('iPhone') > 0) || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)){
          $('head').prepend('<meta name="viewport" content="width=device-width,initial-scale=1">');
      } else {
          $('head').prepend('<meta name="viewport" content="width=1100">');
      } 
  });
  
  
  
  //【共通】各デバイスに応じてクラスを付与
  $(function(){
      var agent = navigator.userAgent;
      if(agent.search(/iPad/) != -1){
        $("body").addClass("ipad");
      }
      else if(agent.search(/iPhone/) != -1){
          $("body").addClass("iphone"); //Androidには「body class="android"」追加
      }
      else if(agent.search(/Android/) != -1){
          $("body").addClass("android"); //Androidには「body class="android"」追加
      }
      else{
          $("body").addClass("other"); //上記以外には「body class="other"」追加
      }
  });
  
  
  
  //スムーススクロール
  $(function(){
    $("a[href^='#']").click(function(){
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? "body" : href);
      var position = target.offset().top;
      $("html, body").animate({scrollTop:position}, 500, "swing");
      return false;
    });
  });
  
  
  
  //【SP】SP版メニュー　クリックイベント
  $(document).ready(function () {
    var scrollpos;
  
    $('.navBtn').on('click',function(){
      $(this).toggleClass("close");
      if($('.nav').css('display') == 'none'){
        $(".nav").fadeIn(200);
        scrollpos = $(window).scrollTop();
        $('body').addClass('navFixed').css({'top': -scrollpos});
      } else {
        $('body').removeClass('navFixed').css({'top': 0});
        window.scrollTo( 0 , scrollpos );
        $(".nav").fadeOut(200);
       }
    });
    $('.navBtn.close, .navBtmBtn').on('click',function(){
      $('body').removeClass('navFixed').css({'top': 0});
      window.scrollTo( 0 , scrollpos );
      $(".nav").fadeOut(200);
      $('.navBtn.close').removeClass("close");
    });
  });
  
  
  
  //TOPへ戻るボタン
  $(function(){
    var retop = $(".retop");
    $(window).scroll(function () {
      if($(this).scrollTop() >= 300) {
        retop.fadeIn();
      } else {
        retop.fadeOut();
      }
    });
  });
  window.onscroll = function () {
    var check = window.pageYOffset; 
    var docHeight = $(document).height();
    var dispHeight = $(window).height();
    var footerHeight = $('footer').outerHeight();
    if(check > docHeight-dispHeight-footerHeight){
        $('.retop').removeClass('fixed');
    }else{
        $('.retop').addClass('fixed');
    }
  };
  
  
  
  //追従サイドバー（サイドバーが最下部までスクロールされたら固定 / フッターが現れたら固定を解除）
  $(window).bind('load', function () {
    var mainArea = $(".main");
    var sideWrap = $(".sideWrap");
    var sideArea = $(".side");
    var wd = $(window);
  
    var mainH = mainArea.height();
    var sideH = sideWrap.height();
     
    if(sideH < mainH) {
      sideWrap.css({"position": "relative"});
      var sideOver = wd.height()-sideArea.height();
      var starPoint = sideArea.offset().top + (-sideOver);
      var breakPoint = sideArea.offset().top + mainH;
  
      wd.scroll(function() {
        if(wd.height() < sideArea.height()){
          if(starPoint < wd.scrollTop() && wd.scrollTop() + wd.height() < breakPoint){
                sideArea.css({"position": "fixed", "bottom": "0"}); 
          }else if(wd.scrollTop() + wd.height() >= breakPoint){
                sideArea.css({"position": "absolute", "bottom": "0"});
          } else {
                sideArea.css("position", "static");
          }
        }else{
          var sideBtm = wd.scrollTop() + sideArea.height();
          if(mainArea.offset().top < wd.scrollTop() && sideBtm < breakPoint){
                sideArea.css({"position": "fixed", "top": "0"});
          }else if(sideBtm >= breakPoint){
                var fixedSide = mainH - sideH;
                sideArea.css({"position": "absolute", "top": fixedSide});
                 
          } else {
                sideArea.css("position", "static");
          }
        }
      });
    } 
  });
  
  
  // object-fit
  $(function () {
    objectFitImages('.imgFitBox img,.imgLinkBox img');
  });
  
  
  
  // matchHeight
  $(function() {
      $('.modBox07 .ttl').matchHeight();
  });
  
  
  
  // アコーディオン
  $(document).ready(function(){
    $('.btnAcordion').on('click',function(){
      $(this).toggleClass('close');
      $(this).parents('.imgListWrap').find('.imgList:nth-of-type(n+4)').slideToggle();
      if($(this).hasClass('close')){
          $(this).text("閉じる");
      }else{
          $(this).text("もっと見る");
          var position = $(this).parents('.imgListWrap').offset().top;
          $('body,html').animate({ scrollTop: position });
      }
    });
  });
  
  
  })(jQuery);