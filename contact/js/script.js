// ローカルcontactフォルダ内js
$(function() {

  /*=================================================
  Validation
  ===================================================*/
  $('form').validate({
    //ルールの設定,name="◯◯"
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      num: {
        required: true,
        minlength: 1
      },
      agr: {
        required: true,
        minlength: 1
      }
    },

     //エラーメッセージの設定
    messages: {

      name: {
          required: '名前を入力してください。'
      },
      email: {
          required: 'メールアドレスを入力してください。'
      },
      tel: {
          required: '電話番号を入力してください。'
      },
      num: {
          required: '１つ選択してください。'
      },
      inquiry: {
        required: 'お問い合わせ内容を入力してください。'
      },
      agr: {
        required: '同意していただく必要があります。'
      }
    },

    //エラーメッセージの表示場所を設定
    errorPlacement: function (err, element) {

      err.appendTo(element.data('error_placement'));

    }
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
