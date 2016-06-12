$(function() {
  /**
   * コンタクトフォームの送信ボタンを
   * 押せるかどうかをチェックの状態で判断
   */
  $('#contact-form #confirm-check').val('');
  $('#contact-form #confirm-check').on('change', function() {
    if ($(this).is(':checked')) {
      $('#contact-form #confirm-btn').children('.btn').removeClass('disabled');
    } else {
      $('#contact-form #confirm-btn').children('.btn').addClass('disabled');
    }
  });
  /**
   * 送信完了した時のメッセージを自動で消す
   */
  $('.mail_success').delay(5000).slideUp(500);
});