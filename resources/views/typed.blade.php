<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/typed.css') }}">
</head>
<body>
<div class="container">
  <img src="{{ asset('img/test.png') }}" alt="">
  <div id="typed-strings" style="visibility:hidden;">
    <p>
      キングスライムが現れた！<br>
      きみならどうする！？<br>
    </p>
  </div>
  <span class="element"></span>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('js/typed.min.js') }}"></script>
<script>
  $(function(){
    $(".element").typed({
      //strings: ["ようこそ！ドラゴンクエストの世界へ！<br>さぁ、冒険の始まりだ！"],
      stringsElement: $('#typed-strings'),
      typeSpeed: 60
    });
  });
</script>
</body>
</html>