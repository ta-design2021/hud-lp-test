// ローカルjs
$(function() {

/*=================================================
ハンバーガーメニュー(-MENUがCLOSEに-)
===================================================*/
$(".toggle-menu-btn").click(function () {//ボタンがクリックされたら
	$(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
});

$("#nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".toggle-menu-btn").removeClass('active');//ボタンの activeクラスを除去し
    $("#nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
});

/*=================================================
fadeUp
===================================================*/

// 動きのきっかけの起点となるアニメーションの名前を定義
function fadeAnime(){

  // ふわっ
  $('.fadeUpTrigger').each(function(){ //fadeUpTriggerというクラス名が
    var elemPos = $(this).offset().top-50;//要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight){
    $(this).addClass('fadeUp');// 画面内に入ったらfadeUpというクラス名を追記
    }
    });
}

// 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function (){
    fadeAnime();/* アニメーション用の関数を呼ぶ*/
  });// ここまで画面をスクロールをしたら動かしたい場合の記述

  /*=================================================
SERVICEセクションの順番にふわっとfadeUp
===================================================*/
var effect_btm = 300; // 画面下からどの位置でフェードさせるか(px)
var effect_move = 50; // どのぐらい要素を動かすか(px)
var effect_time = 800; // エフェクトの時間(ms) 1秒なら1000

//親要素と子要素のcssを定義
$('.scroll-fade-row').css({
    opacity: 0
});
$('.scroll-fade-row').children().each(function(){
    $(this).css({
        opacity: 0,
        transform: 'translateY('+ effect_move +'px)',
        transition: effect_time + 'ms'
    });
});

// スクロールまたはロードするたびに実行
$(window).on('scroll load', function(){
    var scroll_top = $(this).scrollTop();
    var scroll_btm = scroll_top + $(this).height();
    var effect_pos = scroll_btm - effect_btm;

    //エフェクトが発動したとき、子要素をずらしてフェードさせる
    $('.scroll-fade-row').each( function() {
        var this_pos = $(this).offset().top;
        if ( effect_pos > this_pos ) {
            $(this).css({
                opacity: 1,
                transform: 'translateY(0)'
            });
            $(this).children().each(function(i){
                $(this).delay(100 + i*200).queue(function(){
                    $(this).css({
                        opacity: 1,
                        transform: 'translateY(0)'
                    }).dequeue();
                });
            });
        }
    });
});

/*=================================================
右下固定のトップに戻る
===================================================*/
  let pagetop = $('#to-top');
  // 最初に画面が表示された時は、トップに戻るボタンを非表示に設定
  pagetop.hide();

  // スクロールイベント（スクロールされた際に実行）
  $(window).scroll(function() {
    // スクロール位置が700pxを超えた場合
    if ($(this).scrollTop() > 700) {
      // トップに戻るボタンを表示する
      pagetop.fadeIn();

    // スクロール位置が700px未満の場合
    } else {
      // トップに戻るボタンを非表示にする
      pagetop.fadeOut();
    }
  });

  // クリックイベント（ボタンがクリックされた際に実行）
  pagetop.click(function() {
    // 0.5秒かけてページトップへ移動
    $('body,html').animate({scrollTop: 0}, 500);

    // イベントが親要素へ伝播しないための記述
    // ※詳しく知りたい方は「イベント　バブリング」または「jQuery バブリング」で調べてみてください
    return false;
  });

  /*=================================================
  ジャンプ先の位置調整
  ===================================================*/
  var headerHeight = $('header').outerHeight(); // ヘッダーについているID、クラス名など、余白を開けたい場合は + 10を追記する。
  var urlHash = location.hash; // ハッシュ値があればページ内スクロール
  if(urlHash) { // 外部リンクからのクリック時
    $('body,html').stop().scrollTop(0); // スクロールを0に戻す
    setTimeout(function(){ // ロード時の処理を待ち、時間差でスクロール実行
      var target = $(urlHash);
      var position = target.offset().top - headerHeight;
      $('body,html').stop().animate({scrollTop:position}, 500); // スクロール速度ミリ秒
    }, 100);
  }
  $('a[href^="#"]').click(function(){ // 通常のクリック時
    var href= $(this).attr("href"); // ページ内リンク先を取得
    var target = $(href);
    var position = target.offset().top - headerHeight;
    $('body,html').stop().animate({scrollTop:position}, 500); // スクロール速度ミリ秒
    return false; // #付与なし、付与したい場合は、true
  });

});

/*=================================================
  Modal
===================================================*/
'use strict';

// モーダル（ポップアップ）
const modalBtn = document.querySelectorAll('.js_modalBtnCont');
const modalWindow = document.querySelectorAll('.js_modalWrap');
const modalClose = document.querySelectorAll('.js_modalClose');
const modalBG = document.querySelectorAll('.js_modalBG');

window.addEventListener('DOMContentLoaded', function () {
  for (let i = 0; i < modalBtn.length; i++) {
    modalBtn[i].addEventListener('click', function (e) {
      e.preventDefault();
      let dataModalBtn = modalBtn[i].getAttribute('data-modal-btn');
      for (let j = 0; j < modalWindow.length; j++) {
        if (modalWindow[j].getAttribute('data-modal-cont') === dataModalBtn) {
          modalWindow[j].classList.add('active');
        }
      }
    })
    modalBG[i].addEventListener('click', function () {
      modalWindow[i].classList.add('active2');
      setTimeout(function() {
        modalWindow[i].classList.remove('active');
        modalWindow[i].classList.remove('active2');
      }, 300);
    })
    modalClose[i].addEventListener('click', function () {
      modalWindow[i].classList.add('active2');
      setTimeout(function() {
        modalWindow[i].classList.remove('active');
        modalWindow[i].classList.remove('active2');
      }, 300);
    })
  }
});
