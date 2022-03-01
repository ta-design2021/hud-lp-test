$(function() {
  
  /*=================================================
  ハンバーガーメニュー
  ===================================================*/
  $('.toggle-btn').on('click', function() {
    if ($('#header').hasClass('open')) {
      $('#header').removeClass('open');
    } else {
      $('#header').addClass('open');
    }
  });

  // リンクをクリックした時にメニューを閉じる
  $('#nav a').on('click', function() {
    $('#header').removeClass('open');
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
  $(function(){
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
   

});