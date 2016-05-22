$(document).ready(function() {
  $('.delete-btn').on('click', function() {
    if (confirm("本当の削除しますか？")) {
      submit();
    } else {
      return false;
    }
  });
  $('.alert').delay(3000).slideUp(300);
});