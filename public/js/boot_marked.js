$(function() {
  marked.setOptions({
    langPrefix: ''
  });
  $('#editor').keyup(function() {
    var src = $(this).val();
    var html = marked(src);
    // idを取り除く
    html = html.replace(/ id=\".*\"/g,'');
    html = html.replace(/\n/g,"\n\n");
    $('#result').text(html);
    // ハイライト
    $('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
  });
  // textarea自動調整
  $("#editor").height(100);
  $("#editor").css("lineHeight","20px");
  $("#editor").on("input", function(evt) {
    if (evt.target.scrollHeight > evt.target.offsetHeight) {
      $(evt.target).height(evt.target.scrollHeight);
    } else {
      var lineHeight = Number($(evt.target).css("lineHeight").split("px")[0]);
      while (true) {
        $(evt.target).height($(evt.target).height() - lineHeight);
        if (evt.target.scrollHeight > evt.target.offsetHeight) {
          $(evt.target).height(evt.target.scrollHeight);
          break;
        }
      }
    }
  });
});
