<div class="container">
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red"><i class="material-icons">menu</i></a>
    <ul>
      <li><a href="{{ action('Auth\AuthController@logout') }}" class="btn-floating waves-effect waves-light red"><i class="material-icons prefix">exit_to_app</i></a></li>
      <li><a href="{{ action('Admin\BlogController@edit', $article->uri) }}" class="btn-floating waves-effect waves-light red"><i class="material-icons prefix">change_history</i></a></li>
      <li><a href="{{ url('admin/blog/create') }}" class="btn-floating waves-effect waves-light red"><i class="material-icons prefix">create</i></a></li>
    </ul>
  </div>
</div>