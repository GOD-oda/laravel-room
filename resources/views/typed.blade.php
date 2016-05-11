<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/typed.css') }}">
</head>
<body>
<div id="typed-strings" style="visibility:hidden;">
  <p>
    test<br>
    test<br>
    test<br>
    test<br>
  </p>
</div>
<span class="element"></span>

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