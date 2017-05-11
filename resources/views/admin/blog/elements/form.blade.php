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
  <div class="col s2">
    タグ一覧
  </div>
  <div class="col s10">
    @foreach ($all_tags as $tag)
      <div class="chip">
        {{ $tag->name }}
      </div>
    @endforeach
  </div>
</div>
<div class="row">
  <div class="col s2">
    <i class="material-icons prefix">loyalty</i>
    <input type="text" name="tag_name" placeholder="新しいタグ名">
    <input type="button" class="btn add-tag-btn" value="タグ追加">
  </div>
  <div class="col s10">
    @foreach ($tags as $tag)
      <div class="chip">
        {{ $tag->name }}
        <i class="material-icons delete-tag" data-article_id="{{ $article->id }}" data-tag_id="{{ $tag->id }}" data-url="{{ action('Admin\TagController@destroy') }}">close</i>
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