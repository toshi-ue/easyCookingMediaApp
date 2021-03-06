@extends('recipe/layout')
@section('content')
<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>レシピ登録</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      @include('recipe/message')
      <form action="/recipe" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">レシピ名</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $recipe->name) }}">
        @if ($errors->has('name'))
          @foreach ($errors->get('name') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      <!-- TODO ファイルアップロード機能を実装する-->
      <label>ファイルアップロード(未実装、BootStrap4のclass、デザインが適応されない)</label>
      <div class="form-group">
        <div class="custom-file">
          <input type="file" class="custome-file-input" id="inputFile">
        </div>
      </div>
      <div class="form-group">
        <label for="cookingtime">所要時間</label>
        <input type="number" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('cookingtime') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      <div class="form-group">
        <label for="description">説明</label>
        <textarea class="form-control" name="description" cols="30" rows="4">{{ $recipe->description }}</textarea>
        @if ($errors->has('description'))
          @foreach ($errors->get('description') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>


      <!-- TODO
        複数のcheckboxの値を保存できるようにする
        あとでtoolsのcrudを作成して複数参照、表示する
      -->
      <div class="form-group">
      <label>調理道具(※ DBからの表示ができない状態)</label>
      old('cookingtools'): {{old('cookingtools')}}<br><br>
      $recipe->cookingtools: {{$recipe->cookingtools}}<br><br>
      {{-- old('tool'): @foreach(old('tool') as $value) {{$value}} @endforeach --}}
      @foreach($cookingtools as $id => $cookingtool)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="tool[]" id="tool{{$id}}" value="{{ $id }}"
            @if($errors->any())
                {{ is_array(old('tool')) && array_keys(old('tool'), $id) ? 'checked="checked"' : ''}}
            @endif
          >
          <label class="form-check-label">{{$cookingtool}}</label>
          {{ in_array($id, array_map('intval', explode(",", $recipe->cookingtools)), true) ? 'true' : 'false'}}
        </div>
      @endforeach
      </div>
      <div class="form-group">
        <label for="is_comment_allowed">コメント許可</label><br />
        <input type="radio" name="is_comment_allowed" value="1" @if (old('is_comment_allowed', $recipe->is_comment_allowed) == 1) checked @endif>
          <label for="allowed">許可する</label>
          <input type="radio" name="is_comment_allowed" value="0" @if (old('is_comment_allowed', $recipe->is_comment_allowed ) == 0) checked @endif>
          <label for="allowed">許可しない</label>
          @if ($errors->has('is_comment_allowed'))
            @foreach ($errors->get('is_comment_allowed') as $message)
              <span class="text-danger">{{ $message }}</span><br>
            @endforeach
          @endif
      </div>
      <!-- TODO カテゴリーテーブルを作成して値を参照するセレクトボックスを作成する
      カテゴリ(select_box)
      <div class="form-group">
        <label for="cookingtime">所要時間</label>
        <input type="number" class="form-control" name="cookingtime" value="{{ $recipe->cookingtime }}">
        @if ($errors->has('cookingtime'))
          @foreach ($errors->get('cookingtime') as $message)
            <span class="text-danger">{{ $message }}</span><br>
          @endforeach
        @endif
      </div>
      -->
      <!-- TODO: セレクトボックスを追加する -->
      <label>公開状態</label>
      <div class="form-group">
        <select class="form-control" name="is_published" id="is_published">
            <option value="0" @if (old('is_published', $recipe->is_published) == 0) selected @endif>公開しない</option>
            <option value="1" @if (old('is_published', $recipe->is_published) == 1) selected @endif>公開する</option>
        </select>
      </div>
      <button type="submit" class="btn btn-default">登録</button>
        <!-- FIXME 初期化の方法が違う? -->
        <!--
        <input type="reset" class="btn btn-default" value="リセット">
        -->
      <a href="/recipe">戻る</a>
      </form>
    </div>
  </div>
</div>
@endsection
