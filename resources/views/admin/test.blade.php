<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>marked.js test to HTML</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/default.min.css">
  <style>
    pre {
      background-color: #fff;
      padding: 0;
      border: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>marked.jsのテスト to HTML</h1>
    <div class="row">
      <div class="col s6">
        <textarea id="editor" class="form-control"></textarea>
      </div>
      <div class="col s6">
        <pre><code id="result"></code></pre>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.min.js"></script>
  <script>
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
    $("#editor").on("input",function(evt){
      if(evt.target.scrollHeight > evt.target.offsetHeight){
        $(evt.target).height(evt.target.scrollHeight);
      }else{
        var lineHeight = Number($(evt.target).css("lineHeight").split("px")[0]);
        while (true){
          $(evt.target).height($(evt.target).height() - lineHeight);
          if(evt.target.scrollHeight > evt.target.offsetHeight){
            $(evt.target).height(evt.target.scrollHeight);
            break;
          }
        }
      }
    });
  });
  </script>
</body>
</html>