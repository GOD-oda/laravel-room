<div class="row">
  <div class="input-field col s6">
    <i class="material-icons prefix">title</i>
    {!! Form::text('title', null, ['class' => 'input-field']) !!}
    {!! Form::label('title', '記事名', ['for' => 'icon-prefix']) !!}
  </div>
</div>
<div class="row">
  <div class="input-field col s6 m12 l12">
    <i class="material-icons prefix">http</i>
    {!! Form::text('uri', null, ['class' => 'input-field']) !!}
    {!! Form::label('uri', '記事のパス', ['for' => 'icon-prefix']) !!}
  </div>
</div>
<div class="row">
  <div class="input-field col s6 m12 l12">
    <i class="material-icons prefix">label_outline</i>
    {!! Form::textarea('discription', null, ['class' => 'materialize-textarea', 'cols' => 50]) !!}
    {!! Form::label('discription', '記事概要', ['for' => 'icon-prefix']) !!}
  </div>
</div>
<div class="row">
  <div class="input-field col s6">
    <i class="material-icons prefix">loyalty</i>
    {!! Form::text('tag', null, ['class' => 'input-field']) !!}
    {!! Form::label('tag_name', '記事のタグ', ['for' => 'icon-prefix']) !!}
  </div>
  <div class="col s6">
    @foreach ($tags as $tag)
      <div class="chip">
        {{ $tag->tag_name }}
        <i class="material-icons delete-tag" data-article_id="{{ $article->id }}" data-tag_name="{{ $tag->tag_name }}" data-url="{{ action('Admin\BlogController@deleteTag') }}">close</i>
      </div>
    @endforeach
  </div>
</div>
<div class="row">
  <div class="input-field col s12 m6">
    <div class="file-field input-field">
      <div class="btn">
        <span>thumbnail</span>
        {!! Form::file('thumbnail') !!}
      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" placeholder="Upload one file">
      </div>
    </div>
  </div>
  <div class="input-field col s12 m6">
    <div class="file-field input-field">
      <div class="btn">
        <span>Content Images</span>
        {!! Form::file('content_images[]', ['multiple']) !!}
      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" placeholder="Upload one file">
      </div>
    </div>
  </div>
<!--   <div class="col s12 m6">
    <a class="waves-effect waves-light btn modal-trigger" href="#image">Images</a>
    <div id="image" class="modal bottom-sheet">
      <div class="modal-content">
        <div class="file-field input-field">
          <div class="btn">
            <span>Images</span>
            {!! Form::file('content_image', ['multiple']) !!}
          </div>
          <div class="file-path-wrapper">
            <input type="text" class="file-path validate" placeholder="Upload one file">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">close</a>
      </div>
    </div>
  </div> -->
</div>
<div class="row">
  <div class="input-field col s6">
    <i class="material-icons prefix">perm_contact_calendar</i>
    {!! Form::date('published_at', null, ['class' => 'input-field datepicker']) !!}
    {!! Form::label('published_at', '公開日', ['for' => 'icon-prefix']) !!}
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <i class="material-icons prefix">text_fields</i>
    {!! Form::textarea('body', null, ['class' => 'custom-textarea', 'id' => 'editor']) !!}
    {!! Form::label('body', '記事内容', ['for' => 'icon-prefix']) !!}
  </div>
</div>
<div class="row">
  <div class="input-field col s6">
    <i class="material-icons left">{{ $icon }}</i>
    {!! Form::submit($submitButtonName, ['class' => 'btn waves-effect waves-light']) !!}
  </div>
</div>