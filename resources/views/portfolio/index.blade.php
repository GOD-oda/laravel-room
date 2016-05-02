<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <!--Import custom css-->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    <title>t-oda's portfolio</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <header>
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s4">about me</li>
            <li class="tab col s4">skils</li>
            <li class="tab col s4">contact</li>
          </ul>
        </div>
      </div>
      <div class="divider"></div>
    </header>

    <main>
      <div class="container">
        <!-- about me -->
        <div id="about-me">
          <div class="row">
            <div class="col s4">
              <h2>about me</h2>
            </div>
          </div>
          <div class="row">
            <p>aaaa</p>
          </div>
        </div>
      </div>
      <div class="divider"></div>
      <!-- skils -->
      <div class="container">
        <div class="row">
          <div id="skils">
            <div class="row">
              <div class="col s4">
                <h2>skils</h2>
              </div>
            </div>
            <div class="row">
              <div class="col s4">
                <div class="card">
                  skil1
                </div>
              </div>
              <div class="col s4">
                <div class="card">
                  skil2
                </div>
              </div>
              <div class="col s4">
                <div class="card">
                  skil3
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="container">
        <!-- contact -->
        <div class="row">
          <div id="contact">
            <div class="col s4">
              <h2>contact</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="divider"></div>
    </main>

    <footer class="page-footer blue-grey lighten-5">
      <div class="container">
        <div class="row">
          <div class="s12">
            discription
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          copyrights
        </div>
      </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <!-- Import custom javascript or jQuery -->
    <script type="text/javascript" src="{{ asset('js/boot_materialize.js') }}"></script>
  </body>
</html>